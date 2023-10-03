@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <div class="container-fluid">

   <h1>This is admin</h1>

</div> --}}
    <style>
        /* You can use nth-child(1), nth-child(2), etc., to target specific columns */
        /* For this example, let's adjust the width of the first and second columns */
        td:nth-child(1) {
        width: 80px;
        }
        td:nth-child(2) {  
        width: 300px; 
        }
        td:nth-child(3) {
        width: 350px;
        }
        td:nth-child(4) {
        width: 350px;
        }
        td:nth-child(5) {
        width: 100px;
        }
        td:nth-child(6) {
        width: 50px;
        }
        td:nth-child(6) {
        width: 50px;
        }
    </style>
<div class="container-fluid">

    <!-- start page title -->
    {{-- <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
        </div>
    </div> --}}
    <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                {{-- <h4 class="card-title">Default Datatable</h4>
                                <p class="card-title-desc">DataTables has most features enabled by
                                    default, so all you need to do to use it with your own tables is to call
                                    the construction function: <code>$().DataTable();</code>.
                                </p> --}}

                                {{-- <td><button  class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $establishmentDetail->id }}">Action</button></td> --}}
                                <div class="d-flex flex-row-reverse">
                                <button class="btn btn-info mb-3"  data-bs-toggle="modal" data-bs-target="#myModal">Create Documents</button>
                                    
                                </div>
                               
                                <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title secondary">Action</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                                                {{-- @method('PATCH') --}}
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <div class="mb-4">
                                                            <label class="form-label"><b>Type</b></label>
                                                            <select name="type" class="form-control" required="true"> 
                                                                    <option value="" selected="true" disabled>Select...</option>
                                                                    <option value="TUPAD Proposals & Requests">TUPAD Proposals & Requests</option>
                                                                    <option value="DILP Proposals & Requests">DILP Proposals & Requests</option>
                                                                    <option value="DOLE Job Applications/Vacancies">DOLE Job Applications/Vacancies</option>
                                                                    <option value="CSHP Request">CSHP Request</option>
                                                                    <option value="Employers' Administrative Reports (OSH)">Employers' Administrative Reports (OSH)</option>
                                                                    <option value="Request for Certificate of No Pending Case">Request for Certificate of No Pending Case</option>
                                                                    <option value="Invitation Letters - Training/Seminar/Symposium/Sales Event">Invitation Letters - Training/Seminar/Symposium/Sales Event</option>
                                                                    <option value="Request for DOLE Resource Speakers - Training/Seminar/Career">Request for DOLE Resource Speakers - Training/Seminar/Career</option>
                                                                    <option value="Guidance/Meetings">Guidance/Meetings</option>
                                                                    <option value="Employers' Notices - Retrenchment, Clearance, Bankruptcy, Termination, Resignation, Disciplinary Action">Employers' Notices - Retrenchment, Clearance, Bankruptcy, Termination, Resignation, Disciplinary Action</option>
                                                                    <option value="AEP Request">AEP Request</option>
                                                                    <option value="Registration of Contractors (DO - 174) Requests">Registration of Contractors (DO - 174) Requests</option>
                                                                    <option value="Request for Electrical & Mechanical Installation - Plans, Boiler,">Request for Electrical & Mechanical Installation - Plans, Boiler,</option>
                                                                    <option value="DOLE Policies AO, DO, LA, Memo, Transfer, Appointment, Reassignment">DOLE Policies AO, DO, LA, Memo, Transfer, Appointment, Reassignment</option>
                                                                    <option value="DOLE ADL - BWC, EMS">DOLE ADL - BWC, EMS</option>
                                                                    <option value="Solicitations - Medical, Financial">Solicitations - Medical, Financial</option>
                                                                    <option value="Complaints - Employees & Employers">Complaints - Employees & Employers</option>
                                                                    <option value="RWA Requests/Employees' Union on Association Submissions & Updates">RWA Requests/Employees' Union on Association Submissions & Updates</option>
                                                                    <option value="LBC Transmittal">LBC Transmittal</option>
                                                                    <option value="Records Disposal - From FOs, ORD, TSSD">Records Disposal - From FOs, ORD, TSSD</option>
                                                                    <option value="Collective Bargaining Agreements (CBA)">Collective Bargaining Agreements (CBA)</option>
                                                                    <option value="MALSU Compliance, Requests, & Received Letters/Suspection Compliance & Request">MALSU Compliance, Requests, & Received Letters/Suspection Compliance & Request</option>
                                                                    <option value="Referral to and Communications from NLRC, NCMB, RTWPB, COA">Referral to and Communications from NLRC, NCMB, RTWPB, COA</option>
                                                                    <option value="Request, Inquiries from other NGAs, LGUs, GOCCs">Request, Inquiries from other NGAs, LGUs, GOCCs</option>
                                                                    <option value="Memos from IMSD Head">Memos from IMSD Head</option>
                                                                    <option value="Memo/Letter Request from DOLE Central Office, Bureaus, Services for Reports, Information">Memo/Letter Request from DOLE Central Office, Bureaus, Services for Reports, Information</option>
                                                                    <option value="Request for Authority to Travel (RAT) of DOLE Employees">Request for Authority to Travel (RAT) of DOLE Employees</option>
                                                                    <option value="Letters/Communications Concerning GIPs, SPES & Contractual Employees">Letters/Communications Concerning GIPs, SPES & Contractual Employees</option>
                                                                    <option value="Letters from The Office of the Ombudsman and Sandiganbayan">Letters from The Office of the Ombudsman and Sandiganbayan</option>
                                                                    <option value="Report on Compliance with P.D. No. 851 (13th Month Pay)">Report on Compliance with P.D. No. 851 (13th Month Pay)</option>
                                                                    <option value="Inspection Requests from Different Agencies">Inspection Requests from Different Agencies</option>
                                                                    <option value="Various Information Materials">Various Information Materials</option>
                                                                    <option value="Certified True Copies">Certified True Copies</option>
                                                                    <option value="Others">Others</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="mb-4">
                                                            <label class="form-label">Origin</label>
                                                            <textarea name="origin" id="" class="form-control" required></textarea>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label">Subject</label>
                                                            <textarea name="subject" id="" cols="30" rows="5" class="form-control" required></textarea>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>CODE</th>
                                        <th>TYPE</th>
                                        <th>ORIGIN</th>
                                        <th>SUBJECT</th>
                                        <th>DATE</th>
                                        <th><i class=" ri-settings-2-line"></i></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($documents as $document)
                                    <tr>
                                        <td>{{ $document->document_code }}</td>
                                        <td>{{ $document->type }}</td>
                                        <td>{{ $document->origin }}</td>
                                        <td>{{ $document->subject}}</td>
                                        <td>{{ $document->created_at }}</td>
                                        <td><div class="d-flex justify-content-end"><a class="ri ri-printer-fill btn btn-warning" href="{{ route('document.pdf_view',$document->id ) }}" target="_blank" style="margin-right: 10px"> <a  class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $document->id }}">EDIT</a></div></td>
                                        <div class="modal" id="myModal-{{ $document->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title secondary">Document Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('document.updateEdit' ,$document->id) }}" method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <div class="mb-4">
                                                                    <label class="form-label"><b>Type</b></label>
                                                                        {{-- <input type="text" value="{{ $document->type }}" readonly class="form-control"> --}}
                                                                        <select name="type" class="form-control" required="true"> 
                                                                            <option value="" selected="true" disabled>Select...</option>
                                                                            <option value="TUPAD Proposals & Requests">TUPAD Proposals & Requests</option>
                                                                            <option value="DILP Proposals & Requests">DILP Proposals & Requests</option>
                                                                            <option value="DOLE Job Applications/Vacancies">DOLE Job Applications/Vacancies</option>
                                                                            <option value="CSHP Request">CSHP Request</option>
                                                                            <option value="Employers' Administrative Reports (OSH)">Employers' Administrative Reports (OSH)</option>
                                                                            <option value="Request for Certificate of No Pending Case">Request for Certificate of No Pending Case</option>
                                                                            <option value="Invitation Letters - Training/Seminar/Symposium/Sales Event">Invitation Letters - Training/Seminar/Symposium/Sales Event</option>
                                                                            <option value="Request for DOLE Resource Speakers - Training/Seminar/Career">Request for DOLE Resource Speakers - Training/Seminar/Career</option>
                                                                            <option value="Guidance/Meetings">Guidance/Meetings</option>
                                                                            <option value="Employers' Notices - Retrenchment, Clearance, Bankruptcy, Termination, Resignation, Disciplinary Action">Employers' Notices - Retrenchment, Clearance, Bankruptcy, Termination, Resignation, Disciplinary Action</option>
                                                                            <option value="AEP Request">AEP Request</option>
                                                                            <option value="Registration of Contractors (DO - 174) Requests">Registration of Contractors (DO - 174) Requests</option>
                                                                            <option value="Request for Electrical & Mechanical Installation - Plans, Boiler,">Request for Electrical & Mechanical Installation - Plans, Boiler,</option>
                                                                            <option value="DOLE Policies AO, DO, LA, Memo, Transfer, Appointment, Reassignment">DOLE Policies AO, DO, LA, Memo, Transfer, Appointment, Reassignment</option>
                                                                            <option value="DOLE ADL - BWC, EMS">DOLE ADL - BWC, EMS</option>
                                                                            <option value="Solicitations - Medical, Financial">Solicitations - Medical, Financial</option>
                                                                            <option value="Complaints - Employees & Employers">Complaints - Employees & Employers</option>
                                                                            <option value="RWA Requests/Employees' Union on Association Submissions & Updates">RWA Requests/Employees' Union on Association Submissions & Updates</option>
                                                                            <option value="LBC Transmittal">LBC Transmittal</option>
                                                                            <option value="Records Disposal - From FOs, ORD, TSSD">Records Disposal - From FOs, ORD, TSSD</option>
                                                                            <option value="Collective Bargaining Agreements (CBA)">Collective Bargaining Agreements (CBA)</option>
                                                                            <option value="MALSU Compliance, Requests, & Received Letters/Suspection Compliance & Request">MALSU Compliance, Requests, & Received Letters/Suspection Compliance & Request</option>
                                                                            <option value="Referral to and Communications from NLRC, NCMB, RTWPB, COA">Referral to and Communications from NLRC, NCMB, RTWPB, COA</option>
                                                                            <option value="Request, Inquiries from other NGAs, LGUs, GOCCs">Request, Inquiries from other NGAs, LGUs, GOCCs</option>
                                                                            <option value="Memos from IMSD Head">Memos from IMSD Head</option>
                                                                            <option value="Memo/Letter Request from DOLE Central Office, Bureaus, Services for Reports, Information">Memo/Letter Request from DOLE Central Office, Bureaus, Services for Reports, Information</option>
                                                                            <option value="Request for Authority to Travel (RAT) of DOLE Employees">Request for Authority to Travel (RAT) of DOLE Employees</option>
                                                                            <option value="Letters/Communications Concerning GIPs, SPES & Contractual Employees">Letters/Communications Concerning GIPs, SPES & Contractual Employees</option>
                                                                            <option value="Letters from The Office of the Ombudsman and Sandiganbayan">Letters from The Office of the Ombudsman and Sandiganbayan</option>
                                                                            <option value="Report on Compliance with P.D. No. 851 (13th Month Pay)">Report on Compliance with P.D. No. 851 (13th Month Pay)</option>
                                                                            <option value="Inspection Requests from Different Agencies">Inspection Requests from Different Agencies</option>
                                                                            <option value="Various Information Materials">Various Information Materials</option>
                                                                            <option value="Certified True Copies">Certified True Copies</option>
                                                                            <option value="Others">Others</option>
                                                                    </select>

                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Document Code</label>
                                                                    <input type="text" value="{{ $document->document_code }}" class="form-control" readonly>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Origin</label>
                                                                    <textarea id="" class="form-control" required name="origin">{{ $document->origin }}</textarea>
                                                                </div>
                                                                <div class="mb-4">
                                                                    <label class="form-label">Subject</label>
                                                                    <textarea id="" cols="30" rows="5" class="form-control"  required name="subject">{{ $document->subject }}</textarea>
                                                                </div>
                                                                <div class="mb-4">
                                                                    {{-- <input type="text" value="received" name="status" class="form-control" hidden> --}}
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr> 
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                {{-- @if (isset($latestId))
                    <input type="text" name="" id="getID" value="{{ $latestId }}">
                @endif --}}
                @if ($message = Session::get('success'))
                    <input type="text" name="getID" id="getID" value="{{ $message }}" hidden>
                @endif

</div> 
<script>

// $(document).ready(function () {
//      var id  = $("input[name=getID]").val();
//     console.log(id);
//     var url = "http://127.0.0.1:8000/document/pdf/"+ id; // Replace with your desired URL
//     window.open(url, "", "width=400,height=300");
// });
$(document).ready(function() {
            var id  = $("#getID").val();
            console.log(id);
            if(id){
                var url = "http://127.0.0.1:8000/document/pdf/"+ id; // Replace with your desired URL
            var windowName = '_blank';
            var windowFeatures = 'width=1000,height=800';

            // Open a new window when the document is ready
            window.open(url, windowName, windowFeatures);
            }

        });

</script>
@endsection
