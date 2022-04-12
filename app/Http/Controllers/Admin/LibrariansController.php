<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function abort;
use function redirect;
use function view;

class LibrariansController extends Controller {
    public function index() {
        $users = Librarian::all();
        return view('admin.Librarians.librarians', ['users' => $users]);
    }

    public function create() {
        return view('admin.Librarians.add_librarian');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|max:255|confirmed',
        ]);

        $pass = Hash::make($request->get('password'));
        $request = $request->except('password', '_token');

         Librarian::create($request + ['password' => $pass]);

        return redirect()->route('admin.librarians')->with(['status' => 'success', 'message' => 'Librarian Added Successfully']);
    }

    public function edit($id){
        $user = Librarian::find($id);
        return view('admin.Librarians.edit_librarian', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = Librarian::find($id);

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

        return redirect()->route('admin.librarians')->with(['status' => 'success', 'message' => 'Librarian Edited Successfully']);
    }

    public function destroy($id) {
        $user = Librarian::find($id);

        if (!$user) {
            abort(404);
        }
        $user->delete();

        return redirect()->route('admin.librarians')->with(['status' => 'success', 'message' => 'Librarian Deleted Successfully']);
    }
}
