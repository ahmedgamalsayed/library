<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function abort;
use function redirect;
use function view;

class AdminsController extends Controller {
    public function index() {
        $users = Admin::all();
        return view('admin.Admins.admins', ['users' => $users]);
    }

    public function create() {
        return view('admin.Admins.add_admin');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:admins,email',
            'password' => 'required|string|max:255|confirmed',
        ]);

        $pass = Hash::make($request->get('password'));
        $request = $request->except('password', '_token');

         Admin::create($request + ['password' => $pass]);

        return redirect()->route('admin.admins')->with(['status' => 'success', 'message' => 'Admin Added Successfully']);
    }

    public function edit($id){
        $user = Admin::find($id);
        return view('admin.Admins.edit_admin', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $user = Admin::find($id);

        if (!$user) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string|max:255|confirmed',
        ]);

        $pass = Hash::make($request->get('password'));
        $request = $request->except('password', '_token');

        $user->update($request + ['password' => $pass]);

        return redirect()->route('admin.admins')->with(['status' => 'success', 'message' => 'Admin Edited Successfully']);
    }

    public function destroy($id): RedirectResponse
    {
        $user = Admin::find($id);

        if (!$user) {
            abort(404);
        }
        $user->delete();

        return redirect()->route('admin.admins')->with(['status' => 'success', 'message' => 'Admin Deleted Successfully']);
    }
}
