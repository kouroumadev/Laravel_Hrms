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
                    <li class="breadcrumb-item active" aria-current="page"> Overall Attendances</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-box mb-30">
            <div class="pd-20 text-center">
                @if (session('yes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('yes') }}
                    </div>
                @endif

                <h4 class="text-blue h4">SUBJECT: {{ $room->name }} -- DEPT: {{ $room->dept }} -- SEM: {{ $room->sem }}</h4>
                <h5 class="text-blue h4">FROM: {{ $debut }} -- To: {{ $fin }}</h5>


            </div>
            <div class="pb-20">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Full Name</th>
                            <th scope="col" class="text-center">Attendances</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($reps as $rep)
                        <tr>
                            <td scope="row" class="text-center">{{ DB::table('students')->where('id', $rep->student_id)->value('name') }}</td>
                            <td class="text-center">{{ $rep->flags }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    <div class="col-md-10">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
