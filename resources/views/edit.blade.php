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
    <div class="container-xxl p-5 d-none d-md-block">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="panel px-4 py-3 glass shadow" style="height:100vh;">
                    <h5>Edit Books</h5>
                    <form action="{{ route('book.update', $book) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input name="_method" type="hidden" value="PATCH">
                        <div class="container" style="padding: 20px 55px;">
                            <div class="form-group"><label>Title</label>
                                <input class="form-control border" type="text" name="title" value="{{ $book->title }}" required>
                            </div>

                            <div class="form-group"><label>Author</label>
                                <input class="form-control border" type="text" name="author" value="{{ $book->author }}" required>
                            </div>

                            <div class="form-group"><label>Genre</label>
                                <input class="form-control border" type="text" name="genre" value="{{ $book->genre }}" required>
                            </div>

                            <div class="form-group"><label>Publication Date</label>
                                <input class="form-control border" type="text" name="publication_date" value="{{ $book->publication_date }}" required>
                            </div>

                            <div class="form-group"><label>Synopsis</label>
                                <input class="form-control border" type="text" name="synopsis" value="{{ $book->synopsis }}" required>
                            </div>

                            <div class="form-group"><label>Cover Image</label>
                                <br>
                                <img style="height: 200px;" src="/cover_images/{{ $book->cover_image }}" alt="">
                                <br><label>Change Cover Image</label>
                                <input type="file" name="file">
                            </div>

                            <button class="btn btn-success" id="createBtn" type="submit">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
