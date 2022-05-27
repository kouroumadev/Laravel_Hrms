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
                    <li class="breadcrumb-item active" aria-current="page"> All Interview</li>
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
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <a href="{{ route('interview.create') }}" class="btn btn-primary float-right">
                            Add new Interview
                        </a>
                    </div>
                </div>
    </div>
    <div class="pb-20">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">date</th>
                    <th scope="col" class="text-center">candidate</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($interviews as $inter)
                <tr>
                 <td scope="row" class="text-center">{{ $inter->name }}</td>
                 <td class="text-center">{{ $inter->date }}</td>
                 <td class="text-center">{{ $inter->candidate }}</td>
                 <td class="text-center">
                     <div class="dropdown">
                         <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                             <i class="dw dw-more"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                             <a class="dropdown-item" href="{{ route('interview.edit', $inter->id ) }}"><i class="dw dw-edit2"></i> Edit</a>
                             <button type="submit" class="dropdown-item" href="{{ route('interview.destroy',$inter->id ) }}"
                                     onclick="event.preventDefault();
                                     document.getElementById('inter-form.{{ $inter->id }}').submit();">
                                     <i class="dw dw-delete-3"></i> Delete</button>

                                 <form id="inter-form.{{ $inter->id }}" action="{{ route('interview.destroy',$inter->id ) }}" method="POST" class="d-none">
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

        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable();
            } );
        </script>
    </div>
</div>


@endsection
