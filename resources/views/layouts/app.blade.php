
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>DOLE - RO8 | Document Tracking System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- jquery.vectormap css -->
        <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- DataTables -->
        <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        
    </head>



    <body data-topbar="dark" data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-sm" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-dark" height="20">
                                </span>
                            </a>

                            <a href="#" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-sm-light" height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo-light" height="40"><span style="text-decoration: none; color: white; font-size: 1.2em; font-weight: bold; " >DOLE RO8</span>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                        <div class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <h3 class="form-control">Document Tracking System</h3>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">


                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/user-profile-icon-free-vector.jpg') }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{ Str::ucfirst(Auth::user()->first_name) }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="#"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </div>

                    </div>
                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{ asset('assets/images/dole-logo-removebg.png') }}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">{{ Str::ucfirst(Auth::user()->first_name) }} {{ strtoupper(substr(Auth::user()->middle_name,0,1)) }}. {{ ucfirst(Auth::user()->last_name) }}</h4>
                            <span class="text-muted">{{ strtoupper(Auth::user()->office_division) }}</span>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            {{-- <li>
                                <a href="index.html" class="waves-effect">
                                    <i class="ri-dashboard-line"></i>
                                    <span>DASHBOARD</span>
                                </a>
                            </li> --}}

                            {{-- @if (Auth::user()->is_admin == 1)
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="ri-mail-send-line"></i>
                                        <span>ALL DOCUMENTS</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('document.create', 'memorandum') }}">Memorandum</a></li>
                                        <li><a href="{{ route('document.create', 'office order') }}">Office Order</a></li>
                                        <li><a href="{{ route('document.create', 'others') }}">Others</a></li>
                                    </ul>
                                </li>
                            @endif --}}
                            
                            @if (Auth::user()->is_admin == 1)
                                <li>
                                    <a href="{{ route('document.create') }}" class=" waves-effect"><span class="badge bg-warning float-end"></span>
                                        <i class="ri-calendar-2-line"></i>
                                        <span>ALL DOCUMENTS</span>
                                    </a>
                                </li>
                            @endif
                           

                            <li>
                                <a href="{{ route('document.incoming') }}" class=" waves-effect"><span class="badge bg-warning float-end">{{  incomingTotal() }}</span>
                                    <i class="ri-calendar-2-line"></i>
                                    <span>INCOMING</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('document.received') }}" class=" waves-effect"><span class="badge bg-success float-end">{{ receivedTotal() }}</span>
                                    <i class="ri-calendar-2-line"></i>
                                    <span>RECEIVED</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('document.outgoing') }}" class=" waves-effect"><span class="badge bg-info float-end">{{ outgoingTotal() }}</span>
                                    <i class="ri-calendar-2-line"></i>
                                    <span>OUTGOING</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('document.rejected') }}" class=" waves-effect"><span class="badge bg-danger float-end">{{ rejectedTotal() }}</span>
                                    <i class="ri-calendar-2-line"></i>
                                    <span>REJECTED</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('document.receivedHistory') }}" class=" waves-effect"><span class="badge bg-success float-end"></span>
                                    <i class="ri-calendar-2-line"></i>
                                    <span>RECEIVED HISTORY</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('document.tracked') }}" class=" waves-effect">
                                    <i class="ri-calendar-2-line"></i>
                                    <span>TRACK DOCUMENTS</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    @yield('content')
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                2023 © DOLE-RO8.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by ICT Unit
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        @include('sweetalert::alert')

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>


        <!-- apexcharts -->
        {{-- <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

        <!-- jquery.vectormap map -->
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js') }}"></script>

         <!-- Required datatable js -->
         <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
         <!-- Buttons examples -->
         <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
         <script src="{{ asset('assets/libs/jszip/jszip.min.js') }}"></script>
         <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
         <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

         <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
         <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
         <!-- Datatable init js -->
         <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
         {{-- <script>
            $(document).ready( function () {
                $('#datatable-buttons').DataTable();
                } );
        </script> --}}

    </body>

</html>
