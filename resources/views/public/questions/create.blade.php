@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ask a Question</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-user fa-sm text-white-50"></i>
            Profile
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">

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

