@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Workflow</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('workflow.index') }}">All workflow</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Workflow</li>
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
                        {{ isset($workflow) ? __('Update workflow') : __('Add workflow') }}
                    </h4>
                </div>
            </div>
            <form action="{{ isset($workflow) ? route('workflow.update', $workflow->id) : route('workflow.store') }}" method="post">
                @csrf

                @isset($workflow)
                    @method('patch')
                @endisset

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">TASK NO</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="work_no"
                            name="work_no"
                            class="form-control
                            @error('work_no') is-invalid @enderror"
                            type="text"
                            required
                            @isset($workflow)
                                value="{{ $workflow->work_no }}"
                            @endisset/>
                            @error('work_no')
                            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">TASK</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="work_name"
                            name="work_name"
                            class="form-control
                            @error('work_name') is-invalid @enderror"
                            type="text"
                            required
                            @isset($workflow)
                                value="{{ $workflow->work_name }}"
                            @endisset/>
                        @error('work_name')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">LINK</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                        id="link"
                        name="link"
                        class="form-control
                        @error('link') is-invalid @enderror"
                        type="text"
                        required
                        @isset($workflow)
                            value="{{ $workflow->link }}"
                        @endisset/>
                        @error('link')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-primary ml-5 float-right">
                        {{ isset($workflow) ? __('save changes') : __('submit') }}
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
