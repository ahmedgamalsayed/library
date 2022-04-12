<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use function abort;
use function redirect;
use function view;

class BooksController extends Controller {
    public function index() {
        $library = Library::where('librarian_id', auth('librarians')->id())->first();
        $books = $library->books()->get();
        return view('librarian.Books.books', ['books' => $books]);
    }

    public function create() {
        $libraries = Library::where('librarian_id', auth('librarians')->id())->get();
        return view('librarian.Books.add_book', compact('libraries'));
    }

    public function store(Request $request) {
        $request->validate([
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'library_id' => 'required|integer|exists:libraries,id',
        ]);

        if ($request->has('image')) {
            $fileName = $this->uploadImage($request->image);
        }

        $request = $request->except('_token', 'image');

         Book::create($request + ['image' => $fileName ?? null]);

        return redirect()->route('librarian.books')->with(['status' => 'success', 'message' => 'Book Added Successfully']);
    }

    public function edit($id){
        $libraries = Library::where('librarian_id', auth('librarians')->id())->get();
        $book = Book::find($id);
        return view('librarian.Books.edit_book', compact('book', 'libraries'));
    }

    public function update(Request $request, $id) {
        $book = Book::find($id);

        if (!$book) {
            abort(404);
        }

        $request->validate([
            'name_en' => 'required|string',
            'description_en' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'library_id' => 'required|integer|exists:libraries,id',
        ]);

        if ($request->has('image')) {
            $fileName = $this->uploadImage($request->image);
        }

        $request = $request->except('_token', 'image');

        $book->update($request + ['image' => $fileName ?? $book->image]);

        return redirect()->route('librarian.books')->with(['status' => 'success', 'message' => 'Book Edited Successfully']);
    }

    public function destroy($id) {
        $book = Book::find($id);

        if (!$book) {
            abort(404);
        }
        $book->delete();

        return redirect()->route('librarian.books')->with(['status' => 'success', 'message' => 'Book Deleted Successfully']);
    }

    public function uploadImage($file) {
        $extension = '.' . $file->extension();
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = str_replace(' ', '-', $fileName);
        $fileName = str_replace('_', '-', $fileName);
        $fileName = str_replace('+', '-', $fileName);

        $fileName .= '-' . base_convert(microtime(true) * 10000, 10, 32);
        Storage::putFileAs('/', $file, $fileName);

        $fileName .= $extension != '.' ? $extension : '';
        return $fileName;
    }
}
