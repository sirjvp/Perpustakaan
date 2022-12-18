<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use App\Models\Book;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = "user";
        $userbooks = UserBook::where('user_id', Auth::id())->get();
        // ->sortBy('province');

        return view('dashboard', compact('userbooks', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::doesntHave('users')
                    ->orWhereHas('users', function($query) {
                        $query->where('status', '0');
                    })
                    ->get();

        $members = Member::with('users')
                    ->get();

        // foreach($members as $member){
        //     dd($member->users);
        // }
        return view('addborrow', compact('books', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $book = Book::find($request->id);
        // $user = Auth::id();

        $book = Book::find($request->book);
        $user = $request->user;

        $today = Carbon::now();
        $return = Carbon::now()->addDays(7);
        $book->users()->attach([$user => ['status' => '1', 'borrowed_date' => $today, 'return_date' => $return]]);

        return redirect()->route('userbook.admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function show(UserBook $userBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function edit(UserBook $userbook)
    {
        $books = Book::doesntHave('users')
                    ->orWhereHas('users', function($query) {
                        $query->where('status', '0');
                    })
                    ->get();

        $members = Member::with('users')
                    ->get();

        return view('editborrow', compact('userbook', 'books', 'members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userBook = UserBook::find($id);
        $userBook->update([
            'book_id' => $request->book,
            'user_id' => $request->user,
        ]);

        return redirect()->route('userbook.admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userbook = UserBook::find($id);
        $userbook->delete();

        return redirect()->route('userbook.admin');
    }

    public function admin()
    {
        $pages = "admin";
        $userbooks = UserBook::all();
        // ->sortBy('province');

        return view('dashboard', compact('userbooks', 'pages'));
    }

    public function return($id)
    {
        $userBook = UserBook::find($id);
        $userBook->update([
            'status' => '0',
        ]);

        return redirect()->route('userbook.admin');
    }
}
