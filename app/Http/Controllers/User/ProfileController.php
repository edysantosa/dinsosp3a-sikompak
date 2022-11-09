<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function store(Request $request)
    {

        $user = $request->user();
        if ($request->file('image')) {
            $user
            ->clearMediaCollection('profile')
            ->addMediaFromRequest('image')
            ->usingName($user->name)
            ->usingFileName($user->name.".".$request->file('image')->extension())
            ->toMediaCollection('profile');

            return response()->json(['image' => $user->getFirstMediaUrl('profile', 'thumb')]);
        } elseif ($request->exists('password')) {
            $this->validate($request, [
                'password' => 'required|max:255|confirmed',
            ]);

            $user->update(['password' => $request->password]);
            return back()->withFragment('password-content')->with(['info' => 'Kata sandi telah diubah']);
        } else {
            $this->validate($request, [
                'name'  => 'required|max:255',
                'email' => 'required|max:255|email|unique:users,email,' . $user->id
            ]);

            $user->update($request->except('_token', 'roles'));
            return back()->with(['info' => 'Profil telah diubah']);
        }
    }
}
