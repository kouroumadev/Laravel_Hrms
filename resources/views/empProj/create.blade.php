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
                    <li class="breadcrumb-item"><a href="{{ route('empProj.index') }}">All Employees projects</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Employee project</li>
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
                        {{ isset($empProj) ? __('Update Employee Projects') : __('Add Employee Projects') }}
                    </h4>
                </div>
            </div>
            <form action="{{ isset($empProj) ? route('empProj.update', $empProj->id) : route('empProj.store') }}" method="post">
                @csrf

                @isset($empProj)
                    @method('patch')
                @endisset

                <div class="form-group row">

                    <label class="col-sm-12 col-md-4 col-form-label">Employee</label>
                    <div class="col-sm-12 col-md-8">
                        <select name="user_id" class="form-control selectpicker" title="Select Employee" required>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" data-subtext="{{ $user->country}}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group row">

                    <label class="col-sm-12 col-md-4 col-form-label">Project</label>
                    <div class="col-sm-12 col-md-8">
                        <select name="project_id" class="form-control selectpicker" title="Select project" required>
                            @foreach ($projects as $project)
                            <option value="{{ $project->id }}" data-subtext="{{ $project->desc}}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>


                <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-primary ml-5 float-right">
                        {{ isset($empProj) ? __('save changes') : __('submit') }}
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
