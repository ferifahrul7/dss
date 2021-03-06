<?php

namespace App\DataTables;

use App\Models\BobotKriteria;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BobotKriteriaDataTable extends DataTable
{
    public $kriteria_id;

    protected function url()
    {
        // dd($this->kriteria_id);
        return route('bobot-kriteria.ajaxtable',$this->kriteria_id);
    }
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
            ->addIndexColumn()
            ->editColumn('created_at',function($val){
                return tanggalWaktuFormat($val->created_at);
            })
            ->addColumn('action', function ($val) {
                return view(
                    'dashboard.bobot-kriteria._action',
                    [
                        'id' => $val->id,
                    ]
                );
            })
            ->toJson();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\BobotKriteria $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BobotKriteria $model)
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
            ->setTableId('bobot-kriteria-table')
            ->addTableClass('table-hover table-striped table-sm table-bordered')
            ->columns($this->getColumns())
            ->minifiedAjax($this->url(), null, [
                'term'   => "function(){ return $('input#term').val(); }",
            ])
            ->parameters([
                'pageLength' => 5,
                'paging'     => true,
                'processing' => true,
                'serverSide' => true,
                'responsive' => true,
                'dom'        => '<t<p >>',
                'destroy'   => true,
                'autoWidth' => false,
                'language' => [
                    'lengthMenu' => '_MENU_',
                    'info' => 'Menampilkan <b>_START_ sampai _END_</b> dari _TOTAL_ data',
                    'zeroRecords' => 'Tidak ada data',
                    'emptyTable' => 'Data tidak tersedia',
                    'loadingRecords' => 'Loading...',
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex')->searchable(false)->title('#'),
            Column::make('kode_bobot')->title('KODE'),
            Column::make('keterangan')->title('KETERANGAN'),
            Column::make('bobot')->title('BOBOT'),
            Column::make('created_at')->title('DIBUAT'),
            Column::computed('action')
                ->title('AKSI')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center text-nowrap'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'BobotKriteria_' . date('YmdHis');
    }
}
