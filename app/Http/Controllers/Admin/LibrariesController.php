<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Librarian;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use function abort;
use function redirect;
use function view;

class LibrariesController extends Controller {
    public function index() {
        $libraries = Library::all();
        return view('admin.Libraries.libraries', ['libraries' => $libraries]);
    }

    public function create() {
        $librarians = Librarian::all();
        return view('admin.Libraries.add_library', compact('librarians'));
    }

    public function store(Request $request) {
        $request->validate([
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'librarian_id' => 'required|integer|exists:librarians,id',
        ]);

        $request = $request->except('_token');

         Library::create($request);

        return redirect()->route('admin.libraries')->with(['status' => 'success', 'message' => 'Library Added Successfully']);
    }

    public function edit($id){
        $librarians = Librarian::all();
        $library = Library::find($id);
        return view('admin.Libraries.edit_library', compact('library', 'librarians'));
    }

    public function update(Request $request, $id) {
        $library = Library::find($id);

        if (!$library) {
            abort(404);
        }

        $request->validate([
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'librarian_id' => 'required|integer|exists:librarians,id',
        ]);

        $request = $request->except('_token', 'image');

        $library->update($request);

        return redirect()->route('admin.libraries')->with(['status' => 'success', 'message' => 'Library Edited Successfully']);
    }

    public function destroy($id) {
        $library = Library::find($id);

        if (!$library) {
            abort(404);
        }
        $library->delete();

        return redirect()->route('admin.libraries')->with(['status' => 'success', 'message' => 'Library Deleted Successfully']);
    }
}
