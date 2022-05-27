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
                    <li class="breadcrumb-item active" aria-current="page"> Report Attendances</li>
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
            <div class="pb-20">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Full Name</th>
                            <th scope="col" class="text-center">Date</th>
                            <th scope="col" class="text-center">Attendance</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($atts as $att)
                        <tr>
                            <td scope="row" class="text-center">{{ $att->student->name }}</td>
                            <td class="text-center">{{ $att->date }}</td>
                            <td class="text-center">
                                @if ($att->flag == 0 )
                                {{ __('Absent') }}
                                @else
                                {{ __('Present') }}
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        <i class="dw dw-more"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                        <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a>
                                        <a class="dropdown-item" href=""><i class="dw dw-edit2"></i> Edit</a>
                                        <button type="submit" class="dropdown-item" href=""
                                                onclick="event.preventDefault();
                                                document.getElementById('att-form.{{ $att->id }}').submit(); ">
                                                <i class="dw dw-delete-3"></i> Delete</button>

                                            <form id="att-form.{{ $att->id }}" action="" method="POST" class="d-none">
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
                        {{ $atts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
