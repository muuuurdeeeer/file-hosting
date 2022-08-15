<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        if(Auth::check()){
            return to_route('profile.index');
        }
        return view('index');
    }
}
