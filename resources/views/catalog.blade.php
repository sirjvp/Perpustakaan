@extends('layouts.app')
@section('content')

    {{-- MOBILE --}}
    {{-- <div class="container-xxl p-5 d-md-none">
        <div class="row justify-content-center">
            <div style="overflow-y:scroll; height:100vh;">
                <div class="container-fluid p-2 mb-5">
                    <div class="text-right mb-3">
                        <a href="" data-toggle="modal" data-target="#createsurvey" class="btn btn-primary ">Buat Survei</a>
                    </div>
                    <div class="container bg-white shadow p-2 mb-4" style="border-radius: 15px;">
                        <h4 class="text-center">Survei Saya</h4>
                    </div>
                    @foreach ($surveys as $survey)
                        <div class="card-list w-100 no-gutters">
                            <div class="container bg-white no-gutters shadow pr-4 pl-4 pt-4 pb-3 mb-4"
                                style="border-radius: 15px;">
                                <div class="row">
                                    <div class="col-11">
                                        <h5 class="font-weight-bolder">
                                            {{ $survey->title }}
                                        </h5>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 text-dark">
                                        {{ $survey->package->description }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-10">
                                        @if ($survey->status_id == '3')
                                            @if ($survey->count < $survey->package->respondent)
                                                Dibuka
                                            @else
                                                Ditutup
                                            @endif
                                        @else
                                            {{ $survey->status->status }}
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-2 ">
                                    <div class="col-5 mt-1 ">
                                        {{ $survey->count }} / {{ $survey->package->respondent }}
                                    </div>
                                    <div class="col-7 no-gutters text-right">
                                        <div class="row">
                                            <div class="no-gutters text-right">
                                                @if ($survey->status_id == 1 || $survey->status_id == 2)
                                                    <a href="{{ route('survey.edit', $survey) }}" class="btn btn-primary"
                                                        style="background-color: rgb(0,0,226);">Ubah</a>
                                                @elseif($survey->status_id == 3)
                                                    <a href="{{ route('survey.edit', $survey) }}" class="btn btn-primary"
                                                        style="background-color: rgb(0,0,226);">Detail</a>
                                                @elseif($survey->status_id == 4)
                                                    <a href="" class="btn btn-primary"
                                                        style="background-color: rgb(0,0,226);" data-toggle="modal"
                                                        data-target="#pay-{{ $survey->id }}">Bayar</a>
                                                @else
                                                    -
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

    {{-- DESKTOP --}}
    <section class="text-gray-600 body-font">
        <div class="container px-5 mx-auto">
            {{-- <div class="flex flex-wrap w-full mb-20">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Pitchfork Kickstarter Taxidermy</h1>
                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
            </div> --}}
            <div class="flex flex-wrap -m-4">
                @foreach ($books as $book)
                    <div class="xl:w-1/4 md:w-1/2 p-4">
                        <a href="{{ route('book.show', $book) }}">
                            <div class="bg-gray-100 p-6 rounded-lg">
                                <img class="h-100 rounded w-full object-cover object-center mb-6" src="/cover_images/{{ $book->cover_image }}" alt="content">
                                <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">{{ $book->author }}</h3>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $book->title }}</h2>
                                <p class="leading-relaxed text-base">{{ $book->publication_date }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
      </section>
@endsection
