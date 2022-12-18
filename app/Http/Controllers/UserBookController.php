<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use App\Models\Book;
use App\Models\User;
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
        $userbooks = UserBook::where('user_id', Auth::id())->get();
        // ->sortBy('province');

        return view('dashboard', compact('userbooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::all();
        $users = User::all();

        return view('addloans', compact('books', 'users'));
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

        return redirect()->route('userbook.index');
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
    public function edit(UserBook $userBook)
    {
        //
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
            'status' => '0',
        ]);

        return redirect()->route('userbook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserBook  $userBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserBook $userBook)
    {
        //
    }

    public function admin()
    {
        $userbooks = UserBook::all();
        // ->sortBy('province');

        return view('dashboard', compact('userbooks'));
    }
}
