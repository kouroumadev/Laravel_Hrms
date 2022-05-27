<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('theme/vendors/images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('theme/vendors/images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/vendors/images/favicon-16x16.png') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/core.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/src/plugins/jquery-steps/jquery.steps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme/vendors/styles/style.css') }}">


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jqc-1.12.4/dt-1.11.4/b-2.2.2/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.css"/>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jqc-1.12.4/dt-1.11.4/b-2.2.2/r-2.2.9/sc-2.0.5/sp-1.4.0/datatables.min.js"></script>





    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
            <div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
            <div class="header-search">

            </div>
        </div>
        <div class="header-right">
            <div class="dashboard-setting user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
                        <i class="dw dw-settings2"></i>
                    </a>
                </div>
            </div>
            <div class="user-notification">
                <div class="dropdown">
                    <a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
                        <i class="icon-copy dw dw-notification"></i>
                        <span class="badge notification-active"></span>
                    </a>

                </div>
            </div>
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
							<img src="{{ asset('storage/images/'. auth()->user()->image) }}" alt="">
						</span>
                        <span class="user-name">{{ auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{ route('user.show') }}"><i class="dw dw-user1"></i> Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            <i class="dw dw-logout-1"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="right-sidebar">
        <div class="sidebar-title">
            <h3 class="weight-600 font-16 text-blue">
                Layout Settings
                <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
            </h3>
            <div class="close-sidebar" data-toggle="right-sidebar-close">
                <i class="icon-copy ion-close-round"></i>
            </div>
        </div>
        <div class="right-sidebar-body customscroll">
            <div class="right-sidebar-body-content">
                <h4 class="weight-600 font-18 pb-10">Header Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
                </div>

                <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
                <div class="sidebar-btn-group pb-30 mb-10">
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
                    <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{route('home')}}">
                <img src="{{ asset('theme/Zummitlogo.png') }}" alt="" class="">


            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">

                    <li class="dropdown" @if (auth()->user()->user_type == 'Intern') hidden @endif>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Departements</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('department.index') }}">All Departments</a></li>
							<li><a href="{{ route('department.create') }}">Add Department</a></li>
							<li><a href="{{ route('department.showAll') }}">Employees Department</a></li>
						</ul>
					</li>

                    <li class="dropdown" @if (auth()->user()->user_type == 'Intern') hidden @endif>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit2"></span><span class="mtext">Users</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('user.index') }}">List of users</a></li>
							<li><a href="{{ route('register') }}">Add user</a></li>
						</ul>
					</li>

                    <li class="dropdown" @if (auth()->user()->user_type == 'Intern') hidden @endif>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Projects</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('project.index') }}">List of project</a></li>
							<li><a href="{{ route('project.create') }}">Add project</a></li>
							<li><a href="{{ route('empProj.index') }}">Employees project</a></li>
						</ul>
					</li>

                    <li class="dropdown" @if (auth()->user()->user_type == 'Intern') hidden @endif>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-apartment"></span><span class="mtext">Learning path</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('learning.index') }}">List of Learning</a></li>
							<li><a href="{{ route('learning.create') }}">Add Learning</a></li>

						</ul>
					</li>

                    <li class="dropdown" @if (auth()->user()->user_type == 'Intern') hidden @endif>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-invoice"></span><span class="mtext">Workflow</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('workflow.index') }}">List of workflow</a></li>
							<li><a href="{{ route('workflow.create') }}">Add workflow</a></li>

						</ul>
					</li>

                    <li class="dropdown" @if (auth()->user()->user_type == 'Admin') hidden @endif>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-invoice"></span><span class="mtext">Workflow</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('task.index') }}">My workflow</a></li>
							<li><a href="{{ route('task.done') }}">My Completed Tasks</a></li>

						</ul>
					</li>

                    <li class="dropdown" @if (auth()->user()->user_type == 'Admin') hidden @endif>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-bookmark2"></span><span class="mtext">Learning Path</span>
						</a>
						<ul class="submenu">
							<li><a href="#">All Learning paths</a></li>
							<li><a href="#">Add Learning path</a></li>

						</ul>
					</li>

                    <li class="dropdown" @if (auth()->user()->user_type == 'Intern') hidden @endif>
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-bookmark2"></span><span class="mtext">Interview</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ route('interview.index') }}">All Interviews</a></li>
							<li><a href="{{ route('interview.create') }}">Add Interview</a></li>

						</ul>
					</li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-toggle no-arrow"
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" >
                            <span class="micon dw dw-logout"></span><span class="mtext">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">
        <div class="pd-ltr-20">

            <!-- here content-->

           @yield('content')



        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            Zummit InfoLabs - By <a href="https://github.com/dropways" target="_blank">Abdoul Karim</a>
        </div>

    </div>
    <!-- js -->
    <script src="{{ asset('theme/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/datatables/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/dashboard.js') }}"></script>
    <script src="{{ asset('theme/src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ asset('theme/vendors/scripts/steps-setting.js') }}"></script>


    <script src="{{ asset('theme/src/plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
	<script src="{{ asset('theme/src/plugins/datatables/js/buttons.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('theme/src/plugins/datatables/js/buttons.print.min.js') }}"></script>
	<script src="{{ asset('theme/src/plugins/datatables/js/buttons.html5.min.js') }}"></script>
	<script src="{{ asset('theme/src/plugins/datatables/js/buttons.flash.min.js') }}"></script>
	<script src="{{ asset('theme/src/plugins/datatables/js/pdfmake.min.js') }}"></script>
	<script src="{{ asset('theme/src/plugins/datatables/js/vfs_fonts.js') }}"></script>




    <script src="{{ asset('theme/vendors/scripts/datatable-setting.js') }}"></script>
</body>

</html>
