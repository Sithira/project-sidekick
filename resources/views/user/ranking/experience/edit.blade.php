@extends('layouts.app')


@section('content')

    <h2>Edit Experience</h2>

    <div class="row">
        <div class="col-6">
            @include('flash::message')
            @include('error-flash')

            <div class="card">
                <div class="card-header">
                    {!! $experience->title !!}
                </div>
                <div class="card-body">
                    {!! Form::model($experience, ['method' => 'PUT', 'url' => [route('qualifications.update', ['id' => $experience->id])]]) !!}
                    <div class="form-group">
                        <label>Title: </label>
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        <label>Experience description</label>
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
