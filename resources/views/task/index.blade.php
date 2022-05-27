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
                    <li class="breadcrumb-item active" aria-current="page"> My Workflows</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
        <a href="{{ route('task.done') }}" class="btn btn-primary" rel="noopener noreferrer">Check completed tasks</a>
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


    </div>
    <div class="pb-20">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Task No</th>
                    <th>Task</th>
                    <th>Link</th>
                    <th>Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                    <tr>
                        <td>{{ $work->work_no }}</td>
                        <td>{{ $work->work_name }}</td>
                        <td>{{ $work->link }}</td>
                        <td>
                            <a href="{{ route('task.insert',$work->id) }}" class="btn btn-primary">
                                Click done</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
    </div>
</div>



@endsection
