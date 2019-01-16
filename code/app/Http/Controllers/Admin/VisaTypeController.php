<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\VisaTypeDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateVisaTypeRequest;
use App\Http\Requests\Admin\UpdateVisaTypeRequest;
use App\Repositories\Admin\VisaTypeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class VisaTypeController extends AppBaseController
{
    /** @var  VisaTypeRepository */
    private $visaTypeRepository;

    public function __construct(VisaTypeRepository $visaTypeRepo)
    {
        $this->visaTypeRepository = $visaTypeRepo;
    }

    /**
     * Display a listing of the VisaType.
     *
     * @param VisaTypeDataTable $visaTypeDataTable
     * @return Response
     */
    public function index(VisaTypeDataTable $visaTypeDataTable)
    {
        return $visaTypeDataTable->render('admin.visa_types.index');
    }

    /**
     * Show the form for creating a new VisaType.
     *
     * @return Response
     */
    public function create()
    {
        $sort = \App\Models\Admin\VisaType::max('sort') + 1;
        
        return view('admin.visa_types.create')->with('sort', $sort);
    }

    /**
     * Store a newly created VisaType in storage.
     *
     * @param CreateVisaTypeRequest $request
     *
     * @return Response
     */
    public function store(CreateVisaTypeRequest $request)
    {
        $input = $request->all();

        $visaType = $this->visaTypeRepository->create($input);

        Flash::success('Visa Type saved successfully.');

        return redirect(route('admin.visaTypes.index'));
    }

    /**
     * Display the specified VisaType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $visaType = $this->visaTypeRepository->findWithoutFail($id);

        if (empty($visaType)) {
            Flash::error('Visa Type not found');

            return redirect(route('admin.visaTypes.index'));
        }

        return view('admin.visa_types.show')->with('visaType', $visaType);
    }

    /**
     * Show the form for editing the specified VisaType.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $visaType = $this->visaTypeRepository->findWithoutFail($id);

        if (empty($visaType)) {
            Flash::error('Visa Type not found');

            return redirect(route('admin.visaTypes.index'));
        }

        return view('admin.visa_types.edit')->with('visaType', $visaType);
    }

    /**
     * Update the specified VisaType in storage.
     *
     * @param  int              $id
     * @param UpdateVisaTypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVisaTypeRequest $request)
    {
        $visaType = $this->visaTypeRepository->findWithoutFail($id);

        if (empty($visaType)) {
            Flash::error('Visa Type not found');

            return redirect(route('admin.visaTypes.index'));
        }

        $visaType = $this->visaTypeRepository->update($request->all(), $id);

        Flash::success('Visa Type updated successfully.');

        return redirect(route('admin.visaTypes.index'));
    }

    /**
     * Remove the specified VisaType from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $visaType = $this->visaTypeRepository->findWithoutFail($id);

        if (empty($visaType)) {
            Flash::error('Visa Type not found');

            return redirect(route('admin.visaTypes.index'));
        }

        $this->visaTypeRepository->delete($id);

        Flash::success('Visa Type deleted successfully.');

        return redirect(route('admin.visaTypes.index'));
    }
}
