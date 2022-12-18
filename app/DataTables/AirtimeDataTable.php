<?php

namespace App\DataTables;

use App\Models\Airtime;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AirtimeDataTable extends DataTable
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
            ->addColumn('action', function (Airtime $airtime) {
                return '<a href="' . route("airtime", $airtime->id) . '" class="btn btn-md btn-primary text-white font-weight-bold"> Manage </a>';
            })
            ->addColumn('email', function (Airtime $airtime){
                return $airtime->user->email ?? '';
            })
            ->addColumn('created_at', function (Airtime $airtime){
                return date('Y-m-d H:i:sa', strtotime($airtime->created_at));
            })
            ->addColumn('amount', function (Airtime $airtime){
                return amountNGN($airtime->total_amount);
            })
            ->addColumn('reference', function (Airtime $airtime){
                return $airtime->transaction_id;
            })
            ->addColumn('status', function (Airtime $airtime){
                return status($airtime->status);
            })
            ->rawColumns(['status', 'amount', 'action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Airtime $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Airtime $model): QueryBuilder
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
            ->setTableId('airtimes')
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
        return 'Airtimes_' . date('YmdHis');
    }
}
