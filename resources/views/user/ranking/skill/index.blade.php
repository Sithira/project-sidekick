@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">
@endsection

@section('content')

    <h2>My Skills</h2>

    <div class="mb-3"></div>

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Current Skills</div>
                <div class="card-body">
                    Please choose:
                    {!! Form::open(['method' => 'post', 'url' => route('skills.store')]) !!}
                    {!! Form::select('skills[]',  $skillList, $skills, ['id' => 'skill_select', 'class' => 'form-control', 'multiple'], [], []) !!}
                    <div class="mb-3"></div>
                    <button type="submit" class="float-right btn btn-primary btn-sm">Save</button>
                    {!! Form::close()  !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#skill_select").select2({
                tags: true,
                tokenSeparators: [",", " "]
            });
        });
    </script>
@endsection
