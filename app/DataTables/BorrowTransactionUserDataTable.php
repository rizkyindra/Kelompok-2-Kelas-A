<?php

namespace App\DataTables;

use App\Models\BorrowTransaction;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BorrowTransactionUserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('action', 'borrowtransaction.action');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BorrowTransaction $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['book:id,title,year,publisher,author,semester', 'stock:id,code'])
            ->where('user_id', auth()->id());
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('borrowtransaction-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('print'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('DT_RowIndex')
                ->title('No'),
            Column::make('code')
                ->title('Kode Peminjaman'),
            Column::make('book.title')
                ->title('Judul Buku')
                ->render('full.book.title + "<br><span class=text-muted>Tahun: " + full.book.year + ", Penulis: " + full.book.author + ", Penerbit: " + full.book.publisher + "</span>"'),
//            Column::make('book.subject_name')
//                ->title('Mata Kuliah')
//                ->orderable(false),
            Column::make('book.semester')
                ->title('Semester')
                ->orderable(false),
            Column::make('stock.code')
                ->title('Kode Buku')
                ->render("data ?? '-'")
                ->orderable(false),
            Column::make('borrowed_at')
                ->title('Tanggal Pengambilan')
                ->render("data ?? 'Belum diambil'"),
            Column::make('returned_at')
                ->title('Tanggal Pengembalian')
                ->render("data ?? '-'"),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'BorrowTransaction_' . date('YmdHis');
    }
}
