@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Interview</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('interview.index') }}">All Interview</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Interview</li>
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
                        {{ isset($interview) ? __('Update Interview') : __('Add Interview') }}
                    </h4>
                </div>
            </div>
            <form action="{{ isset($interview) ? route('interview.update', $interview->id) : route('interview.store') }}" method="post">
                @csrf

                @isset($interview)
                    @method('patch')
                @endisset

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label"> NAME</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="name"
                            name="name"
                            class="form-control
                            @error('name') is-invalid @enderror"
                            type="text"
                            required
                            @isset($interview)
                                value="{{ $interview->name }}"
                            @endisset/>
                            @error('name')
                            <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">date</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                            id="date"
                            name="date"
                            class="form-control
                            @error('date') is-invalid @enderror"
                            type="date"
                            required
                            @isset($interview)
                                value="{{ $interview->date }}"
                            @endisset/>
                        @error('date')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-form-label">Candidate</label>
                    <div class="col-sm-12 col-md-8">
                        <input
                        id="candidate"
                        name="candidate"
                        class="form-control
                        @error('candidate') is-invalid @enderror"
                        type="text"
                        required
                        @isset($interview)
                            value="{{ $interview->candidate }}"
                        @endisset/>
                        @error('candidate')
                        <div class="alert alert-danger" role="alert"> {{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-primary ml-5 float-right">
                        {{ isset($interview) ? __('save changes') : __('submit') }}
                    </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




@endsection
