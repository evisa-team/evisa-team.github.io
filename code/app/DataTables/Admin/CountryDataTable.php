<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Country;
use Form;
use Yajra\Datatables\Services\DataTable;

class CountryDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.countries.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $countries = Country::query();

        return $this->applyScopes($countries);
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
            'country_name' => ['name' => 'country_name', 'data' => 'country_name', 'title' => 'Name'],
            'country_name_ar' => ['name' => 'country_name_ar', 'data' => 'country_name_ar', 'title' => 'Name(Arabic)'],
            'country_iso_code' => ['name' => 'country_iso_code', 'data' => 'country_iso_code', 'title' => 'ISO code'],
            'country_isd_code' => ['name' => 'country_isd_code', 'data' => 'country_isd_code', 'title' => 'ISD code']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'countries';
    }
}
