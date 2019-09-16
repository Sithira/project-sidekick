@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Experience</h1>
{{--        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">--}}
{{--            <i class="fas fa-download fa-sm text-white-50"></i>--}}
{{--            Ask an Question--}}
{{--        </a>--}}
    </div>

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

                    {!! Form::open(['method' => 'POST', 'url' => route('experience.store')]) !!}
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
