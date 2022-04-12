<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\BorrowRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function abort;
use function redirect;
use function view;

class RentRequestsController extends Controller {
    public function index() {
        $requests = BorrowRequest::all();
        return view('librarian.RentRequests.rent_requests', ['requests' => $requests]);
    }
}
