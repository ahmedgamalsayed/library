<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\BorrowRequest;
use App\Models\BuyBook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function abort;
use function redirect;
use function view;

class PaymentRequestsController extends Controller {
    public function index() {
        $requests = BuyBook::all();
        return view('librarian.PaymentRequests.payment_requests', ['requests' => $requests]);
    }
}
