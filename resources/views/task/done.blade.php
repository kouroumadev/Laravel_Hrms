@extends('layouts.app')

@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Completed Tasks</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('task.index') }}">My Workflow</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Completed Tasks</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card-box mb-30">
    <div class="pd-20">
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
                    <th>Status</th>
                    <th>Comment</th>
                    <th>Link</th>
                    <th>Completed</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                    <tr>
                        <td>{{ DB::table('workflows')->where('id', $work->workflow_id)->value('work_no') }}</td>
                        <td>{{ DB::table('workflows')->where('id', $work->workflow_id)->value('work_name') }}</td>
                        <td>{{ _('Completed') }}</td>
                        <td>{{ _('Good job') }}! <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i></td>
                        <td>
                            <a href="{{ DB::table('workflows')->where('id', $work->workflow_id)->value('link') }}" class="btn btn-primary">
                               Link
                            </a>
                        </td>
                        <td>{{ $work->date }}</td>

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
