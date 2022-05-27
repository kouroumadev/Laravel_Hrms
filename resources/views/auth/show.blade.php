@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Profile</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
    </div>
</div>


<div class="row justify-content-center">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
                <img src="{{ asset('storage/images/'. $user->image) }}" alt="" class="avatar-photo">
            </div>
            <h5 class="text-center h5 mb-1">{{ $user->name }}</h5>

            <a href="{{ route('user.edit') }}" class="btn btn-primary btn-block mt-5">Update profile</a>



        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div class="card-box height-100-p overflow-hidden">
            @if (session('yes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('yes') }}
                    </div>
            @endif
            <div class="profile-info">
                <h5 class="mb-20 h5 text-blue">Contact Information</h5>
                <ul>
                    <li>
                        <span>Email Address:</span>
                        {{ $user->email }}
                    </li>

                    <li>
                        <span>Country:</span>
                        {{ $user->country }}
                    </li>
                    <li>
                        <span>Address:</span>
                        {{ $user->city }}<br>
                        {{ $user->street }}, {{ $user->country }}
                    </li>
                    <li>
                        <span>Gender:</span>
                        {{ $user->gender }}

                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
