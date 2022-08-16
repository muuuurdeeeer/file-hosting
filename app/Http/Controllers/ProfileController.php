<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        if(Auth::check()){
            $files = File::orderByDesc('created_at')->paginate(5);
            $user = Auth::user();
            return view('profile', compact('user', 'files'));
        }
        return view('auth.login');
    }

    public function update_photo(Request $request) {
    //
    }
}
