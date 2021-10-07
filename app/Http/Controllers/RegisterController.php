<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{

    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attribute = request()->validate([
            'name' => ['required'],
            'username' => ['required', 'max:255', 'min:4', 'unique:users,username'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required']
        ]);
        $attribute['password'] = bcrypt($attribute['password']);
        $attribute['username'] = ucwords($attribute['username']);
        $user = User::create($attribute);

        Auth::login($user);

        session()->flash('success', 'Your account has been created');
        return redirect('/');
    }
}
