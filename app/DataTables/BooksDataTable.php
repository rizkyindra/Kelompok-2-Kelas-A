<?php

namespace App\DataTables;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BooksDataTable extends DataTable
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
            ->addColumn( 'action', function( $data ){
                return '<div class="h-stack gap-3">
                    <a class="btn btn-warning btn-sm" href="'. route('admin.books.edit', $data->id) .'"><i class="bi bi-pencil"></i></a>
                    <button
                        class="btn btn-danger btn-sm btn-delete"
                        onclick="if (window.confirm(`Konfirmasi`)) { document.getElementById(`delete-form`).setAttribute(`action`, `' . route('admin.books.destroy', $data->id) .'`); document.getElementById(`delete-form`).submit(); }"
                    >
                        <i class="bi bi-trash"></i>
                    </button>
                </div>';
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Book $model): QueryBuilder
    {
        return $model->newQuery()->withCount('stocks');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('books-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
//                    ->orderBy(0)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('add'),
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
            Column::make('title')
                ->title('Judul'),
            Column::make('author')
                ->title('Penulis'),
            Column::make('publisher')
                ->title('Penerbit'),
            Column::make('year')
                ->title('Tahun'),
//            Column::make('subject_name')
//                ->title('Mata Kuliah'),
            Column::make('semester'),
            Column::computed('stocks_count')
                ->title('Stok'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Books_' . date('YmdHis');
    }
}
