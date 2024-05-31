<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BorrowTransaction;
use App\Models\Stock;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BorrowTransactionController extends Controller
{
    public function index(Request $request)
    {
        $semester = $request->semester;
//        $subjects = Subject::get()->groupBy('semester');
        $semesters = range(1,8);
        $books = [];

        if ($semester) {
            $books = Book::query()
                ->withCount([
                    'stocks as available_stocks' => function ($query) {
                        $query->where('is_borrowed', false);
                    },
                ])
                ->whereRaw("JSON_CONTAINS(semester, ?, '$')", $semester)
                ->get();
        }

        return view('user.borrow-transaction.index', compact('semester', 'semesters', 'books'));
    }

    public function store(Request $request)
    {
        $book = Book::find($request->book_id);
        if (!$book) {
            return back()->with('error', 'Buku tidak ditemukan');
        }

        // check if has borrowed before
        $checkBorrow = BorrowTransaction::query()
            ->where('book_id', $request->book_id)
            ->where('user_id', auth()->id())
            ->count();
        if ($checkBorrow > 0) {
            return back()->with('error', 'Buku dengan judul yang sama masih dalam proses peminjaman');
        }

        // check if stock exists
        $checkStock = Stock::query()
            ->where('book_id', $request->book_id)
            ->where('is_borrowed', false);

        if ($checkStock->count() == 0) {
            return back()->with('error', 'Stok buku tidak tersedia');
        }

        $tx = BorrowTransaction::create([
            'code' => auth()->id() . Str::random(7 - Str::length(auth()->id())),
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
        ]);

        return back()->with('success', 'Berhasil meminjam buku. Kode peminjaman: ' . $tx->code);
    }
}
