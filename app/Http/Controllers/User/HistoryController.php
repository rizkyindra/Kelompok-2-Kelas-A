<?php

namespace App\Http\Controllers\User;

use App\DataTables\BorrowTransactionUserDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(BorrowTransactionUserDataTable $dataTable)
    {
        return $dataTable->render('user.history.index');
    }
}
