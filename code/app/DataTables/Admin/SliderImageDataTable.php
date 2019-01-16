<?php

namespace App\DataTables\Admin;

use App\Models\Admin\SliderImage;
use Form;
use Yajra\Datatables\Services\DataTable;

class SliderImageDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.slider_images.datatables_actions')
            ->editColumn('url', function ($model) {
                if ($model->url) {
                    return '<img src="'.url('/').'/images/'.$model->url.'" height="100" />';
                }
                return '';
            })
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
        $sliderImages = SliderImage::query();

        return $this->applyScopes($sliderImages);
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
            'text' => ['name' => 'text', 'data' => 'text'],
            'url' => ['name' => 'url', 'data' => 'url']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sliderImages';
    }
}
