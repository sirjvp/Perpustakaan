<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- jquerry --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src='/resources/js/main.js'></script> --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li>
                            <a href="{{ route('book.index') }}" class="text-dark"><span
                                class="fa fa-home mr-3"></span> Book Catalog</a>
                        </li>
                        <li>
                            <a href="{{ route('userbook.index') }}" class="text-dark"><span
                                class="fa fa-home mr-3"></span> Borrowed Books</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                    viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <span class="ml-3 text-xl">Perpustakaan</span>
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                {{-- <a class="mr-5 hover:text-gray-900">First Link</a> --}}
                <a href="{{ route('catalog') }}" class="mr-5 hover:text-gray-900">Book
                    Catalog</a>
                <a href="{{ route('userbook.index') }}" class="mr-5 hover:text-gray-900">My Borrowed Books</a>
                <a href="{{ route('book.index') }}" class="mr-5 hover:text-gray-900">List Books</a>
                <a href="{{ route('userbook.admin') }}" class="mr-5 hover:text-gray-900">List Borrowed Books</a>
            </nav>
            <button
                class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Logout
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </header>
    <div>
        {{-- <nav id="sidebar" class="" style="background:rgba(255,255,255, 0.5);">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <h1><a href="{{ route('book.index') }}" class="logo"><img style="height: 30px;" src="/images/survit.png"
                        alt=""></a></h1>
            <ul class="list-unstyled components mb-5 bg-ls ">
                @guest
                    @if (Route::has('login'))
                        <li class="active">
                            <a href="{{ route('register') }}" class="text-dark"><span
                                    class="fa fa-sign-in mr-3"></span>Daftar</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="active">
                            <a href="{{ route('login') }}" class="text-dark"><span
                                    class="fa fa-sign-in mr-3"></span>Masuk</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('catalog') }}" class="text-dark"><span class="fa fa-home mr-3"></span> Book
                            Catalog</a>
                    </li>
                    <li>
                        <a href="{{ route('userbook.index') }}" class="text-dark"><span class="fa fa-home mr-3"></span>
                            Borrowed Books</a>
                    </li>
                    @if (Auth::user()->isAdmin())
                        <li>
                            <a href="{{ route('book.index') }}" class="text-dark"><span class="fa fa-user mr-3"></span> List
                                Books</a>
                        </li>
                        <li>
                            <a href="{{ route('userbook.admin') }}" class="text-dark"><span class="fa fa-user mr-3"></span>
                                List Borrowed Books</a>
                        </li>
                    @endif
                    <li>
                        <a class="text-danger" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out mr-3"></span> Keluar</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </nav> --}}
        @yield('content')
    </div>
    <script>
        (function($) {

            "use strict";

            var fullHeight = function() {

                $('.js-fullheight').css('height', $(window).height());
                $(window).resize(function() {
                    $('.js-fullheight').css('height', $(window).height());
                });

            };
            fullHeight();

            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });

        })(jQuery);
    </script>
</body>

</html>
