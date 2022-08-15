<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if(Auth::check()){
            return to_route('profile.index');
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
                return to_route('profile.index');
            }
        }

        return to_route('user.login')->withErrors([
            'Не удалось войти'
        ]);
    }

    public function logout() {
        Auth::logout();
        return to_route('index');
    }
}
