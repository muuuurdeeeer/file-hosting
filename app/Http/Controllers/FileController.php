<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\File;

class FileController extends Controller
{
    public function upload(Request $request) {
        $user = Auth::id();
        $name = Storage::putFile('user_files', $request->file('upload_file'));

        $data = [
          'fid_user' => $user,
          'name' => $name
        ];

        File::create($data);
    }

    public function download($id) {
        $path = File::find($id)->name;
        return Storage::download($path);
    }

    public function delete($id) {
        File::destroy($id);
        return to_route('profile.index');
    }
}
