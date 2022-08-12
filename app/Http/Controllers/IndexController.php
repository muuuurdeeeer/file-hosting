<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {

        if (Auth::check()) {
            $user = Auth::user();
            return view('index', compact('user'));
        }

        return view('index');
    }
}
