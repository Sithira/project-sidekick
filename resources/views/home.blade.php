@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h3>Questions
                            <br />
                            {!! auth()->user()->questions()->count() !!}
                        </h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
        <div class="col-4"></div>
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
