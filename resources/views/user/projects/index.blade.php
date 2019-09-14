@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-6">
            <h2>My Projects</h2>
        </div>

        <div class="col-6">
            <div class="float-right">
                <a href="{!! route('projects.create') !!}" class="btn btn-sm btn-primary">Create project</a>
            </div>
        </div>
    </div>

    <div class="mb-3"></div>

    <div class="row">
        <div class="col-6">
            @foreach($projects as $project)

                <div class="card {!! ($project->accepted_in == null ? 'border-danger' : '') !!}">
                    <div class="card-header">
                        Project name: {{ $project->name }}

                        <div class="float-right">
                            <a class="btn btn-sm btn-primary"
                               href="{!! route('projects.show', ['id' => $project->id]) !!}">
                                View project
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! $project->description !!}

                        <hr/>

                        <p>Uploaded Documents</p>
                        <ol>
                            @foreach($project->documents as $document)
                                <li>
                                    <a href="{!! $document->url !!}">View document</a>
                                </li>
                            @endforeach
                        </ol>

                    </div>

                    <div class="card-footer">
                        <small>Created on : {!! $project->created_at->toDateString() !!}</small>

                        <div class="float-right">
                            <small>Expires on : {!! $project->expires_in !!}</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3"></div>
            @endforeach
        </div>
        <div class="col-6"></div>
    </div>
@endsection
