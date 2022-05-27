@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Learning path</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('learning.index') }}">All Learning paths</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Learning path</li>
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
                        {{ isset($learning) ? __('Update learning path') : __('Add learning path') }}
                    </h4>
                </div>
            </div>
            <form action="{{ isset($learning) ? route('learning.update', $learning->id) : route('learning.store') }}" method="post">
                @csrf

                @isset($learning)
                    @method('patch')
                @endisset

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">Departments</label>
                    <div class="col-sm-12 col-md-8">
                        <select name="department_id" class="form-control selectpicker" title="Select department" required>
                            @foreach ($depts as $dept)
                            <option value="{{ $dept->id }}" data-subtext="{{ $dept->dept_desc}}">{{ $dept->dept_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">TASK NO</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="taskNo"
                            name="taskNo"
                            class="form-control
                            @error('taskNo') is-invalid @enderror"
                            type="text"
                            required
                            @isset($learning)
                                value="{{ $learning->taskNo }}"
                            @endisset/>
                        @error('taskNo')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">TASK</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                        id="task"
                        name="task"
                        class="form-control
                        @error('task') is-invalid @enderror"
                        type="text"
                        required
                        @isset($learning)
                            value="{{ $learning->task }}"
                        @endisset/>
                        @error('task')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">SOURCE CODE</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                        id="code"
                        name="code"
                        class="form-control
                        @error('code') is-invalid @enderror"
                        type="text"
                        required
                        @isset($learning)
                            value="{{ $learning->code }}"
                        @endisset/>
                        @error('code')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">VIDEO LINK</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                        id="link"
                        name="link"
                        class="form-control
                        @error('link') is-invalid @enderror"
                        type="text"
                        required
                        @isset($learning)
                            value="{{ $learning->link }}"
                        @endisset/>
                        @error('link')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-primary ml-5 float-right">
                        {{ isset($learning) ? __('save changes') : __('submit') }}
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
