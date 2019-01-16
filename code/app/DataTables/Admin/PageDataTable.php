<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Page;
use Form;
use Yajra\Datatables\Services\DataTable;

class PageDataTable extends DataTable
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.pages.datatables_actions')
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
        $pages = Page::query();

        return $this->applyScopes($pages);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->addIndex()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'pageLength' => 20,
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
            'language' => ['name' => 'lang', 'data' => 'lang'],
            'title' => ['name' => 'title', 'data' => 'title'],
            'description' => ['name' => 'content', 'data' => 'description']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'pages';
    }
}