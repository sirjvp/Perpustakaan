@extends('layouts.app')
@section('content')
<section class="text-gray-600 body-font w-full">
    <div class="container px-5 mx-auto flex sm:flex-nowrap flex-wrap">
        <div class="lg:w-2/3 md:w-1/2 flex flex-col mx-auto w-full md:py-8 mt-8 md:mt-0">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Edit Book</h2>
            <form action="{{ route('book.update', $book) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div class="relative mb-4">
                <label for="title" class="leading-7 text-sm text-gray-600">Title</label>
                <input type="text" id="title" name="title" value="{{ $book->title }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="author" class="leading-7 text-sm text-gray-600">Author</label>
                    <input type="text" id="author" name="author" value="{{ $book->author }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="genre" class="leading-7 text-sm text-gray-600">Genre</label>
                    <input type="text" id="genre" name="genre" value="{{ $book->genre }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600">Publication Date</label>
                    <input type="date" id="name" name="publication_date" value="{{ $book->publication_date }}" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="synopsiss" class="leading-7 text-sm text-gray-600">Synopsis</label>
                    <textarea id="synopsis" name="synopsis" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $book->synopsis }}</textarea>
                </div>
                <div class="relative mb-4">
                    <label for="cover" class="leading-7 text-sm text-gray-600">Cover Image</label>
                    <br>
                    <img style="height: 200px;" src="/cover_images/{{ $book->cover_image }}" alt="">
                    <br>
                    <label for="cover" class="leading-7 text-sm text-gray-600">Change Image</label>
                    <input type="file" name="file">
                </div>
                <button class="text-white w-full bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Save</button>
            </form>
            <p class="text-xs text-gray-500 mt-3">Chicharrones blog helvetica normcore iceland tousled brook viral artisan.</p>
        </div>
    </div>
</section>
@endsection
