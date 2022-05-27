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
                    <li class="breadcrumb-item"><a href="{{ route('student.index') }}">All Students</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student Profil</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center no-gutters">
    <div class="col-md-6">
        <div class="card-box mb-30">
            <div class="pd-20 text-center">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="mb-20 h5 text-blue" >Avatar</h5>
                        @if ($student->image == null)
                        <img src="{{ asset('theme/avatar.png') }}" alt="" srcset=""
                        class="img-thumbnail">
                        @else
                        <img src="{{ asset('storage/images/'. $student->image) }}" alt="" srcset=""
                        class="img-thumbnail">
                        @endif

                    </div>
                    <div class="col-md-6 profile-info">
                        <h5 class="mb-20 h5 text-blue">Informations</h5>
                        <ul>
                            <li>
                                <span>RegNo: {{ $student->regno }}</span>

                            </li>
                            <li>
                                <span>Full Name:</span>
                                {{ $student->name }}
                            </li>
                            <li>
                                <span>Email Address:</span>
                                {{ $student->email }}
                            </li>

                            <li>
                                <span>Department:</span>
                                {{ $student->room->dept }}
                            </li>
                            <li>
                                <span>Semester:</span>
                                {{ $student->room->sem }}
                            </li>
                            <li>
                                <span>Phone:</span>
                                {{ $student->tel }}
                            </li>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
