@extends('layouts.app')


@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project: {!! $project->name !!}</h1>

        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
           href="{!! route('proposals.create', ['id' => $project->id]) !!}">Make
            proposal</a>
    </div>

    <div class="row">

        <div class="col-12">

            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-10">
                            <h4 style="color: #000;"># {!! $project->name !!}
                                <br />
                                <small>
                                    @if($project->proposal_id == null)
                                        <div class="badge badge-success text-uppercase">AVAILABLE</div>
                                    @endif
                                </small>
                            </h4>

                            <div class="mb-5"></div>


                            <section>

                                {!! $project->description !!}

                            </section>
                        </div>

                        <div class="col-2">
                            Budget: {!! $project->budget !!}
                            <br />
                            Docs uploaded: {!! $project->documents->count() !!}
                        </div>

                    </div>


                    <hr />


                </div>
            </div>

            <div class="mt-5"></div>

            <h3>Proposals</h3>
            
            @foreach($project->proposals as $proposal)
                <div class="card">
                    <div class="card-header">From: {!! $proposal->user->name !!}</div>
                    <div class="card-body">
                        <h4>{!! $proposal->description !!}</h4>

                        <br />
                        <p style="font-style: italic">Budget: {!! $proposal->budget !!}</p>
                    </div>
                </div>

                <div class="mb-3"></div>
            @endforeach

        </div>

    </div>

@endsection
