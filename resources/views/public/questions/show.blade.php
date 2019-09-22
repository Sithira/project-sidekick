@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-2">
            <div class="row">
                <div class="col-6">
                    <div class="text-center">
                        {!! $question->likes !!}
                        <br/>
                        {!! Form::open(['method' => 'POST', 'url' => route('question.upvote', ['id' => $question->id])]) !!}
                        {!! Form::submit('Upvote', ['class' => 'btn btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="col-6">
                    <div class="text-center">
                        {!! $question->dislikes !!}
                        <br/>
                        {!! Form::open(['method' => 'POST', 'url' => route('question.downvote', ['id' => $question->id])]) !!}
                        {!! Form::submit('Downvote', ['class' => 'btn btn-primary btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <h4>
                        {!! $question->title !!}
                    </h4>
                    <small>
                        By: {!! $question->user->name !!}
                    </small>
                </div>

                <div class="card-body">
                    <pre>
                        {!! $question->body !!}
                    </pre>

                    <div class="row">
                        <div class="col-8">
                            @foreach($question->categories as $category)
                                <span class="badge badge-secondary">{!! $category->name !!}</span>
                            @endforeach
                        </div>
                        <div class="col-4"></div>
                    </div>
                </div>
            </div>

            <div class="mb-3"></div>

            <h4>Replies</h4>

            <div class="row">
                <div class="col-2"></div>
                <div class="col-10">
                    @foreach($question->replies as $reply)
                        <div class="card">
                            <div class="card-body">
                                [{!! $reply->user->name !!} said:]
                                {!! $reply->body !!}
                            </div>
                        </div>

                        <div class="mb-3"></div>
                    @endforeach

                    <br/>

                    <div class="card">
                        <div class="card-header">
                            Add comment
                        </div>

                        <div class="card-body">
                            {!! Form::open(['method' => 'POST', 'url' => route('questions.reply',  ['id' => $question->id])]) !!}
                            <div class="form-group">
                                {!! Form::label('body') !!}
                                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) !!}
                            </div>

                            {!! Form::submit('Add comment', ['class' => 'btn btn-primary btn-sm btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mb-5"></div>
    </div>

    <div class="row">
        <div class="col-12">
            <h2>Answers</h2>


            @foreach($question->answers as $answer)
                <div class="row">
                    <div class="col-2">
                        @if($question->user_id == auth()->id())
                            {!! Form::open(['method' => 'POST', 'url' => route('accept-answer', ['id' => $question->id, 'subId' => $answer->id])]) !!}
                                <div class="text-center mt-4">
                                    {!! Form::submit('Accept', ['class' => 'btn btn-sm btn-success']) !!}
                                </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                    <div class="col-10">
                        <div class="card mb-3 {!! ($answer->is_answer == 1 ? 'border-success' : '') !!}">
                            <div class="card-body">

                                @if($answer->is_answer)
                                    <div class="badge badge-success">ANSWER</div>
                                @endif

                                <div class="mt-3"></div>

                                [{!! $answer->user->name !!} said:]
                                {!! $answer->body !!}
                            </div>
                        </div>
                    </div>

                    <div class="mb-3"></div>
                </div>
            @endforeach

            <br/>

            <div class="card">
                <div class="card-header">
                    Add an Answer
                </div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'url' => route('questions.answer',  ['id' => $question->id])]) !!}
                    <div class="form-group">
                        {!! Form::label('body') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => 3]) !!}
                    </div>

                    {!! Form::submit('Add comment', ['class' => 'btn btn-primary btn-sm btn-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
