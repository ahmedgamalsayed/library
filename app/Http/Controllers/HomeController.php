<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    public function about() {
        return view('about');
    }

    public function search(Request $request) {
        $search = $request->search;

        if ($request->has('type')) {
            if ($request->type == 1) {
                $type = 'Book';
                $books = Book::where('name_en', 'like', "%$search%")->get();
            } else {
                $type = 'Library';
                $books = Library::where('name_en', 'like', "%$search%")->get();
            }
        } else {
            $type = 'Book';
            $books = Book::where('name_en', 'like', "%$search%")->get();
        }

        return view('search', compact('search', 'books', 'type'));
    }

    public function profile(){
        return view('profile');
    }

    public function profile_post(Request $request) {
        $user = auth()->user();
        if ($request->has('name')) {
            $user->name = $request->get('name');
        }

        if ($request->has('email')) {
            $user->email = $request->get('email');
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('user', ['disk' => 'public']);
            $user->image = $path;
        }

        $user->save();
        return redirect()->back();
    }

    public function category($category_id, $type) {
        if ($type == 'car') {
            $category = Category::where('id', $category_id)->where('type', 1)->first();
            $data = Car::where('category_id', $category_id)->get();
        } elseif ($type == 'bike') {
            $category = Category::where('id', $category_id)->where('type', 0)->first();
            $data = Bike::where('category_id', $category_id)->get();
        }
        return view('category', compact('category', 'data', 'type'));
    }

    public function contact(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        return Mail::to("email@email.com")->send(new Contact($request->all()));
    }
}
