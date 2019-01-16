<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RelationDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateRelationRequest;
use App\Http\Requests\Admin\UpdateRelationRequest;
use App\Repositories\Admin\RelationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RelationController extends AppBaseController
{
    /** @var  RelationRepository */
    private $relationRepository;

    public function __construct(RelationRepository $relationRepo)
    {
        $this->relationRepository = $relationRepo;
    }

    /**
     * Display a listing of the Relation.
     *
     * @param RelationDataTable $relationDataTable
     * @return Response
     */
    public function index(RelationDataTable $relationDataTable)
    {
        return $relationDataTable->render('admin.relations.index');
    }

    /**
     * Show the form for creating a new Relation.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.relations.create');
    }

    /**
     * Store a newly created Relation in storage.
     *
     * @param CreateRelationRequest $request
     *
     * @return Response
     */
    public function store(CreateRelationRequest $request)
    {
        $input = $request->all();

        $relation = $this->relationRepository->create($input);

        Flash::success('Relation saved successfully.');

        return redirect(route('admin.relations.index'));
    }

    /**
     * Display the specified Relation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $relation = $this->relationRepository->findWithoutFail($id);

        if (empty($relation)) {
            Flash::error('Relation not found');

            return redirect(route('admin.relations.index'));
        }

        return view('admin.relations.show')->with('relation', $relation);
    }

    /**
     * Show the form for editing the specified Relation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $relation = $this->relationRepository->findWithoutFail($id);

        if (empty($relation)) {
            Flash::error('Relation not found');

            return redirect(route('admin.relations.index'));
        }

        return view('admin.relations.edit')->with('relation', $relation);
    }

    /**
     * Update the specified Relation in storage.
     *
     * @param  int              $id
     * @param UpdateRelationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRelationRequest $request)
    {
        $relation = $this->relationRepository->findWithoutFail($id);

        if (empty($relation)) {
            Flash::error('Relation not found');

            return redirect(route('admin.relations.index'));
        }

        $relation = $this->relationRepository->update($request->all(), $id);

        Flash::success('Relation updated successfully.');

        return redirect(route('admin.relations.index'));
    }

    /**
     * Remove the specified Relation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $relation = $this->relationRepository->findWithoutFail($id);

        if (empty($relation)) {
            Flash::error('Relation not found');

            return redirect(route('admin.relations.index'));
        }

        $this->relationRepository->delete($id);

        Flash::success('Relation deleted successfully.');

        return redirect(route('admin.relations.index'));
    }
}
