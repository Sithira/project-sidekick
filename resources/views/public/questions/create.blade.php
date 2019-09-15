@extends('layouts.app')

@section('content')
    <h2>Create new project</h2>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Ask a new question from any SideKick
                </div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'url' => route('questions.submit')]) !!}
                    <div class="form-group">
                        <label>Question Title: </label>
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('body') !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('categories') !!}
                        {!! Form::select('categories[]', $categories, null, ['class' => 'form-control', 'placeholder' => 'Please select', 'multiple']) !!}
                    </div>

                    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-sm' ]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

