@extends('layouts.app')
@section('content')
    <section class="text-gray-600 body-font w-full">
        <div class="container px-5 mx-auto">
            {{-- Title --}}
            <div class="flex flex-col text-center w-full">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">List Books</h1>
            </div>

            {{-- Table Section --}}
            <div class="lg:w-4/5 w-full mx-auto overflow-auto">
                <div class="text-right">
                    {{-- Add Butotn --}}
                    <a href="{{ route('book.create') }}" class="btn btn-primary">+ Add Book</a>

                    {{-- Table --}}
                    <div>
                        <br>
                        <table class="table-auto w-full text-left whitespace-no-wrap">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                        ID</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        Title</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        Author</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        Publication Date</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        Action</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                    </th>
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
                                            <form action="{{ route('book.edit', $book) }}" method="get"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <button
                                                    class="text-white bg-indigo-500 border-0 py-2 px-3 hover:bg-indigo-600 rounded"
                                                    type="submit">
                                                    Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td class="w-10 text-center">
                                            <form action="{{ route('book.destroy', $book) }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button
                                                    class="text-white bg-red-500 border-0 py-2 px-3 hover:bg-red-600 rounded"
                                                    type="submit" onclick="this.disabled=true;this.form.submit();">
                                                    X
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    </section>
@endsection
