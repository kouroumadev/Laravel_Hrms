@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Projects</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('project.index') }}">All Projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Project</li>
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
                        {{ isset($project) ? __('Update project') : __('Add project') }}
                    </h4>
                </div>
            </div>
            <form action="{{ isset($project) ? route('project.update', $project->id) : route('project.store') }}" method="post">
                @csrf

                @isset($project)
                    @method('patch')
                @endisset

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">PROJECT NAME</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="name"
                            name="name"
                            class="form-control
                            @error('name') is-invalid @enderror"
                            type="text"
                            required
                            @isset($project)
                                value="{{ $project->name }}"
                            @endisset/>
                            @error('name')
                            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">DESCRIPTION</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="desc"
                            name="desc"
                            class="form-control
                            @error('desc') is-invalid @enderror"
                            type="text"
                            required
                            @isset($project)
                                value="{{ $project->desc }}"
                            @endisset/>
                        @error('desc')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">PROJECT CLIENT</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                        id="client"
                        name="client"
                        class="form-control
                        @error('client') is-invalid @enderror"
                        type="text"
                        required
                        @isset($project)
                            value="{{ $project->client }}"
                        @endisset/>
                        @error('client')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-primary ml-5 float-right">
                        {{ isset($project) ? __('save changes') : __('submit') }}
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
