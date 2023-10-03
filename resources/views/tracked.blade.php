
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


            
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content" style="margin-left: 10px">

                <div class="page-content">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js" integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    main {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #reader {
        width: 500px;
    }
    #result {
        text-align: center;
        font-size: 1.5rem;
    }
</style>
<div class="container-fluid">

    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Timeline</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                        <li class="breadcrumb-item active">Timeline</li>
                    </ol>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('web.find2') }}" method="GET">
                        <div class="col-xl-4">
                            <div class="mb-3" >
                                <label for="">Enter tracking number</label>
                                <div class="d-flex justify-content-start">
                                    <input type="text" class="form-control" name="query" placeholder="Search here....." value="">
                                    <button type="submit" id="my-button" class="btn btn-primary">Search</button>
                                </div>

                                {{-- <span class="text-danger">@error('query'){{ $message }} @enderror</span> --}}
                             </div>
                        </div>
                        <div id="reader" style="margin: auto;"></div>
                        <div name="result" id="result"></div>
                     </form>

                        
                        @if (isset($documentTraces))
                        <div style="margin-top: 25px;">
                            Type: <b>{{ $documentDetail->type }}</b>
                            <br>
                            Origin: <b>{{ $documentDetail->origin }}</b>
                            <br>
                            Subject: <b>{{ $documentDetail->subject }}</b>
                        </div>
                        <section id="cd-timeline" class="cd-container">
                            @foreach ($documentTraces as $documentTrace)
                                <div class="cd-timeline-block">
                                    <div class="cd-timeline-img cd-success">
                                        <i class="mdi mdi-adjust"></i>
                                    </div> <!-- cd-timeline-img -->
                                
                                    <div class="cd-timeline-content">
                                        <h3>{{ strtoupper($documentTrace->status) }}</h3>
                                        <p class="mb-0 text-muted font-14">at {{ strtoupper($documentTrace->user->office_division)  }}</p>
                                        <p class="mb-0 text-muted font-14">by  {{ Str::ucfirst($documentTrace->user->first_name) }} {{ strtoupper(substr($documentTrace->user->middle_name,0,1)) }}. {{ ucfirst($documentTrace->user->last_name) }}  </p>
                                        <span class="cd-date">{{ $documentTrace->created_at }}</span>
                                    </div> <!-- cd-timeline-content -->
                                </div> <!-- cd-timeline-block -->
                            @endforeach
                        
                        @endif

                        @if (isset($documentTracking))
                        @if ($documentTracking->status == "rejected")
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-danger">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>{{ strtoupper($documentTracking->status) }}</h3>
                                    <p class="m-b-20 text-muted font-14">at {{ strtoupper($documentTracking->user->office_division)  }}</p>
                                    <p class="mb-0 text-muted font-14">by  {{ Str::ucfirst($documentTracking->user->first_name) }} {{ strtoupper(substr($documentTracking->user->middle_name,0,1)) }}. {{ ucfirst($documentTracking->user->last_name) }}  </p>
                                    {{-- <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light m-t-5">See more detail</button> --}}
                                    <span class="cd-date">{{ $documentTracking->updated_at }}</span>
                                </div> <!-- cd-timeline-content --> 
                            </div> <!-- cd-timeline-block -->

                        @elseif ($documentTracking->status == "incoming")
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img cd-danger">
                                    <i class="mdi mdi-adjust"></i>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h3>{{ strtoupper($documentTracking->status) }}</h3>
                                    <p class="m-b-20 text-muted font-14">at {{ strtoupper($documentTracking->office_division)  }}</p>
                                    {{-- <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light m-t-5">See more detail</button> --}}
                                    <span class="cd-date">{{ $documentTracking->updated_at }}</span>
                                </div> <!-- cd-timeline-content --> 
                            </div> <!-- cd-timeline-block -->
                        @endif 
                    @endif
                    </section> <!-- cd-timeline -->
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container-fluid -->
<script>
    const scanner = new Html5QrcodeScanner('reader', {
        // Scanner will be initialized in DOM inside element with id of 'reader'
        qrbox: {
            width: 250,
            height: 250,
        },  // Sets dimensions of scanning box (set relative to reader element width)
        fps: 20, // Frames per second to attempt a scan
    });


    scanner.render(success, error);
    // Starts scanner

    function success(result) {
        document.getElementById('result').innerHTML = `
        <h2>Success!</h2>
        <input name="query" type="text" value="${result}" hidden>
        `;
        // responsiveVoice.enableWindowClickHook();
        
        simulateClick();
        

        // <p><p value="${result}">${result}</p></p>
       
        // Prints result as a link inside result element
        // alert('Sucess!');
        // function tempAlert(msg,duration)
        // {
        // var el = document.createElement("div");
        // el.setAttribute("style","position:absolute;top:40%;left:20%;background-color:white;");
        // el.innerHTML = msg;
        // setTimeout(function(){
        // el.parentNode.removeChild(el);
        // },duration);
        // document.body.appendChild(el);
        // }
        // console.log('Success');
        // tempAlert("close",1000);
        
        
        scanner.clear();
        // Clears scanning instance

         // Call the function to trigger the click event automatically
        
        document.getElementById('reader').remove();
        // Removes reader element from DOM since no longer needed

    }

    function error(err) {
        // console.error(err);
        // Prints any errors to the console
    }

    // Get the element that you want to click
    const myElement = document.getElementById('my-button');

    // Define a function to simulate a click event
    function simulateClick() {
    const event = new MouseEvent('click', {
        view: window,
        bubbles: true,
        cancelable: true
    });
    myElement.dispatchEvent(event);
    }

</script>
                </div>
                <!-- End Page-content -->

                {{-- <footer class="footer">
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
                </footer> --}}

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
