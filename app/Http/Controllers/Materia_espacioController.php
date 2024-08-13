<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMateria_espacioRequest;
use App\Http\Requests\UpdateMateria_espacioRequest;
use App\Repositories\Materia_espacioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Espacio;
use App\Models\Carrera;
use App\Models\Curso;
use App\Models\User;
use App\Models\Materia_espacio;
use Flash;
use Response;

class Materia_espacioController extends AppBaseController
{
    /** @var Materia_espacioRepository $materiaEspacioRepository*/
    private $materiaEspacioRepository;

    public function __construct(Materia_espacioRepository $materiaEspacioRepo)
    {
        $this->materiaEspacioRepository = $materiaEspacioRepo;
    }

    /**
     * Display a listing of the Materia_espacio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
{
    $user = auth()->user();
    
    if ($user->carrera == 'admin' && $user->curso == 'admin') {
        $materiaEspacios = Materia_espacio::all();
    } else {
        $materiaEspacios = Materia_espacio::whereHas('curso', function ($query) use ($user) {
            $query->where('nombreCur', $user->curso);
        })->whereHas('carrera', function ($query) use ($user) {
            $query->where('nombreCarr', $user->carrera);
        })->get();
    }
    
   
    
    return view('materia_espacios.index')
        ->with('materiaEspacios', $materiaEspacios);
}

    
    /*public function index(Request $request)
    {
        $materiaEspacios = $this->materiaEspacioRepository->all();

        return view('materia_espacios.index')
            ->with('materiaEspacios', $materiaEspacios);
    }*/

    /**
     * Show the form for creating a new Materia_espacio.
     *
     * @return Response
     */
    public function create()
{
    // Obtener todas las materias con su carrera relacionada y la cantidad de alumnos
    $materias = Materia::with('carrera')->get()->mapWithKeys(function ($materia) {
        return [$materia->id => $materia->nombreMat];
    });

    // Obtener solo los nombres de las carreras
    $carreras = Carrera::pluck('nombreCarr', 'id');

    // Obtener todos los cursos y concatenar 'nombreCur' y 'nombreCarr' para cada uno
    $cursos = Curso::with('carrera')->get()->mapWithKeys(function ($curso) {
        return [$curso->id => $curso->nombreCur . ' - ' . $curso->carrera->nombreCarr];
    });

    // Pasar todos los datos a la vista
    return view('materia_espacios.create', compact('materias', 'cursos', 'carreras'));
}


    


    /**
     * Store a newly created Materia_espacio in storage.
     *
     * @param CreateMateria_espacioRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        // Asumiendo que 'espacios_id' es el campo que contiene la clave foránea en el formulario
        $espacioId = $request->input('espacios_id');
        $materiaId = $request->input('materias_id'); // Añadido para validar la capacidad de la materia seleccionada
        $diaSemana = $request->input('dia_semana');
        $horaEntrada = $request->input('hora_entrada');
        $horaSalida = $request->input('hora_salida');
    
        // Encuentra el espacio correspondiente al 'espacios_id' enviado
        $espacio = Espacio::find($espacioId);
        if (!$espacio) {
            Flash::error('El espacio seleccionado no existe.');
            return redirect(route('materiaEspacios.index'));
        }
    
        // Encuentra la materia correspondiente al 'materias_id' enviado
        $materia = Materia::find($materiaId);
        if (!$materia) {
            Flash::error('La materia seleccionada no existe.');
            return redirect(route('materiaEspacios.index'));
        }
    
        // Validar que la capacidad del espacio sea suficiente
        if ($materia->cantidadAlu > $espacio->capacidadEsp + 5) {
            Flash::error('El espacio seleccionado no puede albergar a todos los estudiantes de la materia.');
            return redirect(route('materiaEspacios.index'));
        }
    
        // Validación para evitar solapamientos de horarios
        $existe = Materia_espacio::where('dia_semana', $diaSemana)
            ->whereHas('espacio', function ($query) use ($espacio) {
                $query->where('salaEsp', $espacio->salaEsp)
                      ->where('sectorEsp', $espacio->sectorEsp);
            })
            ->where(function ($query) use ($horaEntrada, $horaSalida) {
                $query->where(function ($q) use ($horaEntrada, $horaSalida) {
                    $q->where('hora_entrada', '<', $horaSalida)
                      ->where('hora_salida', '>', $horaEntrada);
                });
            })->exists();
    
        if ($existe) {
            // Si existe un registro con un solapamiento de horario, no se guarda y se retorna un mensaje
            Flash::error('La sala ya está asignada dentro del rango de horario seleccionado.');
            return redirect(route('materiaEspacios.index'));
        } else {
            // Si no existe solapamiento, se procede a guardar el nuevo registro
            $materiaEspacio = new Materia_espacio($request->all());
            $materiaEspacio->save();
            Flash::success('Sala asignada correctamente.');
            return redirect(route('materiaEspacios.index'));
        }
    }
    

    
public function getEspacios($materiaId)
{
    // Encuentra la materia por ID
    $materia = Materia::find($materiaId);

    if (!$materia) {
        return response()->json([], 404); // Devuelve una respuesta vacía si la materia no se encuentra
    }

    // Obtén la cantidad de alumnos para la materia seleccionada
    $cantidadAlu = $materia->cantidadAlu;

    // Filtra los espacios basados en la capacidad, restando 5 para permitir cierto margen
    $espacios = Espacio::where('capacidadEsp', '>=', $cantidadAlu)->get();

    // Devuelve los espacios en formato JSON
    return response()->json($espacios);
}

    


    /**
     * Display the specified Materia_espacio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materiaEspacio = $this->materiaEspacioRepository->find($id);
    
        if (empty($materiaEspacio)) {
            Flash::error('Materia Espacio not found');
    
            return redirect(route('materiaEspacios.index'));
        }
    
        // Obtener todas las materias y pluck 'nombreMat' con su 'id' correspondiente
        $materias = Materia::pluck('nombreMat', 'id');
        
        // Obtener todos los espacios y concatenar 'salaEsp', 'sectorEsp' y 'edificioEsp' para cada uno
        $espacios = Espacio::all()->mapWithKeys(function ($espacio) {
            return [$espacio->id => $espacio->salaEsp . ' - ' . $espacio->sectorEsp . '   ' . $espacio->edificioEsp];
        });
    
        // Asegúrate de tener las relaciones adecuadas en tus modelos para acceder a 'curso' y 'carrera'
        $cursos = Curso::pluck('nombreCur', 'id');
        $carreras = Carrera::pluck('nombreCarr', 'id');
    
        // Retornar la vista 'materia_espacios.show' con las variables 'materiaEspacio', 'materias', 'espacios', 'cursos' y 'carreras'
        return view('materia_espacios.show', compact('materiaEspacio', 'materias', 'espacios', 'cursos', 'carreras'));
    }
    /**
     * Show the form for editing the specified Materia_espacio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
{
    $materiaEspacio = $this->materiaEspacioRepository->find($id);

    if (empty($materiaEspacio)) {
        Flash::error('Materia Espacio not found');
        return redirect(route('materiaEspacios.index'));
    }

    // Obtener todas las materias y pluck 'nombreMat' con su 'id' correspondiente
    $materias = Materia::pluck('nombreMat', 'id');
    
    // Obtener todos los espacios y concatenar 'salaEsp', 'sectorEsp' y 'edificioEsp' para cada uno
    $espacios = Espacio::all()->mapWithKeys(function ($espacio) {
        return [$espacio->id => $espacio->salaEsp . ' - ' . $espacio->sectorEsp . ' - ' . $espacio->edificioEsp];
    });

    // Asegúrate de tener las relaciones adecuadas en tus modelos para acceder a 'curso' y 'carrera'
    $cursos = Curso::pluck('nombreCur', 'id');
    $carreras = Carrera::pluck('nombreCarr', 'id');

    // Retornar la vista 'materia_espacios.edit' con las variables 'materiaEspacio', 'materias', 'espacios', 'cursos' y 'carreras'
    return view('materia_espacios.edit', compact('materiaEspacio', 'materias', 'espacios', 'cursos', 'carreras'));
}


    /**
     * Update the specified Materia_espacio in storage.
     *
     * @param int $id
     * @param UpdateMateria_espacioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMateria_espacioRequest $request)
    {
        $materiaEspacio = $this->materiaEspacioRepository->find($id);

        if (empty($materiaEspacio)) {
            Flash::error('Materia Espacio not found');

            return redirect(route('materiaEspacios.index'));
        }

        $materiaEspacio = $this->materiaEspacioRepository->update($request->all(), $id);

        Flash::success('Materia Espacio updated successfully.');

        return redirect(route('materiaEspacios.index'));
    }

    /**
     * Remove the specified Materia_espacio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materiaEspacio = $this->materiaEspacioRepository->find($id);

        if (empty($materiaEspacio)) {
            Flash::error('Materia Espacio not found');

            return redirect(route('materiaEspacios.index'));
        }

        $this->materiaEspacioRepository->delete($id);

        Flash::success('Materia Espacio deleted successfully.');

        return redirect(route('materiaEspacios.index'));
    }
}
