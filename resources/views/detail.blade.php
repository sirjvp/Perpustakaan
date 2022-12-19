@extends('layouts.app')
@section('content')
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/3 w-full lg:h-auto h-64 object-cover object-center rounded"
                    src="/cover_images/{{ $book->cover_image }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">Title</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $book->title }}</h1>
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            <span class="text-gray-600">Author: {{ $book->author }}</span>
                        </span>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                            <span class="text-gray-600">Publication: {{ $book->publication_date }}</span>
                        </span>
                    </div>
                    <p class="leading-relaxed">{{ $book->synopsis }}</p>
                    <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                        <div class="flex">
                            <span class="mr-3">Genre: {{ $book->genre }}</span>
                        </div>
                        <div class="flex ml-6 items-center">
                            {{-- <span class="mr-3">Size</span>
                            <div class="relative">
                                <select
                                    class="rounded border appearance-none border-gray-300 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base pl-3 pr-10">
                                    <option>SM</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                                <span
                                    class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                        <path d="M6 9l6 6 6-6"></path>
                                    </svg>
                                </span>
                            </div> --}}
                        </div>
                    </div>

                    {{-- Status --}}
                    <div class="flex">
                        @if ($condition == true)
                            <span class="title-font font-medium text-2xl text-indigo-500">Available</span>
                        @else
                            <span class="title-font font-medium text-2xl text-indigo-200">Not Available</span>
                        @endif
                        {{-- <a href="{{ route('book.update', $book) }}" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">Borrow</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
