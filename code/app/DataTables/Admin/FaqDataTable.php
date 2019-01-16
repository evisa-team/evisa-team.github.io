<?php

namespace App\DataTables\Admin;

use App\Models\Admin\Faq;
use Form;
use Yajra\Datatables\Services\DataTable;

class FaqDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.faqs.datatables_actions')
            ->filterColumn('lang', function($query, $keyword) {
                $keyword = strtolower($keyword);
                if ($keyword == 'arabic') {
                    $query->where('lang', 'ar');
                } elseif ($keyword == 'english') {
                    $query->where('lang', 'en');
                }
            })
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
        $faqs = Faq::query();
        if (!empty($this->request()->search['value'])) {
            if ($this->request()->search['value'] == 'Arabic') {
                $faqs->orWhere('lang', 'ar');
            } elseif ($this->request()->search['value'] == 'English') {
                $faqs->orWhere('lang', 'en');
            }
        }

        return $this->applyScopes($faqs);
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
            'question' => ['name' => 'question', 'data' => 'question'],
            'answer' => ['name' => 'answer', 'data' => 'answer'],
            'sort' => ['name' => 'sort', 'data' => 'sort'],
            'status' => ['name' => 'status', 'data' => 'status_name', 'render' => '"<span class=\"label status-"+data+"\">"+data+"</span>"']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'faqs';
    }
}
