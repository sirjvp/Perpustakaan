<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addbooks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => 'image',
        ]);

        if ($request->has('file')) {
            $file_name = time() . '-' . $data['file']->getClientOriginalName();
            $request->file->move(public_path('cover_images/'), $file_name);
        }

        $book = book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'publication_date' => $request->publication_date,
            'cover_image' => $file_name,
            'synopsis' => $request->synopsis,
            'submitted_by' => 1,
            // 'submitted_by' => Auth::id(),
        ]);

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $borrows = $book->users;
        $condition = true;

        foreach($borrows as $borrow){
            if($borrow->pivot->status == '1') {
                $condition = false;
            }
        }

        // dd($condition);
        return view('detail', compact('book', 'condition'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('editbook', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'file' => 'image',
        ]);

        if ($request->has('file')) {
            $file_name = time() . '-' . $data['file']->getClientOriginalName();
            $request->file->move(public_path('cover_images/'), $file_name);

            $book->update([
                'cover_image' => $file_name
            ]);
        }

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'synopsis' => $request->synopsis,
            'genre' => $request->genre,
            'publication_date' => $request->publication_date,
            // 'submitted_by' => $request->submitted_by
            'submitted_by' => 1,
        ]);

        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('book.index');
    }

    public function catalog()
    {
        $books = Book::all();

        return view('catalog', compact('books'));
    }
}
