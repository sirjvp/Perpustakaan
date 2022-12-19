@extends('layouts.app')
@section('content')
    <section class="text-gray-600 body-font">
        {{-- Title --}}
        <div class="flex flex-col text-center w-full mb-4">
            <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Book Catalog</h1>
        </div>

        {{-- Catalog --}}
        <div class="container px-5 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($books as $book)
                    <div class="xl:w-1/4 md:w-1/2 p-4">
                        <a href="{{ route('catalog.detail', $book) }}">
                            <div class="bg-gray-100 p-6 rounded-lg">
                                <img class="h-100 rounded w-full object-cover object-center mb-6"
                                    src="/cover_images/{{ $book->cover_image }}" alt="content">
                                <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                    {{ $book->author }}</h3>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $book->title }}</h2>
                                <p class="leading-relaxed text-base">{{ $book->publication_date }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Account --}}
    <div class="fixed bottom-0 right-0 p-4 lg:w-1/3 md:w-full">
        <div class="flex border-2 rounded-lg border-gray-200 border-opacity-50 p-8 sm:flex-row flex-col bg-white">
            <div
                class="w-16 h-16 sm:mr-8 sm:mb-0 mb-4 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-10 h-10" viewBox="0 0 24 24">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <div class="flex-grow">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{ Auth::user()->username }}</h2>
                @if (Auth::user()->role_type == 'App\Models\Employee')
                    <p class="leading-relaxed text-base">{{ Auth::user()->role->job_position }}</p>
                    <p class="leading-relaxed text-base">{{ Auth::user()->role->hire_date }}</p>
                @else
                    <p class="leading-relaxed text-base">{{ Auth::user()->role->phone }}</p>
                    <p class="leading-relaxed text-base">{{ Auth::user()->role->address }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
