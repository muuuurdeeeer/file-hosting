<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()){
            return redirect(route('profile.index'));
        }
        return view('auth.login');
    }

    public function login(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            if (Auth::check()) {
                return redirect(route('profile.index'));
            }
        }

        return redirect(route('user.login'))->withErrors([
            'Не удалось войти'
        ]);
    }
}
