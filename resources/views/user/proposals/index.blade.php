@extends('layouts.app')

@section('content')
    <h2>Proposal for project : {!! $proposal->name !!}</h2>

    <div class="row">

        @foreach($project->proposal as $proposal)
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        {!! $proposal->project->name !!}

                        <div class="float-right">
                            <a class="btn btn-primary btn-sm"
                               href="{!! route('projects.show', ['id' => $proposal->id]) !!}">View project</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <p style="font-style: italic">{!! $proposal->description !!}</p>

                        <br/>

                        <p>Budget : LKR <strong>{!! $proposal->budget !!}</strong></p>
                    </div>

                    <div class="card-footer">
                        <div class="float-right">
                            {!! Form::open(['method' => 'POST', 'url' => [route('approveOrRejectProposal', ['id' => $project->id, 'subId' => $proposal->id])]]) !!}
                                {!! Form::submit('Approve', ['class' => 'btn btn-success btn-sm btn-block']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
