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
    <div class="col-md-10" style="margin-bottom: 65px;">
        <div class="card-box mb-30">
            <div class="pd-20 text-center">
                <h4 class="text-blue h4">~ </h4>
                @if (session('yes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('yes') }}
                    </div>
                @endif
            </div> <hr>
            <form action="{{ route('attendance.store') }}" method="post">
                @csrf
                <div class="row ">
                    <div class="col-md-4">
                        <h5 class="text-right mt-2">Select date*</h5>
                    </div>
                    <div class="col-md-6">
                        <input type="date" name="date" id="" class="form-control" required>
                        <input type="hidden" name="room_id" value="{{ $student->room->id }}">
                    </div>

                </div> <br>

                <div class="pb-20">
                    <table class=" table">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="select-all" onclick="toogle(this)"></th>
                                <th class="text-center">RegNo</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($studs as $stud)
                            <tr>
                                <td class="text-center"><input type="checkbox" id="non" name="oui[]" value="{{ $stud->id }}" id="checkbox"/></td>
                                <input type="hidden" name="non[]" value="{{ $stud->id }}" id="checkbox"/>
                                <td class="text-center">{{ $stud->regno }}</td>
                                <td class="text-center">{{ $stud->name }}</td>
                                <td class="text-center">{{ $stud->email }}</td>
                                <td class="text-center">{{ $stud->tel }}</td>

                            </tr>
                            @endforeach

                        </tbody>


                    </table> <hr>
                    <div class="row">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </div>
</div>

@endsection
