<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PurposeDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreatePurposeRequest;
use App\Http\Requests\Admin\UpdatePurposeRequest;
use App\Repositories\Admin\PurposeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class PurposeController extends AppBaseController
{
    /** @var  PurposeRepository */
    private $purposeRepository;

    public function __construct(PurposeRepository $purposeRepo)
    {
        $this->purposeRepository = $purposeRepo;
    }

    /**
     * Display a listing of the Purpose.
     *
     * @param PurposeDataTable $purposeDataTable
     * @return Response
     */
    public function index(PurposeDataTable $purposeDataTable)
    {
        return $purposeDataTable->render('admin.purposes.index');
    }

    /**
     * Show the form for creating a new Purpose.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.purposes.create');
    }

    /**
     * Store a newly created Purpose in storage.
     *
     * @param CreatePurposeRequest $request
     *
     * @return Response
     */
    public function store(CreatePurposeRequest $request)
    {
        $input = $request->all();

        $purpose = $this->purposeRepository->create($input);

        Flash::success('Purpose saved successfully.');

        return redirect(route('admin.purposes.index'));
    }

    /**
     * Display the specified Purpose.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purpose = $this->purposeRepository->findWithoutFail($id);

        if (empty($purpose)) {
            Flash::error('Purpose not found');

            return redirect(route('admin.purposes.index'));
        }

        return view('admin.purposes.show')->with('purpose', $purpose);
    }

    /**
     * Show the form for editing the specified Purpose.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purpose = $this->purposeRepository->findWithoutFail($id);

        if (empty($purpose)) {
            Flash::error('Purpose not found');

            return redirect(route('admin.purposes.index'));
        }

        return view('admin.purposes.edit')->with('purpose', $purpose);
    }

    /**
     * Update the specified Purpose in storage.
     *
     * @param  int              $id
     * @param UpdatePurposeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePurposeRequest $request)
    {
        $purpose = $this->purposeRepository->findWithoutFail($id);

        if (empty($purpose)) {
            Flash::error('Purpose not found');

            return redirect(route('admin.purposes.index'));
        }

        $purpose = $this->purposeRepository->update($request->all(), $id);

        Flash::success('Purpose updated successfully.');

        return redirect(route('admin.purposes.index'));
    }

    /**
     * Remove the specified Purpose from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purpose = $this->purposeRepository->findWithoutFail($id);

        if (empty($purpose)) {
            Flash::error('Purpose not found');

            return redirect(route('admin.purposes.index'));
        }

        $this->purposeRepository->delete($id);

        Flash::success('Purpose deleted successfully.');

        return redirect(route('admin.purposes.index'));
    }
}
