<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Application;
use Form;
use Yajra\Datatables\Services\DataTable;

class ApplicationDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.applications.datatables_actions')
            ->filterColumn('status', function($query, $keyword) {
                $keyword = strtolower($keyword);
                if ($keyword == 'inactive') {
                    $query->where('status', 0);
                } elseif ($keyword == 'active') {
                    $query->where('status', 1);
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
        $applications = Application::query()->with('residenceCountry');

        return $this->applyScopes($applications);
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
            'ref_no' => ['name' => 'ref_no', 'data' => 'ref_no', 'title' => 'Reference ID'],
            'full_name' => ['name' => 'full_name', 'data' => 'full_name'],
            'residence_country' => ['name' => 'residence_country.country_name', 'data' => 'residence_country.country_name', 'title' => 'country'],
            'created_at' => ['name' => 'created_at', 'data' => 'created_at'],
            'status' => ['name' => 'status', 'data' => 'status_name', 'render' => '"<span class=\"label app_status-"+data+"\">"+data+"</span>"']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'applications';
    }
}
