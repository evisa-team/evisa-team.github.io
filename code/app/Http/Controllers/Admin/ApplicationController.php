<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ApplicationDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateApplicationRequest;
use App\Http\Requests\Admin\UpdateApplicationRequest;
use App\Repositories\Admin\ApplicationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ApplicationController extends AppBaseController
{
    /** @var  ApplicationRepository */
    private $applicationRepository;

    public function __construct(ApplicationRepository $applicationRepo)
    {
        $this->applicationRepository = $applicationRepo;
    }

    /**
     * Display a listing of the Application.
     *
     * @param ApplicationDataTable $applicationDataTable
     * @return Response
     */
    public function index(ApplicationDataTable $applicationDataTable)
    {
        return $applicationDataTable->render('admin.applications.index');
    }

    /**
     * Show the form for creating a new Application.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.applications.create');
    }

    /**
     * Store a newly created Application in storage.
     *
     * @param CreateApplicationRequest $request
     *
     * @return Response
     */
    public function store(CreateApplicationRequest $request)
    {
        $input = $request->all();

        $application = $this->applicationRepository->create($input);

        Flash::success('Application saved successfully.');

        return redirect(route('admin.applications.index'));
    }

    /**
     * Display the specified Application.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $application = $this->applicationRepository->with('residenceCountry')->findWithoutFail($id);

        if (empty($application)) {
            Flash::error('Application not found');

            return redirect(route('admin.applications.index'));
        }

        $application->nationality_name = '';
        if ($application->nationality) {
            $application->nationality_name = \App\Models\Admin\Country::find($application->nationality)->country_name;
        }

        return view('admin.applications.show')->with('application', $application);
    }

    /**
     * Show the form for editing the specified Application.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $application = $this->applicationRepository->findWithoutFail($id);

        if (empty($application)) {
            Flash::error('Application not found');

            return redirect(route('admin.applications.index'));
        }

        return view('admin.applications.edit')->with('application', $application);
    }

    /**
     * Update the specified Application in storage.
     *
     * @param  int              $id
     * @param UpdateApplicationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateApplicationRequest $request)
    {
        $application = $this->applicationRepository->findWithoutFail($id);

        if (empty($application)) {
            Flash::error('Application not found');

            return redirect(route('admin.applications.index'));
        }

        $application = $this->applicationRepository->update($request->all(), $id);

        Flash::success('Application updated successfully.');

        return redirect(route('admin.applications.index'));
    }

    /**
     * Remove the specified Application from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $application = $this->applicationRepository->findWithoutFail($id);

        if (empty($application)) {
            Flash::error('Application not found');

            return redirect(route('admin.applications.index'));
        }

        $this->applicationRepository->delete($id);

        Flash::success('Application deleted successfully.');

        return redirect(route('admin.applications.index'));
    }

    public function changeStatus($id, $status)
    {
        $application = $this->applicationRepository->findWithoutFail($id);

        if (empty($application)) {
            Flash::error('Application not found');

            return redirect(route('admin.applications.index'));
        }

        $statusValues = [
            'New' => '0',
            'Approved' => '1',
            'Rejected' => '2',
            'Completed' => '3',
            'Delivered' => '3'
        ];

        if (!isset($statusValues[$status])) {
            Flash::error('Invalid status');

            return redirect(route('admin.drivers.index'));
        }

        $application->status = $statusValues[$status];
        $application->save();

        Flash::success('Application status changed successfully.');

        return back();
    }
}
