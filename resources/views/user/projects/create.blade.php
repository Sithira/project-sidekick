@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Find a SQUAD Buddy for your project</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Ask a Question
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Fill to create a new project
                </div>

                <div class="card-body">
                    {!! Form::open(['method' => 'POST', 'url' => route('projects.store')]) !!}
                    <div class="form-group">
                        <label>Project name: </label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description') !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('skills') !!}
                        {!! Form::select('skills[]', $skills, null, ['class' => 'form-control', 'placeholder' => 'Please select', 'multiple']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('type') !!}
                        {!! Form::text('type', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('budget') !!}
                        {!! Form::text('budget', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('end_date') !!}
                        {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-sm' ]) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

