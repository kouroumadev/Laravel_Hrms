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
                    <li class="breadcrumb-item active" aria-current="page"> All Students</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card-box mb-30">
            <div class="pd-20 text-center">
                <h4 class="text-blue text-left h4">List Of All Students</h4>
                @if (session('yes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('yes') }}
                    </div>
                @endif
                @if (session('no'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('no') }}
                    </div>
                @endif
                <br>
                <div class="row justify-content-center">

                    <div class="col-md-6">

                        <form id="frm-src" action="{{ route('student.filter') }}" method="POST">
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

                    <div class="col-md-6">
                        <form id="frm-stud" action="{{ route('student.search') }}" method="POST">
                            @csrf
                            <div class="input-group row">
                                <input id="tel" name="val" class="form-control" type="text" placeholder="Search by RegNo" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            @isset($studs)

            <div class="pb-20">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">RegNo</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Phone</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studs as $stud)
                        <tr>
                            <td scope="row" class="text-center">{{ $stud->regno }}</td>
                            <td class="text-center">{{ $stud->name }}</td>
                            <td class="text-center">{{ $stud->email }}</td>
                            <td class="text-center">{{ $stud->tel }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="{{ route('student.show', $stud->id) }}"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="{{ route('student.edit', $stud->id ) }}"><i class="dw dw-edit2"></i> Edit</a>
                                        <button type="submit" class="dropdown-item" href="{{ route('student.destroy',$stud->id ) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('student-form.{{ $stud->id }}').submit(); ">
                                                <i class="dw dw-delete-3"></i> Delete</button>

                                            <form id="student-form.{{ $stud->id }}" action="{{ route('student.destroy',$stud->id ) }}" method="POST" class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        {{ $studs->links() }}
                    </div>
                </div>

            </div>

            @endisset
        </div>
    </div>
</div>

@endsection
