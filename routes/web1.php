<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SemesterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Tambahkan route baru untuk semester1
Route::get('/semester1', [SemesterController::class, 'semester1'])->name('semester1');