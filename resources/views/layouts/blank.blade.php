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
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="notification-list mx-h-350 customscroll">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="{{ asset('theme/vendors/images/img.jpg') }}" alt="">
                                        <h3>John Doe</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
                <img src="{{ asset('theme/vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
                <img src="{{ asset('theme/vendors/images/deskapp-logo-white.svg') }}" alt="" class="light-logo">
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">

                    <li>
                        <a href="{{ route('department.index') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-user-1"></span><span class="mtext">Departements</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('home.workflow') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-book-1"></span><span class="mtext">My Workflow</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('student.create') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-pencil-1"></span><span class="mtext">My Learning Path</span>
                        </a>
                    </li>


                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-toggle no-arrow">
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
        <div class="footer fixed-bottom pd-20 card-box text-center" style="margin-left: 281px;">
            KrupApp Developed By <a href="https://github.com/dropways" target="_blank">Abdoul Karim Kourouma</a>
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




    <script src="{{ asset('theme/vendors/scripts/datatable-setting.js') }}"></script>
</body>

</html>
