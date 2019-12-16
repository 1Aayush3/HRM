@extends('layouts.index')
@section('title', 'Registration')
@section('main-content')
<div class="container-fluid">
    <div class="col-md-8">
        <!-- Profile Image -->
        <div class="card card-warning card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/'.$user->image)}}"
                        alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"> {{$user->name}}</h3>
                <p class="text-muted text-center">{{$user->designation->designation}}</p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right"> {{$user->email}} </a>
                    </li>
                    <li class="list-group-item">
                        <b>Phone</b> <a class="float-right"> {{$user->phone}} </a>
                    </li>
                    <li class="list-group-item">
                        <b>Alternate Email </b> <a class="float-right"> {{$user->alt_email}} </a>
                    </li>
                    <li class="list-group-item">
                        <b>Gender </b> <a class="float-right"> {{$user->gender}} </a>
                    </li>
                    <li class="list-group-item">
                        <b>Joined </b> <a class="float-right">{{$user->joined}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Review </b> <a class="float-right">{{$user->review}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Left </b> <a class="float-right">{{$user->left}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Account</b> <a class="float-right">{{$user->acc}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Bank</b> <a class="float-right">{{$user->bank}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Branch </b> <a class="float-right">{{$user->branch}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>PAN</b> <a class="float-right">{{$user->pan}}</a>
                    </li>
                    <li class="list-group-item">
                        <b>CIT </b> <a class="float-right">{{$user->cit}}</a>
                    </li>

                    <li class="list-group-item  d-flex justify-content-center ">
                        <form method="get" action="{{route('employees.edit',$user->id)}}">
                            <button class="btn btn btn-primary" type="submit">
                                Edit
                            </button>|
                        </form>

                        <form method="get" action="{{route('employees.index')}}">
                            <button class="btn btn btn-primary" type="submit">
                                Back
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection