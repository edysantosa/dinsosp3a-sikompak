<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth']);
        parent::__construct();
    }

    public function index()
    {
        return view('dashboard', [
            'menuList' => $this->menuList,
        ]);
    }

    public function dua()
    {
        return view('dashboard', [
            'menuList' => $this->menuList,
        ]);
    }

    public function tiga()
    {
        return view('dashboard', [
            'menuList' => $this->menuList,
        ]);
    }
}
