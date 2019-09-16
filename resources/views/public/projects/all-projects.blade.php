@extends('layouts.app')

@section('content')
    <h2>All Projects on CodeSquad</h2>

    <div class="row">
        <div class="col-12">
            @foreach($projects as $project)
                <div class="m-2">
                    <div class="card">
                        <div class="card-header">
                            {!! $project->name !!}

                            <div class="float-right">
                                <a class="btn btn-sm btn-primary" href="{!! route('proposals.create', ['id' => $project->id]) !!}">Make proposal</a>
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-8">
                                    {!! $project->description !!}

                                    <hr />

                                    <h4 style="font-style: italic">DeadLine : {!! $project->end_date !!}</h4>
                                </div>

                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4>Budget: {!! $project->budget !!}</h4>

                                            <p>
                                                Document count: {!! $project->documents->count() !!}
                                            </p>

                                            <p>
                                                Proposals count: {!! $project->proposals->count() !!}
                                            </p>
                                        </div>

                                        <div class="col-6">
                                            <h4>Skills required</h4>

                                            <ul>
                                                @foreach($project->skills as $skill)
                                                    <li> {!! $skill->name !!} </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer">
                            Created at: {!! $project->created_at->toDateString() !!}

                            <div class="float-right">
                                Expires on : {!! $project->expires_in !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-5"></div>
            @endforeach
        </div>
    </div>

@endsection
