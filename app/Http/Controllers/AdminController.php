<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function show() {
        Gate::authorize('view-admin-panel');
        $users = User::all();
        $deletedUsers = User::onlyTrashed()->get();
        return view('admin-panel', compact('users', 'deletedUsers'));
    }

    public function create(Request $request) {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
        ]);

        if($request->only('role')){
            $validated = $request->only('role') + $validated; // чекбокс с ролью администратора
        }

        $user = User::create($validated);

        if($user){
            return to_route('admin.show');
        }

        return redirect(route('admin.show'))->withErrors([
            'При добавлении пользователя произошла ошибка'
        ]);
    }

    public function edit(User $user) {
        return view('edit_user', compact('user'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
        ]);

        if($request->only('role')){
            $validated = $request->only('role') + $validated; // чекбокс с ролью администратора
        }

        User::findOrFail($id)->update($validated);
        return to_route('admin.show');
    }

    public function delete($id) {
       User::destroy($id);
       return to_route('admin.show');
    }

    public function recovery($id) {
        User::onlyTrashed()->where('id', $id)->restore();
        return to_route('admin.show');
    }
}
