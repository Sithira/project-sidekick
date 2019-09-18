@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Questions</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Ask an Question
        </a>
    </div>

    <div class="mt-5"></div>

    <div class="row">
        <div class="col-12">

            @foreach($questions as $key => $question)
                <a href="{!! route('forum.by-q-id', ['id' => $question->id]) !!}">
                    <div class="card">
                        <div class="card-body">
                            <h2>#{!! ++$key !!} {!! $question->title !!}</h2>
                        </div>
                    </div>
                </a>

                <div class="mb-3"></div>
            @endforeach

        </div>
    </div>
@endsection
