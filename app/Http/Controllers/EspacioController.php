<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEspacioRequest;
use App\Http\Requests\UpdateEspacioRequest;
use App\Repositories\EspacioRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EspacioController extends AppBaseController
{
    /** @var EspacioRepository $espacioRepository*/
    private $espacioRepository;

    public function __construct(EspacioRepository $espacioRepo)
    {
        $this->espacioRepository = $espacioRepo;
    }

    /**
     * Display a listing of the Espacio.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $espacios = $this->espacioRepository->all();

        return view('espacios.index')
            ->with('espacios', $espacios);
    }

    /**
     * Show the form for creating a new Espacio.
     *
     * @return Response
     */
    public function create()
    {
        return view('espacios.create');
    }

    /**
     * Store a newly created Espacio in storage.
     *
     * @param CreateEspacioRequest $request
     *
     * @return Response
     */
    public function store(CreateEspacioRequest $request)
    {
        $input = $request->all();

        $espacio = $this->espacioRepository->create($input);

        Flash::success('Espacio saved successfully.');

        return redirect(route('espacios.index'));
    }

    /**
     * Display the specified Espacio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $espacio = $this->espacioRepository->find($id);

        if (empty($espacio)) {
            Flash::error('Espacio not found');

            return redirect(route('espacios.index'));
        }

        return view('espacios.show')->with('espacio', $espacio);
    }

    /**
     * Show the form for editing the specified Espacio.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $espacio = $this->espacioRepository->find($id);

        if (empty($espacio)) {
            Flash::error('Espacio not found');

            return redirect(route('espacios.index'));
        }

        return view('espacios.edit')->with('espacio', $espacio);
    }

    /**
     * Update the specified Espacio in storage.
     *
     * @param int $id
     * @param UpdateEspacioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEspacioRequest $request)
    {
        $espacio = $this->espacioRepository->find($id);

        if (empty($espacio)) {
            Flash::error('Espacio not found');

            return redirect(route('espacios.index'));
        }

        $espacio = $this->espacioRepository->update($request->all(), $id);

        Flash::success('Espacio updated successfully.');

        return redirect(route('espacios.index'));
    }

    /**
     * Remove the specified Espacio from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $espacio = $this->espacioRepository->find($id);

        if (empty($espacio)) {
            Flash::error('Espacio not found');

            return redirect(route('espacios.index'));
        }

        $this->espacioRepository->delete($id);

        Flash::success('Espacio deleted successfully.');

        return redirect(route('espacios.index'));
    }
}
