@extends('layouts.app')


@section('content')
    <h2>My Qualifications</h2>

    <div class="mb-3"></div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Current Qualifications

                    <div class="float-right">
                        <button class="btn btn-sm btn-primary">Add more</button>
                    </div>

                </div>

                @foreach($qualifications as $qualification)
                    <div class="p-2">
                        <div class="card">
                            <div class="card-body">

                                <h4>
                                    {!! $qualification->title !!}
                                    <div class="float-right">
                                        <a class="btn btn-sm btn-primary" href="{{ route('qualifications.edit', ['id' => $qualification->id])  }}">Edit</a>
                                    </div>
                                </h4>

                                {!! $qualification->description !!}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
