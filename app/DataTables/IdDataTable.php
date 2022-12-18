<?php

namespace App\DataTables;

use App\Models\Kyc;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class IdDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Kyc $id) {
                return '<a href="' . route("id", $id->id) . '" class="btn btn-md btn-primary text-white font-weight-bold"> Manage </a>';
            })
            ->addColumn('email', function (Kyc $id){
                return $id->user->email ?? '';
            })
            ->addColumn('created_at', function (Kyc $id){
                return date('Y-m-d H:i:sa', strtotime($id->created_at));
            })
            ->addColumn('status', function (Kyc $id){
                return $id->status ? 'Approved' : 'Unapproved';
            })
            ->rawColumns(['status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Kyc $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Kyc $model): QueryBuilder
    {
        return $model->where('level', '=', '2')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ids')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('status'),
            Column::make('email'),
            Column::make('value'),
            Column::make('created_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Kycs_' . date('YmdHis');
    }
}
