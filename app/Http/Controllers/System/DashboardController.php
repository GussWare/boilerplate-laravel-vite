<?php
namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index');
    }
}