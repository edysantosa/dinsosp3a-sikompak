<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // return view('dashboard');
        dd(\Carbon\Carbon::now()->subYears(5)->toDateString());
    }
}
