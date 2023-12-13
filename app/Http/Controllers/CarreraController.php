<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Repositories\CarreraRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Facultad;
use Flash;
use Response;

class CarreraController extends AppBaseController
{
    /** @var CarreraRepository $carreraRepository*/
    private $carreraRepository;

    public function __construct(CarreraRepository $carreraRepo)
    {
        $this->carreraRepository = $carreraRepo;
    }

    /**
     * Display a listing of the Carrera.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $carreras = $this->carreraRepository->all();

        return view('carreras.index')
            ->with('carreras', $carreras);
    }

    /**
     * Show the form for creating a new Carrera.
     *
     * @return Response
     */
    public function create()
    {

        $facultades =Facultad::pluck('nombreFacu','id');
        return view('carreras.create', compact('facultades'));
    }

    /**
     * Store a newly created Carrera in storage.
     *
     * @param CreateCarreraRequest $request
     *
     * @return Response
     */
    public function store(CreateCarreraRequest $request)
    {
        $input = $request->all();

        $carrera = $this->carreraRepository->create($input);

        Flash::success('Carrera saved successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Display the specified Carrera.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $carrera = $this->carreraRepository->find($id);
        $facultades= Facultad::pluck('nombreFacu','id');

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        //return view('carreras.show')->with('carrera', $carrera);
        return view ('carreras.show', compact('carrera', 'facultades'));
    }

    /**
     * Show the form for editing the specified Carrera.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $carrera = $this->carreraRepository->find($id);
        $facultades= Facultad::pluck('nombreFacu','id');

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        return view ('carreras.edit', compact('carrera', 'facultades'));

        //return view('carreras.edit')->with('carrera', $carrera);
    }

    /**
     * Update the specified Carrera in storage.
     *
     * @param int $id
     * @param UpdateCarreraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCarreraRequest $request)
    {
        $carrera = $this->carreraRepository->find($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        $carrera = $this->carreraRepository->update($request->all(), $id);

        Flash::success('Carrera updated successfully.');

        return redirect(route('carreras.index'));
    }

    /**
     * Remove the specified Carrera from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $carrera = $this->carreraRepository->find($id);

        if (empty($carrera)) {
            Flash::error('Carrera not found');

            return redirect(route('carreras.index'));
        }

        $this->carreraRepository->delete($id);

        Flash::success('Carrera deleted successfully.');

        return redirect(route('carreras.index'));
    }
}
