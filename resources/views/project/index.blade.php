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
                    <li class="breadcrumb-item active" aria-current="page"> All Projects</li>
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
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('project.create') }}" class="btn btn-primary float-right">
                            Add new project
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('empProj.index') }}" class="btn btn-primary">
                            show employees by projects
                        </a>
                    </div>
                </div>


            </div>
            <div class="pb-20">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">project Name</th>
                            <th scope="col" class="text-center">Description</th>
                            <th scope="col" class="text-center">project client</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($projects as $proj)
                       <tr>
                        <td scope="row" class="text-center">{{ $proj->name }}</td>
                        <td class="text-center">{{ $proj->desc }}</td>
                        <td class="text-center">{{ $proj->client }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <i class="dw dw-more"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                    <a class="dropdown-item" href="{{ route('project.edit', $proj->id ) }}"><i class="dw dw-edit2"></i> Edit</a>
                                    <button type="submit" class="dropdown-item" href="{{ route('project.destroy',$proj->id ) }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('proj-form.{{ $proj->id }}').submit();">
                                            <i class="dw dw-delete-3"></i> Delete</button>

                                        <form id="proj-form.{{ $proj->id }}" action="{{ route('project.destroy',$proj->id ) }}" method="POST" class="d-none">
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
