@extends('layouts.app')

@section('content')

    <h2>My Experience</h2>

    <div class="mb-3"></div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Current Experience

                    <div class="float-right">
                        <a href="{!! route('experience.create') !!}" class="btn btn-sm btn-primary" >Add more</a>
                    </div>

                </div>

                @foreach($experiences as $experience)
                    <div class="p-2">
                        <div class="card">
                            <div class="card-body">

                                <h4>
                                    {!! $experience->title !!}
                                    <div class="float-right">
                                        <a class="btn btn-sm btn-primary" href="{{ route('experience.edit', ['id' => $experience->id])  }}">Edit</a>
                                    </div>
                                </h4>

                                {!! $experience->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
