@extends('layouts.app')
@section('content')
    <section class="text-gray-600 body-font w-full">
        <div class="container px-5 mx-auto">
            {{-- Title --}}
            <div class="flex flex-col text-center w-full">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">List Borrowed Books</h1>
            </div>

            {{-- Table Section --}}
            <div class="lg:w-4/5 w-full mx-auto overflow-auto">
                <div class="text-right">
                    {{-- Add Button --}}
                    @if ($pages == 'admin')
                        <a href="{{ route('userbook.create') }}" class="btn btn-primary">+ Add Borrow</a>
                    @endif

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
                                    @if ($pages == 'admin')
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                            Borrower</th>
                                    @endif
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        Status</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        Borrowed Date</th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        Return Date</th>
                                    @if (Auth::user()->is_admin == '1')
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                            Action</th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        </th>
                                        <th
                                            class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        </th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userbooks as $userbook)
                                    <tr>
                                        <td class="px-4 py-3">{{ $userbook->book->id }}</td>
                                        <td class="px-4 py-3">{{ $userbook->book->title }}</td>
                                        <td class="px-4 py-3">{{ $userbook->book->author }}</td>
                                        @if ($pages == 'admin')
                                            <td class="px-4 py-3">{{ $userbook->user->username }}</td>
                                        @endif

                                        <td class="px-4 py-3">
                                            @if ($userbook->status == '1')
                                                Borrowed
                                            @else
                                                Returned
                                            @endif
                                        </td>
                                        <td class="px-4 py-3">{{ $userbook->borrowed_date }}</td>
                                        <td class="px-4 py-3">{{ $userbook->return_date }}</td>
                                        @if (Auth::user()->is_admin == '1')
                                            <td class="w-10 text-center">
                                                @if ($userbook->status == '1')
                                                    <form action="{{ route('userbook.return', $userbook) }}" method="post"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="PATCH">
                                                        <button
                                                            class="text-white bg-indigo-500 border-0 py-2 px-3 hover:bg-indigo-600 rounded"
                                                            type="submit" onclick="this.disabled=true;this.form.submit();">
                                                            Return
                                                        </button>
                                                    </form>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="w-10 text-center">
                                                <form action="{{ route('userbook.edit', $userbook) }}" method="get"
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
                                                <form action="{{ route('userbook.destroy', $userbook) }}" method="post"
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
                                        @endif
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
                <a href="{{ route('userbook.create') }}" class="btn btn-primary">Record loan</a>
            </div>
            <div class="col-9">
                <div class="panel px-4 py-3 glass shadow" style="height:100vh;">
                    <h5>List Borrowed Books</h5>
                    <div class="table-responsive custom-table-responsive" style="overflow: auto; height:85%;">
                        <table class="table custom-table">
                            <thead>
                                <tr class="text-left">
                                    <th scope="col">ID</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Borrowed Date</th>
                                    <th scope="col">Return Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userbooks as $userbook)
                                    <tr>
                                        <td>
                                            {{ $userbook->book->id }}
                                        </td>
                                        <td>
                                            {{ $userbook->book->title }}
                                        </td>
                                        <td>
                                            {{ $userbook->book->author }}
                                        </td>
                                        <td>
                                            @if ($userbook->status == '1')
                                                Borrowed
                                            @else
                                                Returned
                                            @endif
                                        </td>
                                        <td>
                                            {{ $userbook->borrowed_date }}
                                        </td>
                                        <td>
                                            {{ $userbook->return_date }}
                                        </td>
                                        <td>
                                            @if ($userbook->status == '1')
                                                <form action="{{ route('userbook.update', $userbook) }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PATCH">
                                                    <button class="btn btn-primary" type="submit"
                                                        onclick="this.disabled=true;this.form.submit();">
                                                        Return
                                                    </button>
                                                </form>
                                            @else
                                                -
                                            @endif
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
