@extends('layouts.app')

@section('content')

    <h2>
        Post a proposal
    </h2>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Proposal for : {!! $project->name !!}
                </div>

                <div class="card-body">

                    {!! Form::open(['method' => 'POST', 'url' => route('proposals.store', ['id' => $project->id])]) !!}

                        <div class="form-group">
                            {!! Form::label('budget') !!}
                            {!! Form::number('budget', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form">
                            {!! Form::label('description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="mt-2"></div>

                        {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block btn-sm']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
