<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('auth.forgot_password');
    }

    public function reset()
    {
        return view('auth.forgot_password');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|max:255|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['info' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
