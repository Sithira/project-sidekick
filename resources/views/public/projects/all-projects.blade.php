@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">All Projects on CodeSquad</h1>
        <a href="{!! route('public-people') !!}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-users fa-sm text-white-50"></i>
            People
        </a>
    </div>

    <div class="row">
        <div class="col-12">
            @foreach($projects as $project)
                <div class="m-2">
                    <div class="card">
                        <div class="card-header">

                            <div class="row">
                                <div class="col-6">
                                    <h4>
                                        Project :
                                        <a href="{!! route('pub-proj-show', ['id' => $project->id]) !!}">
                                            {!! $project->name !!}
                                        </a>
                                    </h4>

                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <a class="btn btn-sm btn-primary"
                                           href="{!! route('proposals.create', ['id' => $project->id]) !!}">Make
                                            proposal</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">

                            <div class="row">
                                <div class="col-8">
                                    {!! $project->description !!}

                                    <hr/>

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
