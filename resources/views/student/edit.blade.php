@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Students</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="text-center">
                    <h4 class="text-blue h4 mb-3">{{ __('Edit Student') }}</h4>
                </div>
            </div>
            <form action="{{ route('student.update', $student->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                @method('PATCH')

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">RegNo</label>
                            <div class="col-sm-12 col-md-10">
                                <input id="regno" name="regno" class="form-control @error('regno') is-invalid @enderror" type="text" value="{{ $student->regno }}" required>
                                @error('regno')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">NAME</label>
                            <div class="col-sm-12 col-md-10">
                                <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" value="{{ $student->name }}" required>
                                @error('name')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                            <div class="col-sm-12 col-md-10">
                                <input id="email" name="email" class="form-control @error('email') is-invalid @enderror" type="email" value="{{ $student->email }}" required>
                                @error('email')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Phone</label>
                            <div class="col-sm-12 col-md-10">
                                <input id="tel" name="tel" class="form-control @error('tel') is-invalid @enderror" type="text" value="{{ $student->tel }}" required>
                                @error('tel')
                                <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Subjects</label>
                            <div class="col-sm-12 col-md-10">
                                <select name="sub" class="form-control selectpicker" title="Select subject" required>
                                    <option selected value="{{ $student->room_id }}" data-subtext="{{ $student->room->sem}} {{ $student->room->dept}}">{{ $student->room->name }}</option>
                                    @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" data-subtext="{{ $room->sem}} {{ $room->dept}}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Select your avatar</label>
                                    <input type="file" name="image" class="form-control-file form-control height-auto" onchange="loadfile(event)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <img
                                id="output"
                                class="tm-avatar img-fluid"
                                src=""
                                alt=""

                                style=""
                                />
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
                        </div>

                    </div>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <a href="{{ route('student.index') }}" class="btn btn-warning btn-block"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel the update</a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block float-right">
                                {{ __('Save changes') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
