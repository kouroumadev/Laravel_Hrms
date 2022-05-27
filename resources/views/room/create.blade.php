@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Subjects</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Subject</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="pd-20 card-box mb-30">
            <div class="clearfix">
                <div class="text-center">
                    <h4 class="text-blue h4 mb-3">{{ isset($room) ? __('Update Classroom') : __('Add New Classroom') }}</h4>
                </div>
            </div>
            <form action="{{ isset($room) ? route('room.update', $room->id) : route('room.store') }}" method="post">
                @csrf
                @isset($room)
                    @method('patch')
                @endisset
                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">CLASS NAME</label>
                    <div class="col-sm-12 col-md-8">
                        <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Java" required @isset($room)
                            value="{{ $room->name }}"
                        @endisset>
                        @error('name')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">DEPARTMENT</label>
                    <div class="col-sm-12 col-md-8">
                        <select name="dept" class="form-control selectpicker" title="Select department" required>
                            @isset($room)
                            <option selected value="{{ $room->dept }}">{{ $room->dept }}</option>
                            @endisset
                            <option value="MCA">MCA</option>
                            <option value="BCA">BCA</option>
                            <option value="MBA">MBA</option>
                            <option value="BBA">BBA</option>
                            <option value="PUC">PUC</option>
                            <option value="MSC">MSC</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">SEMESTER</label>
                    <div class="col-sm-12 col-md-8">
                        <select name="sem" class="form-control selectpicker" title="Select semester" required>
                            @isset($room)
                            <option selected value="{{ $room->sem }}">{{ $room->sem }}</option>
                            @endisset
                            <option value="SEMESTER 1">SEMESTER 1</option>
                            <option value="SEMESTER 2">SEMESTER 2</option>
                            <option value="SEMESTER 3">SEMESTER 3</option>
                            <option value="SEMESTER 4">SEMESTER 4</option>
                            <option value="SEMESTER 5">SEMESTER 5</option>
                            <option value="SEMESTER 6">SEMESTER 6</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-primary ml-5 float-right">
                        {{ isset($room) ? __('save changes') : __('submit') }}
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
