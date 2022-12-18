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
                    <h5>Add Books</h5>
                    <form action="{{ route('userbook.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="container" style="padding: 20px 55px;">
                            <div class="form-group"><label>Book</label>
                                <br>
                                <select name="book" class="custom-select">
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group"><label>Borrower</label>
                                <br>
                                <select name="user" class="custom-select">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-success" id="createBtn" type="submit">Simpan</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
