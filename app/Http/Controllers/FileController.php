<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

class FileController extends Controller
{
    public function upload(Request $request) {
        //$request->file('crab')->store('user_files');

        $user = Auth::id();
        $name = Storage::putFile('user_files', $request->file('upload_file'));

        $data = [
          'fid_user' => $user,
          'name' => $name
        ];

        File::create($data);
    }
}
