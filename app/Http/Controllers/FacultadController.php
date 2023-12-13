<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacultadRequest;
use App\Http\Requests\UpdateFacultadRequest;
use App\Repositories\FacultadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FacultadController extends AppBaseController
{
    /** @var FacultadRepository $facultadRepository*/
    private $facultadRepository;

    public function __construct(FacultadRepository $facultadRepo)
    {
        $this->facultadRepository = $facultadRepo;
    }

    /**
     * Display a listing of the Facultad.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $facultads = $this->facultadRepository->all();

        return view('facultads.index')
            ->with('facultads', $facultads);
    }

    /**
     * Show the form for creating a new Facultad.
     *
     * @return Response
     */
    public function create()
    {
        return view('facultads.create');
    }

    /**
     * Store a newly created Facultad in storage.
     *
     * @param CreateFacultadRequest $request
     *
     * @return Response
     */
    public function store(CreateFacultadRequest $request)
    {
        $input = $request->all();

        $facultad = $this->facultadRepository->create($input);

        Flash::success('Facultad saved successfully.');

        return redirect(route('facultads.index'));
    }

    /**
     * Display the specified Facultad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $facultad = $this->facultadRepository->find($id);

        if (empty($facultad)) {
            Flash::error('Facultad not found');

            return redirect(route('facultads.index'));
        }

        return view('facultads.show')->with('facultad', $facultad);
    }

    /**
     * Show the form for editing the specified Facultad.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $facultad = $this->facultadRepository->find($id);

        if (empty($facultad)) {
            Flash::error('Facultad not found');

            return redirect(route('facultads.index'));
        }

        return view('facultads.edit')->with('facultad', $facultad);
    }

    /**
     * Update the specified Facultad in storage.
     *
     * @param int $id
     * @param UpdateFacultadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFacultadRequest $request)
    {
        $facultad = $this->facultadRepository->find($id);

        if (empty($facultad)) {
            Flash::error('Facultad not found');

            return redirect(route('facultads.index'));
        }

        $facultad = $this->facultadRepository->update($request->all(), $id);

        Flash::success('Facultad updated successfully.');

        return redirect(route('facultads.index'));
    }

    /**
     * Remove the specified Facultad from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $facultad = $this->facultadRepository->find($id);

        if (empty($facultad)) {
            Flash::error('Facultad not found');

            return redirect(route('facultads.index'));
        }

        $this->facultadRepository->delete($id);

        Flash::success('Facultad deleted successfully.');

        return redirect(route('facultads.index'));
    }
}
