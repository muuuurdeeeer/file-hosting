<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index() {
        if(Auth::check()){
            return redirect(route('profile.index'));
        }
        return view('auth.registration');
    }

    public function register(Request $request) {

        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
        ]);

        $user = User::create($validated);

        if($user){
            return to_route('user.login');
        }

        return redirect(route('user.registration'))->withErrors([
            'При регистрации произошла ошибка'
        ]);
    }
}
