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
                    <li class="breadcrumb-item active" aria-current="page">Profile update</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
                <div class="pd-20 card-box height-100-p">
                    <div class="profile-photo">
                        @if ($user->image == null)
                        <img src="{{ asset('theme/avatar.png') }}" alt="" id="output" class="avatar-photo">
                        @else
                        <img src="{{ asset('storage/images/'. $user->image) }}" alt="" id="output" class="avatar-photo">
                        @endif

                    </div>
                    <div class="form-group">
                        <label>Select your avatar</label>
                        <input type="file" name="image" class="form-control-file form-control height-auto" onchange="loadfile(event)">
                        <input type="hidden" name="himage" value="{{ $user->image }}">
                        <script>
                            var loadfile = function(event)
                            {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.onload = function(){
                                    URL.revokeObjectURL(output.src);
                                }
                            };
                        </script>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-5">Save changes</button>

                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
                <div class="card-box height-100-p overflow-hidden p-3">

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Email Address*</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                            @error('email')
                            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Full Name*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                            @error('name')
                            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Location</label>
                        <div class="col-sm-8">
                            <textarea name="location" class="form-control" id="" cols="30" rows="5">{{ $user->location }}</textarea>
                        </div>
                    </div>

                </div>
            </div>

    </div>
</form>

@endsection



