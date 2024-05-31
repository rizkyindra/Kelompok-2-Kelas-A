<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BorrowTransactionAdminDataTable;
use App\Http\Controllers\Controller;
use App\Models\BorrowTransaction;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowTransactionController extends Controller
{
    public function index(BorrowTransactionAdminDataTable $dataTable)
    {
        return $dataTable->render('admin.borrow-transaction.index');
    }

    public function show(BorrowTransaction $transaction)
    {
        $transaction->loadMissing([
            'user',
            'book.stocks' => function($q) {
                $q->where('is_borrowed', false);
            }
        ]);

        return view('admin.borrow-transaction.show', compact('transaction'));
    }

    public function borrow(Request $request, BorrowTransaction $transaction)
    {
        $stock = Stock::where('book_id', $transaction->book_id)->where('is_borrowed', false)->where('id', $request->stock_id)->first();
        if(!$stock) {
            return back()->with('error', 'Kode buku tidak ditemukan');
        }

        DB::beginTransaction();
        $transaction->update(['stock_code' => $stock->code, 'stock_id' => $stock->id, 'borrowed_at' => now()]);
        $stock->update(['is_borrowed' => true]);
        DB::commit();

        return back()->with('success', 'Berhasil konfirmasi peminjaman');
    }

    public function return(Request $request, BorrowTransaction $transaction)
    {
        DB::beginTransaction();
        $transaction->update(['returned_at' => now()]);
        $transaction->stock->update(['is_borrowed' => false]);
        DB::commit();

        return back()->with('success', 'Berhasil konfirmasi pengembalian');
    }
}
