@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-6">
            <h2>SideKick Forum</h2>
        </div>

        <div class="col-6">
            <div class="float-right">
                <a href="#" class="btn btn-primary btn-block btn-sm">
                    Ask an Question
                </a>
            </div>
        </div>
    </div>

    <div class="mt-5"></div>
    
    <div class="row">
        <div class="col-4">
            <h4>Categories</h4>

            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">{!! $category !!}</li>
                @endforeach
            </ul>
        </div>

        <div class="col-8">

            <h4>New Questions on SideKick</h4>

            @foreach($questions as $question)
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="text-center">
                                            {!! $question->likes !!}
                                            <br />
                                            <span>
                                            Likes
                                        </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-center">
                                            {!! $question->likes !!}
                                            <br />
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
