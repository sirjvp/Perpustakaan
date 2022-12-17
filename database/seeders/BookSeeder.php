<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Database\Seeders\Carbon;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->title = 'The Bad Guys';
        $book->author ='JVP';
        $book->synopsis = 'Serigala';
        $book->genre = 'Action';
        $book->cover_image = 'Action';
        $book->publication_date = 'Action';
        $book->submitted_by = 'Action';
        $book->save();

    }
}
