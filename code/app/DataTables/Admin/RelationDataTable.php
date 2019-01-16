<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Relation;
use Form;
use Yajra\Datatables\Services\DataTable;

class RelationDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.relations.datatables_actions')
            ->filterColumn('lang', function($query, $keyword) {
                $keyword = strtolower($keyword);
                if ($keyword == 'arabic') {
                    $query->where('lang', 'ar');
                } elseif ($keyword == 'english') {
                    $query->where('lang', 'en');
                }
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $relations = Relation::query();

        return $this->applyScopes($relations);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '120px'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => []
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'lang' => ['name' => 'lang', 'data' => 'lang_name', 'title' => 'Language'],
            'name' => ['name' => 'name', 'data' => 'name']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'relations';
    }
}
