<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createmateria_espacios_auditRequest;
use App\Http\Requests\Updatemateria_espacios_auditRequest;
use App\Repositories\materia_espacios_auditRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class materia_espacios_auditController extends AppBaseController
{
    /** @var materia_espacios_auditRepository $materiaEspaciosAuditRepository*/
    private $materiaEspaciosAuditRepository;

    public function __construct(materia_espacios_auditRepository $materiaEspaciosAuditRepo)
    {
        $this->materiaEspaciosAuditRepository = $materiaEspaciosAuditRepo;
    }

    /**
     * Display a listing of the materia_espacios_audit.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $materiaEspaciosAudits = $this->materiaEspaciosAuditRepository->all();

        return view('materia_espacios_audits.index')
            ->with('materiaEspaciosAudits', $materiaEspaciosAudits);
    }

    /**
     * Show the form for creating a new materia_espacios_audit.
     *
     * @return Response
     */
    public function create()
    {
        return view('materia_espacios_audits.create');
    }

    /**
     * Store a newly created materia_espacios_audit in storage.
     *
     * @param Createmateria_espacios_auditRequest $request
     *
     * @return Response
     */
    public function store(Createmateria_espacios_auditRequest $request)
    {
        $input = $request->all();

        $materiaEspaciosAudit = $this->materiaEspaciosAuditRepository->create($input);

        Flash::success('Materia Espacios Audit saved successfully.');

        return redirect(route('materiaEspaciosAudits.index'));
    }

    /**
     * Display the specified materia_espacios_audit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $materiaEspaciosAudit = $this->materiaEspaciosAuditRepository->find($id);

        if (empty($materiaEspaciosAudit)) {
            Flash::error('Materia Espacios Audit not found');

            return redirect(route('materiaEspaciosAudits.index'));
        }

        return view('materia_espacios_audits.show')->with('materiaEspaciosAudit', $materiaEspaciosAudit);
    }

    /**
     * Show the form for editing the specified materia_espacios_audit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $materiaEspaciosAudit = $this->materiaEspaciosAuditRepository->find($id);

        if (empty($materiaEspaciosAudit)) {
            Flash::error('Materia Espacios Audit not found');

            return redirect(route('materiaEspaciosAudits.index'));
        }

        return view('materia_espacios_audits.edit')->with('materiaEspaciosAudit', $materiaEspaciosAudit);
    }

    /**
     * Update the specified materia_espacios_audit in storage.
     *
     * @param int $id
     * @param Updatemateria_espacios_auditRequest $request
     *
     * @return Response
     */
    public function update($id, Updatemateria_espacios_auditRequest $request)
    {
        $materiaEspaciosAudit = $this->materiaEspaciosAuditRepository->find($id);

        if (empty($materiaEspaciosAudit)) {
            Flash::error('Materia Espacios Audit not found');

            return redirect(route('materiaEspaciosAudits.index'));
        }

        $materiaEspaciosAudit = $this->materiaEspaciosAuditRepository->update($request->all(), $id);

        Flash::success('Materia Espacios Audit updated successfully.');

        return redirect(route('materiaEspaciosAudits.index'));
    }

    /**
     * Remove the specified materia_espacios_audit from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $materiaEspaciosAudit = $this->materiaEspaciosAuditRepository->find($id);

        if (empty($materiaEspaciosAudit)) {
            Flash::error('Materia Espacios Audit not found');

            return redirect(route('materiaEspaciosAudits.index'));
        }

        $this->materiaEspaciosAuditRepository->delete($id);

        Flash::success('Materia Espacios Audit deleted successfully.');

        return redirect(route('materiaEspaciosAudits.index'));
    }
}
