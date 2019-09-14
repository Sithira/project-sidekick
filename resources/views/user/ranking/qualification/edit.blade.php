@extends('layouts.app')


@section('content')

    <h2>Edit Qualification</h2>

    <div class="row">
        <div class="col-6">

            @include('flash::message')
            @include('error-flash')

            <div class="card">
                <div class="card-header">
                    {!! $qualification->title !!}
                </div>
                <div class="card-body">
                    {!! Form::model($qualification, ['method' => 'PUT', 'url' => [route('qualifications.update', ['id' => $qualification->id])]]) !!}
                        <div class="form-group">
                            <label>Title: </label>
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            <label>Qualification description</label>
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-sm']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
