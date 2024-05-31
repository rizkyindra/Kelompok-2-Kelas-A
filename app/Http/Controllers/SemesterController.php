<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        // Logika untuk menangani request ke semester1
        return view('/semester1');
    }
}