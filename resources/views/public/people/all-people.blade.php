@extends('layouts.app')

@section('content')
    <h2>Everyone on CodeSquad</h2>

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
                            <td></td>
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
