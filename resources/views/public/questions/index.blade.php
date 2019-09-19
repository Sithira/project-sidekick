@extends('layouts.app')


@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">CodeSquad Forum</h1>
        <a href="{!! route('questions.ask') !!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Ask an Question
        </a>
    </div>

    <div class="mt-5"></div>

    <div class="row">
        <div class="col-3">
            <h4>Categories</h4>

            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">{!! $category !!}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-9">

            <h4>New Questions on CodeSquad</h4>

            @foreach($questions as $question)
                <div class="card shadow mb-5 bg-white rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            {!! $question->likes !!}
                                            <br/>
                                            <span>
                                            Likes
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            {!! $question->likes !!}
                                            <br/>
                                            <span>
                                            Dislikes
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-8">
                                <a href="{!! route('forum.by-q-id', ['id' => $question->id]) !!}">
                                    <h5>{!! $question->title !!}</h5>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-8">
                                @foreach($question->categories as $category)
                                    <span class="badge badge-secondary">{!! $category->name !!}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3"></div>
            @endforeach
        </div>
    </div>

@endsection
