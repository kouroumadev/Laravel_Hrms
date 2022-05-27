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
                    <li class="breadcrumb-item active" aria-current="page"> Mark Attendances</li>
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
                    <div class="alert alert-danger" role="alert">
                        {{ session('no') }}
                    </div>
                @endif
                <br>
                <div class="row justify-content-center">

                    <div class="col-md-8">

                        <form id="frm-att" action="{{ route('attendance.filter') }}" method="POST">
                            @csrf
                            <div class="input-group row">
                                <select name="sub" class="form-control selectpicker" title="Select subject" required>
                                    @foreach ($rooms as $room)
                                    <option value="{{ $room->id }}" data-subtext="{{ $room->sem}} {{ $room->dept}}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Load Data</button>
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
