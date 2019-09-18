@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Everyone on CodeSquad</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i>
            Ask an Question
        </a>
    </div>

    <div class="mb-3"></div>

    <div class="row">
        <div class="col-12">

            <div class="table-responsive">

                <table id="people" class="table table-bordered">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Categories</th>
                        <th>Points</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach($people as $person)
                        <tr>
                            <td>{!! $person->id !!}</td>
                            <td>{!! $person->name !!}</td>
                            <td>{!! $person->email !!}</td>
                            <td>{!! $person->phone !!}</td>
                            <td>
                                @foreach($person->skills as $skill)
                                    {!! $skill->name !!},
                                @endforeach
                            </td>
                            <td>{!! $person->points !!}</td>
                            <td>
                                <a href="{!! route('single-person', ['id' => $person->id]) !!}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-eye"></i>
                                    Profile
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>

            </div>

        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function () {
            $('#people').DataTable({
                "order": [[ 5, "desc" ]]
            } );
        });
    </script>
@endsection
