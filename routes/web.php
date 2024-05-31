<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes(['reset' => false]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');

    Route::resource('borrow-transactions', \App\Http\Controllers\User\BorrowTransactionController::class)
        ->only(['index', 'store']);

    Route::get('histories', [\App\Http\Controllers\User\HistoryController::class, 'index'])
        ->name('histories.index');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('books', \App\Http\Controllers\Admin\BookController::class)
        ->except(['show']);

    Route::post('books/{book}/generate-stock', [\App\Http\Controllers\Admin\BookController::class, 'generateStock'])
        ->name('books.stocks.generate');

    Route::delete('books/{book}/stock/{stock}', [\App\Http\Controllers\Admin\BookController::class, 'destroyStock'])
        ->name('books.stocks.destroy');

    Route::get('borrow-transactions', [\App\Http\Controllers\Admin\BorrowTransactionController::class, 'index'])
        ->name('borrow-transactions.index');

    Route::get('borrow-transactions/{transaction}', [\App\Http\Controllers\Admin\BorrowTransactionController::class, 'show'])
        ->name('borrow-transactions.show');

    Route::post('borrow-transactions/{transaction}/borrow', [\App\Http\Controllers\Admin\BorrowTransactionController::class, 'borrow'])
        ->name('borrow-transactions.borrow');

    Route::post('borrow-transactions/{transaction}/return', [\App\Http\Controllers\Admin\BorrowTransactionController::class, 'return'])
        ->name('borrow-transactions.return');
});
