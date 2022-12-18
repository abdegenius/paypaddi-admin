<?php

namespace App\DataTables;

use App\Models\Cable;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CableDataTable extends DataTable
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
            ->addColumn('action', function (Cable $cable) {
                return '<a href="' . route("cable", $cable->id) . '" class="btn btn-md btn-primary text-white font-weight-bold"> Manage </a>';
            })
            ->addColumn('email', function (Cable $cable){
                return $cable->user->email ?? '';
            })
            ->addColumn('created_at', function (Cable $cable){
                return date('Y-m-d H:i:sa', strtotime($cable->created_at));
            })
            ->addColumn('amount', function (Cable $cable){
                return amountNGN($cable->total_amount);
            })
            ->addColumn('reference', function (Cable $cable){
                return $cable->transaction_id;
            })
            ->addColumn('status', function (Cable $cable){
                return status($cable->status);
            })
            ->rawColumns(['status', 'amount', 'action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Cable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Cable $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('cables')
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
            Column::make('reference'),
            Column::make('status'),
            Column::make('email'),
            Column::make('amount'),
            Column::make('name'),
            Column::make('biller_code'),
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
        return 'Cables_' . date('YmdHis');
    }
}
