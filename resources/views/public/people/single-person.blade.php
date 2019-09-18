@extends('layouts.app')

@section('content')
    <div class="row m-y-2">
        <div class="col-lg-8 push-lg-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <div class="mt-3"></div>
                    <h4>User Profile</h4>
                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p>Name: {!! $user->name !!}</p>
                            <p>Email: {!! $user->email !!}</p>
                            <p>Member since: {!! \App\Models\User::find(1)->created_at->toDateString() !!}</p>
                        </div>
                        <div class="col-md-6">
                            <h6>My Skills</h6>

                            @foreach($user->skills as $skill)
                                <a href="#" class="badge badge-primary">{!! $skill->name !!}</a>
                            @endforeach

                            <hr>
                            <span class="tag tag-primary"><i class="fa fa-user"></i> {!! $user->answers->where('is_accepted')->count() !!} accepted answers</span>
                            <span class="tag tag-success"><i class="fa fa-cog"></i> {!! $user->questions->count() !!} questions asked</span>
                            <span class="tag tag-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>
                    </div>

                    <div class="mb-4"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock pull-xs-right"></span> Recent Questions</h4>
                            <table class="table table-hover table-striped">
                                <tbody>
                                    @foreach($user->answers as $answer)
                                        <tr>
                                            <td>
                                                <strong>#</strong> {!! $answer->question->title !!} <strong></strong>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>

            </div>
        </div>
        <div class="col-lg-4 pull-lg-8 text-xs-center">
            <img src="//placehold.it/250" class="m-x-auto img-fluid img-circle" alt="avatar">
        </div>
    </div>
@endsection
