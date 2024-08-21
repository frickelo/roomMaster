<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMateriaRequest;
use App\Http\Requests\UpdateMateriaRequest;
use App\Repositories\MateriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Carrera;
use Flash;
use Response;

class MateriaController extends AppBaseController
{
    /** @var MateriaRepository $materiaRepository*/
    private $materiaRepository;

    public function __construct(MateriaRepository $materiaRepo)
    {
        $this->materiaRepository = $materiaRepo;
    }

    /**
     * Display a listing of the Materia.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
{
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        $materias = Materia::whereHas('carrera', function ($query) use ($user) {
            $query->where('facultades_id', $user->facultades_id);
        })->get();
    } elseif ($user->hasRole('super_admin')) {
        $materias = Materia::all();
    } else {
        $materias = Materia::all();
    }

    return view('materias.index')
        ->with('materias', $materias);
}


public function getMaterias()
{
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        $facultadId = $user->facultades_id;
        $materias = Materia::whereHas('carrera', function ($query) use ($facultadId) {
            $query->where('facultades_id', $facultadId);
        })->get();
    } elseif ($user->hasRole('super_admin')) {
        $materias = Materia::all();
    } else {
        $materias = Materia::all();
    }

    return view('materias.index', compact('materias'));
}


    /**
     * Show the form for creating a new Materia.
     *
     * @return Response
     */
    public function create()
    {
        $carreras = Carrera::pluck('nombreCarr', 'id');
        return view('materias.create', compact('carreras'));
       // return view('materias.create');
    }

    /**
     * Store a newly created Materia in storage.
     *
     * @param CreateMateriaRequest $request
     *
     * @return Response
     */
    public function store(CreateMateriaRequest $request)
    {
        $input = $request->all();

        $materia = $this->materiaRepository->create($input);

        Flash::success('Materia saved successfully.');

        return redirect(route('materias.index'));
    }

    /**
     * Display the specified Materia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materia = $this->materiaRepository->find($id);
        $carreras =Carrera::pluck('nombreCarr','id');

        if (empty($materia)) {
            Flash::error('Materia not found');

            return redirect(route('materias.index'));
        }
        
        return view ('materias.show', compact('materia', 'carreras'));
        //return view('materias.show')->with('materia', $materia);
    }

    /**
     * Show the form for editing the specified Materia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materia = $this->materiaRepository->find($id);
        $carreras =Carrera::pluck('nombreCarr','id');
        if (empty($materia)) {
            Flash::error('Materia not found');

            return redirect(route('materias.index'));
        }

        //return view('materias.edit')->with('materia', $materia);
        return view ('materias.edit', compact('materia', 'carreras'));
    }

    /**
     * Update the specified Materia in storage.
     *
     * @param int $id
     * @param UpdateMateriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMateriaRequest $request)
    {
        $materia = $this->materiaRepository->find($id);

        if (empty($materia)) {
            Flash::error('Materia not found');

            return redirect(route('materias.index'));
        }

        $materia = $this->materiaRepository->update($request->all(), $id);

        Flash::success('Materia updated successfully.');

        return redirect(route('materias.index'));
    }

    /**
     * Remove the specified Materia from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materia = $this->materiaRepository->find($id);

        if (empty($materia)) {
            Flash::error('Materia not found');

            return redirect(route('materias.index'));
        }

        $this->materiaRepository->delete($id);

        Flash::success('Materia deleted successfully.');

        return redirect(route('materias.index'));
    }
}
