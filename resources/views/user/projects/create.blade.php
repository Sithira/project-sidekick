@extends('layouts.app')

@section('content')
    <h2>Create new project</h2>

    <div class="row">
        <div class="col-6">
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

