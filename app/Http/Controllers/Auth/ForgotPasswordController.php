<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function index()
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

    public function reset(Request $request)
    {
        return view('auth.reset_password', [
            'token' => $request->token,
            'email' => $request->email,
        ]);
    }

    public function change(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email'    => 'required|max:255|email',
            'password' => 'required|max:255|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
 
        return $status === Password::PASSWORD_RESET
                ? redirect()->route('auth.login.index')->with('info', __($status))
                : back()->withErrors(['email' => [__($status)]]);
    }
}
