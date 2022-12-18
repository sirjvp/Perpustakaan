@extends('layouts.app')
@section('content')
    <section class="text-gray-600 body-font w-full">
        <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">List Books</h1>
            {{-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct trade mumblecore 3 wolf moon twee</p> --}}
        </div>
        <div class="lg:w-4/5 w-full mx-auto overflow-auto">
            <div class="text-right">
                <a href="{{ route('book.create') }}" class="btn btn-primary">+ Add Book</a>
            <div>
            <br>
            <table class="table-auto w-full text-left whitespace-no-wrap">
            <thead>
                <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Title</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Author</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Publication Date</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">Action</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td class="px-4 py-3">{{ $book->id }}</td>
                        <td class="px-4 py-3">{{ $book->title }}</td>
                        <td class="px-4 py-3">{{ $book->author }}</td>
                        <td class="px-4 py-3">{{ $book->publication_date }}</td>
                        <td class="w-10 text-center">
                            <a href="{{ route('book.edit', $book) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td class="w-10 text-center">
                            <a href="{{ route('book.edit', $book) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </section>
    {{-- DESKTOP --}}
    {{-- <div class="container-xxl p-5 d-none d-md-block">
        <div class="row justify-content-center">
            <div class="col-md-9 text-right mb-3">
                <a href="{{ route('book.create') }}" class="btn btn-primary">Add Books</a>
            </div>
            <div class="col-9">
                <div class="panel px-4 py-3 glass shadow" style="height:100vh;">
                    <h5>List Books</h5>
                    <div class="table-responsive custom-table-responsive" style="overflow: auto; height:85%;">
                        <table class="table custom-table">
                            <thead>
                                <tr class="text-left">
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Publication Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>
                                            {{ $book->id }}
                                        </td>
                                        <td>
                                            {{ $book->title }}
                                        </td>
                                        <td>
                                            {{ $book->author }}
                                        </td>
                                        <td>
                                            {{ $book->publication_date }}
                                        </td>
                                        <td>
                                            <a href="{{ route('book.edit', $book) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
