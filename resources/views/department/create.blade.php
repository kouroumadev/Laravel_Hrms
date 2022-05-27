@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Departments</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('department.index') }}">All Departments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Departments</li>
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
                    <h4 class="text-blue h4 mb-3">
                        {{ isset($department) ? __('Update Department') : __('Add Department') }}
                    </h4>
                </div>
            </div>
            <form action="{{ isset($department) ? route('department.update', $department->id) : route('department.store') }}" method="post">
                @csrf

                @isset($department)
                    @method('patch')
                @endisset

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">DEPARTMENT NAME</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="dept_name"
                            name="dept_name"
                            class="form-control
                            @error('dept_name') is-invalid @enderror"
                            type="text"
                            required
                            @isset($department)
                                value="{{ $department->dept_name }}"
                            @endisset/>
                            @error('dept_name')
                            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">DESCRIPTION</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="dept_desc"
                            name="dept_desc"
                            class="form-control
                            @error('dept_desc') is-invalid @enderror"
                            type="text"
                            required
                            @isset($department)
                                value="{{ $department->dept_desc }}"
                            @endisset/>
                        @error('dept_desc')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">DEPARTMENT HEAD</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                        id="dept_head"
                        name="dept_head"
                        class="form-control
                        @error('dept_head') is-invalid @enderror"
                        type="text"
                        required
                        @isset($department)
                            value="{{ $department->dept_head }}"
                        @endisset/>
                        @error('dept_head')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-primary ml-5 float-right">
                        {{ isset($department) ? __('save changes') : __('submit') }}
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
