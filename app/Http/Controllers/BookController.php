<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Book;
use App\Models\BorrowRequest;
use App\Models\BuyBook;
use App\Models\RequestBook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    public function show($id) {
        $book = Book::find($id);
        return view('book', compact('book'));
    }

    public function request_book(Request $request, $id): RedirectResponse
    {
        RequestBook::create([
            'book_id' => $id,
            'student_id' => auth('users')->id(),
        ]);
        return redirect()->route('books.show')->with(['status' => 'success', 'message' => 'Done Successfully']);
    }

    public function rent_book(Request $request, $id): RedirectResponse
    {
        BorrowRequest::create([
            'borrow_from' => $request->borrow_from,
            'borrow_to' => $request->borrow_to,
            'book_id' => $id,
            'student_id' => auth('users')->id(),
        ]);
        return redirect()->route('books.show')->with(['status' => 'success', 'message' => 'Done Successfully']);
    }

    public function buy_book(Request $request, $id): RedirectResponse
    {
        $book = Book::find($id);
        $book->update(['stock' => ($book->stock-1)]);
        BuyBook::create([
            'book_id' => $id,
            'student_id' => auth('users')->id(),
        ]);
        return redirect()->route('books.show')->with(['status' => 'success', 'message' => 'Done Successfully']);
    }
}
