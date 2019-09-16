@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Questions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{!! auth()->user()->questions()->count() !!}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Answers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{!! auth()->user()->answers()->count() !!}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">CodeSquad Points</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-question fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <br />

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div class="card">

                        <div class="card-header">
                            My Projects
                        </div>

                        <div class="card-body">

                            <div class="row my-projects">

                                <div class="col-md-6 wall">
                                    <span>On-Going</span>
                                    <h3>{!! $ongoing !!}</h3>
                                </div>

                                <div class="col-md-6">
                                    <span>Completed</span>
                                    <h3>{{ $completed  }}</h3>
                                </div>

                            </div>

                            <div class="mb-5"></div>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="btn btn-primary btn-block">
                                        <i class="fas fa-spinner"></i>
                                        View On-going projects
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn btn-primary btn-block">
                                        <i class="fas fa-check-circle"></i> View Completed projects
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-info">
                <div class="card-header">
                    Add new project
                </div>

                <div class="card-body text-info">
                    <a href="{{ route('projects.create') }}" class="btn btn-primary btn-block">
                        <i class="fa fa-plus"></i>
                        Create new project
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
