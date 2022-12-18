@extends('layouts.app')
@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Edit Borrow Books
                </h1>
            </div>
            <form action="{{ route('userbook.update', $userbook) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input name="_method" type="hidden" value="PATCH">
                <div
                    class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">

                    <div class="relative flex-grow w-full">
                        <label for="full-name" class="leading-7 text-sm text-gray-600">Book</label>
                        {{-- <input type="text" id="full-name" name="full-name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
                        <select name="book"
                            class="w-full rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                            @foreach ($books as $book)
                                <?php
                                $selected = '';
                                if ($book->id == $userbook->book_id) {
                                    $selected = 'selected';
                                }
                                ?>
                                <option value="{{ $book->id }}" {{ $selected }}>{{ $book->title }}</option>
                            @endforeach
                        </select>
                        <span
                            class="absolute right-0 top-3 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                    </div>
                    <div class="relative flex-grow w-full">
                        <label for="email" class="leading-7 text-sm text-gray-600">User</label>
                        {{-- <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
                        <select name="user" id="selectq" onchange="myFunction()"
                            class="w-full rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                            @foreach ($members as $member)
                                @foreach ($member->users as $mem)
                                    <?php
                                    $selected = '';
                                    if ($mem->id == $userbook->user_id) {
                                        $selected = 'selected';
                                    }
                                    ?>
                                    <option value="{{ $mem->id }}" {{ $selected }}>{{ $mem->username }}</option>
                                @endforeach
                            @endforeach
                        </select>
                        <span
                            class="absolute right-0 top-3 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                    </div>

                    <button
                        class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                        onclick="this.disabled=true;this.form.submit();">Borrow</button>
                </div>
                {{-- <div class="lg:w-2/3 md:w-1/2 flex flex-col mx-auto w-full md:py-8 mt-8 md:mt-0">
                    @foreach ($members as $member)
                    <div class="relative mb-4">
                        <label for="title" class="leading-7 text-sm text-gray-600">Phone</label>
                        <input type="text" id="phone" name="title" value="{{ $members[0]->phone }}"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="relative mb-4">
                        <label for="title" class="leading-7 text-sm text-gray-600">Address</label>
                        <input type="text" id="title" name="title"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    @endforeach
                </div> --}}
            </form>
        </div>
    </section>

    {{-- Point Modal --}}
    {{-- <script type="text/javascript">
        var x = document.getElementById("selectq").value;
        document.getElementById("phone").value = x;

        function myFunction() {
            var x = document.getElementById("selectq").value;
        }
    </script> --}}
@endsection
