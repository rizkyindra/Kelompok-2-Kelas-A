<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BooksDataTable;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Stock;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookController extends Controller
{
    public function index(BooksDataTable $dataTable)
    {
        return $dataTable->render('admin.book.index');
    }

    public function create(Request $request)
    {
//        $subjects = Subject::get()->groupBy('semester');
        $semesters = range(1,8);
        return view('admin.book.create', compact('semesters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'cover_url' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|date_format:Y',
            'semester' => 'required|array',
            'semester.*' => 'required|in:1,2,3,4,5,6,7,8',
//            'subject_id' => 'required|array',
//            'subject_id.*' => 'required|exists:subjects,id',
        ]);
        $validated['semester'] = array_map('intval', $request->semester);
//        $validated['subject_id'] = array_map('intval', $request->subject_id);
//        $validated['subject_name'] = Subject::find($request->subject_id)->pluck('name');
        Book::create($validated);

        return redirect()->to(route('admin.books.index'))->with('success', 'Success create new book');
    }

    public function edit(Request $request, Book $book)
    {
        $book->loadMissing('stocks');
        $semesters = range(1,8);

        return view('admin.book.edit', compact('book', 'semesters'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required',
            'cover_url' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'year' => 'required|date_format:Y',
            'semester' => 'required|array',
            'semester.*' => 'required|in:1,2,3,4,5,6,7,8',
//            'subject_id' => 'required|array',
//            'subject_id.*' => 'required|exists:subjects,id',
        ]);
        $validated['semester'] = array_map('intval', $request->semester);
//        $validated['subject_id'] = array_map('intval', $request->subject_id);
//        $validated['subject_name'] = Subject::find($request->subject_id)->pluck('name');
        $book->update($validated);

        return redirect()->to(route('admin.books.index'))->with('success', 'Success update book');
    }

    public function destroy(Request $request, Book $book)
    {
        $book->delete();

        return redirect()->to(route('admin.books.index'))->with('success', 'Success delete book');
    }

    public function generateStock(Request $request, Book $book)
    {
        $book->stocks()->create(['code' => $book->id . Str::random(7 - Str::length($book->id))]);

        return redirect()->back()->with('success', 'Success create new stock');
    }

    public function destroyStock(Request $request, Book $book, Stock $stock)
    {
        $stock->delete();

        return redirect()->back()->with('success', 'Success delete stock');
    }
}
