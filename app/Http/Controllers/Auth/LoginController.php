<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
        parent::__construct();
    }
    
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|max:255|email',
            'password' => 'required|min:3|max:255',
        ]);
        
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('warning', 'Email atau password salah');
        }

        return redirect()->route('dashboard');
    }
}
