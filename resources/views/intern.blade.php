@extends('layouts.app')

@section('content')

<div class="card-box pd-20 height-100-p mb-30">
    <div class="row align-items-center">
        <div class="col-md-4">
            <img src="{{ asset('theme/vendors/images/banner-img.png') }}" alt="">
        </div>
        <div class="col-md-8">
            <h4 class="font-20 weight-500 mb-10 text-capitalize">
                Welcome back
                <div class="weight-600 font-30 text-blue">{{ auth()->user()->name }}!</div>
            </h4>
            <p class="font-18 max-width-600">Zummit Infolabs is a sui generis
                coalescence between the eccentric creativity
                of Generation Z and the discipline of experienced
                professionals that aims to deliver solutions which are quick and quintessential</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">

                <div class="widget-data">
                    <div class="h4 mb-0">{{ $deb_date }}</div>
                    <div class="weight-600 font-14">JOINING DATE</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="widget-data">
                    <div class="h4 mb-0">{{ $fin_date }}</div>
                    <div class="weight-600 font-14">ENDING DATE</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
            <div class="d-flex flex-wrap align-items-center">
                <div class="widget-data">
                    <div class="h4 mb-0">{{ $final_date }}</div>
                    <div class="weight-600 font-14">REMAINING DAYS</div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-xl-6 mb-30">

        <a href="{{ route('task.index') }}" class="btn btn-primary btn-block p-3">
            <h3 class="text-white">My Workflow</h3>
        </a>

    </div>

    <div class="col-xl-6 mb-30">

        <a href="http://" class="btn btn-primary btn-block p-3">
            <h3 class="text-white">My Learning Path</h3>
        </a>

    </div>



</div>

@endsection
