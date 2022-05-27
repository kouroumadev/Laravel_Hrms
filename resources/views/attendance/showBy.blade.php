@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Attendances</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Overall Attendance</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-box mb-30">
            <div class="pd-20 text-center">
                @if (session('no'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('no') }}
                    </div>
                @endif

                <div class="row justify-content-center">

                    <div class="col-md-6">

                        <form id="frm-att" action="{{ route('attendance.overAll') }}" method="POST">
                            @csrf
                            <div class="input-group row ml-2">
                                <select name="sub" class="form-control selectpicker" title="Select subject" required>
                                    @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" data-subtext="{{ $room->sem}} {{ $room->dept}}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">From</label>
                                <div class="col-sm-10">
                                    <input type="date" name="deb" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">To</label>
                                <div class="col-sm-10">
                                    <input type="date" name="fin" class="form-control" required>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">Load Data</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
