@extends('layouts.app')
@section('content')
    <section class="text-gray-600 body-font w-full">
        <div class="container px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
            <div class="lg:w-2/3 md:w-1/2 flex flex-col mx-auto w-full md:py-8 mt-8 md:mt-0">
                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Add Book</h2>
                <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="relative mb-4">
                    <label for="name" class="leading-7 text-sm text-gray-600">Title</label>
                    <input type="text" id="name" name="title" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Author</label>
                        <input type="text" id="name" name="author" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Genre</label>
                        <input type="text" id="name" name="genre" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="name" class="leading-7 text-sm text-gray-600">Publication Date</label>
                        <input type="text" id="name" name="publication_date" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Synopsis</label>
                        <textarea id="message" name="synopsis" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                    <div class="relative mb-4">
                        <label for="message" class="leading-7 text-sm text-gray-600">Cover Image</label>
                        <br>
                        <input type="file" name="file" required>
                    </div>
                    <button class="text-white w-full bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">Save</button>
                </form>
                <p class="text-xs text-gray-500 mt-3">Chicharrones blog helvetica normcore iceland tousled brook viral artisan.</p>
            </div>
        </div>
    </section>

    {{-- DESKTOP --}}
    {{-- <div class="container-xxl p-5 d-none d-md-block">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="panel px-4 py-3 glass shadow" style="height:100vh;">
                    <h5>Add Books</h5>
                    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container" style="padding: 20px 55px;">
                            <div class="form-group"><label>Title</label>
                                <input class="form-control border" type="text" name="title" required>
                            </div>

                            <div class="form-group"><label>Author</label>
                                <input class="form-control border" type="text" name="author" required>
                            </div>

                            <div class="form-group"><label>Genre</label>
                                <input class="form-control border" type="text" name="genre" required>
                            </div>

                            <div class="form-group"><label>Publication Date</label>
                                <input class="form-control border" type="text" name="publication_date" required>
                            </div>

                            <div class="form-group"><label>Synopsis</label>
                                <input class="form-control border" type="text" name="synopsis" required>
                            </div>

                            <div class="form-group"><label>Cover Image</label>
                                <input type="file" name="file" required>
                            </div>

                            <button class="btn btn-success" id="createBtn" type="submit">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
