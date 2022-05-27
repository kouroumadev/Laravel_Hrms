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
                    <li class="breadcrumb-item active" aria-current="page"> All Subjects</li>
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

                <h4 class="text-blue h4">List Of All subjects</h4>

            </div>
            <div class="pb-20">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Class Name</th>
                            <th scope="col" class="text-center">Department</th>
                            <th scope="col" class="text-center">Semester</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $room)
                        <tr>
                            <td scope="row" class="text-center">{{ $room->name }}</td>
                            <td class="text-center">{{ $room->dept }}</td>
                            <td class="text-center">{{ $room->sem }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href="{{ route('room.edit', $room->id ) }}"><i class="dw dw-edit2"></i> Edit</a>
                                        <button type="submit" class="dropdown-item" href="{{ route('room.destroy',$room->id ) }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('room-form.{{ $room->id }}').submit(); ">
                                                <i class="dw dw-delete-3"></i> Delete</button>

                                            <form id="room-form.{{ $room->id }}" action="{{ route('room.destroy',$room->id ) }}" method="POST" class="d-none">
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
            </div>
        </div>
    </div>
</div>

@endsection
