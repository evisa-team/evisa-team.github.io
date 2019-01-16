<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ConfigDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateConfigRequest;
use App\Http\Requests\Admin\UpdateConfigRequest;
use App\Repositories\Admin\ConfigRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ConfigController extends AppBaseController
{
    /** @var  ConfigRepository */
    private $configRepository;

    public function __construct(ConfigRepository $configRepo)
    {
        $this->configRepository = $configRepo;
    }

    /**
     * Display a listing of the Config.
     *
     * @param ConfigDataTable $configDataTable
     * @return Response
     */
    public function index(ConfigDataTable $configDataTable)
    {
        return $configDataTable->render('admin.configs.index');
    }

    /**
     * Show the form for creating a new Config.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.configs.create');
    }

    /**
     * Store a newly created Config in storage.
     *
     * @param CreateConfigRequest $request
     *
     * @return Response
     */
    public function store(CreateConfigRequest $request)
    {
        $input = $request->all();

        $config = $this->configRepository->create($input);

        Flash::success('Config saved successfully.');

        return redirect(route('admin.configs.index'));
    }

    /**
     * Display the specified Config.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            Flash::error('Config not found');

            return redirect(route('admin.configs.index'));
        }

        return view('admin.configs.show')->with('config', $config);
    }

    /**
     * Show the form for editing the specified Config.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            Flash::error('Config not found');

            return redirect(route('admin.configs.index'));
        }

        return view('admin.configs.edit')->with('config', $config);
    }

    /**
     * Update the specified Config in storage.
     *
     * @param  int              $id
     * @param UpdateConfigRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfigRequest $request)
    {
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            Flash::error('Config not found');

            return redirect(route('admin.configs.index'));
        }

        $config = $this->configRepository->update($request->all(), $id);

        Flash::success('Config updated successfully.');

        return redirect(route('admin.configs.index'));
    }

    /**
     * Remove the specified Config from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $config = $this->configRepository->findWithoutFail($id);

        if (empty($config)) {
            Flash::error('Config not found');

            return redirect(route('admin.configs.index'));
        }

        $this->configRepository->delete($id);

        Flash::success('Config deleted successfully.');

        return redirect(route('admin.configs.index'));
    }
}
