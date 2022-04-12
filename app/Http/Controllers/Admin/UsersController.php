<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function abort;
use function redirect;
use function view;

class UsersController extends Controller {
    public function index() {
        $users = User::all();
        return view('admin.Users.users', ['users' => $users]);
    }

    public function create() {
        return view('admin.Users.add_user');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|max:255|confirmed',
        ]);

        $pass = Hash::make($request->get('password'));
        $request = $request->except('password', '_token');

         User::create($request + ['password' => $pass]);

        return redirect()->route('admin.users')->with(['status' => 'success', 'message' => 'User Added Successfully']);
    }

    public function edit($id){
        $user = User::find($id);
        return view('admin.Users.edit_user', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string',
            'rank' => 'required|in:0,1,2',
            'password' => 'required|string|max:255|confirmed',
        ]);

        $pass = Hash::make($request->get('password'));
        $request = $request->except('password', '_token');

        $user->update($request + ['password' => $pass]);

        return redirect()->route('admin.users')->with(['status' => 'success', 'message' => 'User Edited Successfully']);
    }

    public function destroy($id) {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }
        $user->delete();

        return redirect()->route('admin.users')->with(['status' => 'success', 'message' => 'User Deleted Successfully']);
    }
}
