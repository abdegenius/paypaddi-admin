<?php

namespace App\DataTables;

use App\Models\Betting;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BettingDataTable extends DataTable
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
            ->addColumn('action', function (Betting $betting) {
                return '<a href="' . route("betting", $betting->id) . '" class="btn btn-md btn-primary text-white font-weight-bold"> Manage </a>';
            })
            ->addColumn('email', function (Betting $betting){
                return $betting->user->email ?? '';
            })
            ->addColumn('created_at', function (Betting $betting){
                return date('Y-m-d H:i:sa', strtotime($betting->created_at));
            })
            ->addColumn('amount', function (Betting $betting){
                return amountNGN($betting->total_amount);
            })
            ->addColumn('reference', function (Betting $betting){
                return $betting->transaction_id;
            })
            ->addColumn('status', function (Betting $betting){
                return status($betting->status);
            })
            ->rawColumns(['status', 'amount', 'action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Betting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Betting $model): QueryBuilder
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
            ->setTableId('bettings')
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
            Column::make('biller_name'),
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
        return 'Bettings_' . date('YmdHis');
    }
}
