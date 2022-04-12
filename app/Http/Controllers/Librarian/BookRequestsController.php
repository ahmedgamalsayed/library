<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\BorrowRequest;
use App\Models\BuyBook;
use App\Models\RequestBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function abort;
use function redirect;
use function view;

class BookRequestsController extends Controller {
    public function index() {
        $requests = RequestBook::all();
        return view('librarian.BookRequests.book_requests', ['requests' => $requests]);
    }
}
