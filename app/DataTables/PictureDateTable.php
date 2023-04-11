<?php

namespace App\DataTables;

use App\Models\Picture;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class PictureDateTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
              ->editColumn('created_at', function ($query) {
                return Carbon::parse($query->created_at)->format('Y-m-d');
            })
            ->editColumn('image', function (Picture $model) {
                return "<img src=".$model->image_path." width='50' height='50' />";
             })
            ->addColumn('album', function (Picture $model) {
                return $model->album->name;
             })
            ->addIndexColumn()
        
            ->addColumn('action', function ($query) {
                $row = $query;
                $module_name_singular = 'picture';
                $module_name_plural   = 'pictures';
                return view('dashboard.includes.buttons.edit', compact('module_name_singular', 'module_name_plural', 'row')) .  view('dashboard.includes.buttons.delete', compact('module_name_singular', 'module_name_plural', 'row')) ;  
            
            })
            ->rawColumns(['album','image','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Picture $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
        ->setTableId('picture-table')
        ->columns($this->getColumns())
        ->minifiedAjax()
        ->dom('Bfrtip')
        ->orderBy(1)
        ->language(['url'=>asset('assets/datatable-lang/' . app()->getLocale() . '.json')])
        ->buttons(
            Button::make('create'),
            Button::make('export'),
            Button::make('print'),
            Button::make('reset'),
            Button::make('reload')
        );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->addClass('text-center')->orderable(false)->searchable(false)->title(__('site.id')),
            Column::make('name')->addClass('text-center')->title(__('site.name')),
            Column::make('album')->addClass('text-center')->title(__('site.album')),
            Column::make('image')->addClass('text-center')->title(__('site.image')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')->title(__('site.action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    // protected function filename()
    // {
    //     return 'User_' . date('YmdHis');
    // }
}
