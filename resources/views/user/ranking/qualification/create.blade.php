@extends('layouts.app')

@section('content')

    <h2>My Qualifications</h2>

    <div class="mb-3"></div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Add Experience
                </div>
                <div class="card-body">

                    @include('flash::message')
                    @include('error-flash')

                    {!! Form::open(['method' => 'POST', 'url' => route('qualifications.store')]) !!}
                    <div class="form-group">
                        <label>Title: </label>
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-sm']) !!}
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
