<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Book;
use App\Models\BorrowRequest;
use App\Models\BuyBook;
use App\Models\Library;
use App\Models\RequestBook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class LibraryController extends Controller
{
    public function show($id) {
        $library = Library::find($id);
        return view('library', compact('library'));
    }
}
