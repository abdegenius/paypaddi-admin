<?php

namespace App\DataTables;

use App\Models\Electricity;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ElectricityDataTable extends DataTable
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
            ->addColumn('action', function (Electricity $electricity) {
                return '<a href="' . route("electricity", $electricity->id) . '" class="btn btn-md btn-primary text-white font-weight-bold"> Manage </a>';
            })
            ->addColumn('email', function (Electricity $electricity){
                return $electricity->user->email ?? '';
            })
            ->addColumn('created_at', function (Electricity $electricity){
                return date('Y-m-d H:i:sa', strtotime($electricity->created_at));
            })
            ->addColumn('amount', function (Electricity $electricity){
                return amountNGN($electricity->total_amount);
            })
            ->addColumn('transaction_id', function (Electricity $electricity){
                return $electricity->transaction_id;
            })
            ->addColumn('status', function (Electricity $electricity){
                return status($electricity->status);
            })
            ->rawColumns(['status', 'amount', 'action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Electricity $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Electricity $model): QueryBuilder
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
            ->setTableId('electricitys')
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
            Column::make('transaction_id'),
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
        return 'Electricitys_' . date('YmdHis');
    }
}
