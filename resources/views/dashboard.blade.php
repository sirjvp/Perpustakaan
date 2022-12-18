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
                                            @if($userbook->status == '1')
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
                                            @if($userbook->status == '1')
                                                <form action="{{ route('userbook.update', $userbook) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PATCH">
                                                    <button class="btn btn-primary" type="submit" onclick="this.disabled=true;this.form.submit();">
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
    </div>
@endsection
