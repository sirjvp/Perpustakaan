<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Carbon\Carbon;

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
        $book->title = 'The Boys from Biloxi: A Legal Thriller';
        $book->author = 'John Grisham';
        $book->synopsis = 'John Grisham returns to Mississippi with the riveting story of two sons of immigrant families who grow up as friends, but ultimately find themselves on opposite sides of the law. Grisham’s trademark twists and turns will keep you tearing through the pages until the stunning conclusion.';
        $book->genre = 'Non-Fiction';
        $book->publication_date = Carbon::parse('2022-10-18');
        $book->cover_image = 'book1.png';
        $book->submitted_by = '1';
        $book->save();

        $book = new Book();
        $book->title = "The Assassin's Betrayal: CIA Assassin";
        $book->author = 'Auston King';
        $book->synopsis = "A weapon equivalent to a small nuclear bomb is missing. And not one intelligence agency in the world has a lead. Everyone that gets close to the truth, ends up dead. Jason Drake has to confront his past and comes to terms with who he is. The only way out is to go through hell. He has to kill the woman he loves. If he doesn't, Washington D.C. will go up in flames and the world will be at war.";
        $book->genre = 'Action';
        $book->publication_date = Carbon::parse('2020-10-29');
        $book->cover_image = 'book2.png';
        $book->submitted_by = '1';
        $book->save();

        $book = new Book();
        $book->title = "The Handler: A Nick Reagan Thriller";
        $book->author = 'Jeffrey S. Stephens';
        $book->synopsis = "When the CIA uncovers details of violent assaults planned throughout the United States, clandestine CIA operative Nicholas Reagan and his partner, Carol Gellos, are assigned to prevent them—traveling across the world as they confront long odds and danger along the way.";
        $book->genre = 'Thriller';
        $book->publication_date = Carbon::parse('2022-08-30');
        $book->cover_image = 'book3.png';
        $book->submitted_by = '1';
        $book->save();

        $book = new Book();
        $book->title = "Patriot (A Connor Sloane Thriller)";
        $book->author = 'M.A. Rothman';
        $book->synopsis = "Connor Sloane, a CIA operations officer, uncovers a plot against the homeland that dwarfs anything that had occurred on 9-11. After confirming that terrorists have finally gotten their hands on a nuclear weapon, all of his attempts at getting someone to do something are actively thwarted.";
        $book->genre = 'Civilian';
        $book->publication_date = Carbon::parse('2021-04-01');
        $book->cover_image = 'book4.png';
        $book->submitted_by = '1';
        $book->save();

        $book = new Book();
        $book->title = "Seduction: Love, Loss, Leverage, Murder";
        $book->author = 'C L Bluestein';
        $book->synopsis = "Can a good person commit heinous acts? Meet Ted X. Donovan--rich, well-connected, driven--a one-man wrecking ball. Enter Rachel Allen, the unwary prey in Ted Donovan’s cat-&-mouse game. After struggling to recover from a vicious attack, can she rise above her fears to face and survive this new, even more malicious assailant?";
        $book->genre = 'Romance';
        $book->publication_date = Carbon::parse('2015-08-10');
        $book->cover_image = 'book5.png';
        $book->submitted_by = '1';
        $book->save();

    }
}
