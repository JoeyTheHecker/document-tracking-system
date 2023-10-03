@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
    width: 130px;
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





                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>CODE</th>
                                        <th>TYPE</th>
                                        <th>ORIGIN</th>
                                        <th>SUBJECT</th>
                                        <th>DATE/TIME</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($documentTrackings as $documentTracking)
                                    <tr>
                                        <td>{{ $documentTracking->documentDetail->document_code }}</td>
                                        <td>{{ $documentTracking->documentDetail->type }}</td>
                                        <td>{{ $documentTracking->documentDetail->origin }}</td>
                                        <td>{{ $documentTracking->documentDetail->subject }}</td>
                                        <td>{{ $documentTracking->documentDetail->created_at }}</i></td>
                                        <td><button  class="ri ri-eye-fill btn btn-warning"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $documentTracking->id }}"></button></td>
                                            <div class="modal" id="myModal-{{ $documentTracking->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title secondary">Document Details</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <form action="{{ route('document.update' ,$documentTracking->id) }}" method="POST" enctype="multipart/form-data">
                                                            @method('PATCH')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <!-- Modal Body -->
                                                               <div class="mb-3">
                                                                   <div class="mb-4">
                                                                       <label class="form-label"><b>Type</b></label>
                                                                           <input type="text" value="{{ $documentTracking->documentDetail->type }}" readonly class="form-control">
                                                                   </div>
                                                                   <div class="mb-4">
                                                                       <label class="form-label">Document Code</label>
                                                                       <input type="text" value="{{ $documentTracking->documentDetail->document_code }}" class="form-control" readonly>
                                                                   </div>
                                                                   <div class="mb-4">
                                                                       <label class="form-label">Origin</label>
                                                                       <textarea id="" class="form-control" required readonly>{{ $documentTracking->documentDetail->origin }}</textarea>
                                                                   </div>
                                                                   <div class="mb-4">
                                                                       <label class="form-label">Subject</label>
                                                                       <textarea name="" id="" cols="30" rows="5" class="form-control"  required readonly>{{ $documentTracking->documentDetail->subject }}</textarea>
                                                                   </div>
                                                                   <div class="mb-4">
                                                                        <input type="text" value="incoming" name="status" class="form-control" hidden>
                                                                   </div>
                                                                   <div class="mb-4">
                                                                       <label class="form-label"><b>TO: </b></label>
                                                                       <select name="office_division" class="form-control">
                                                                           <option value="" selected="true" disabled>Select...</option>
                                                                           @php
                                                                                $office_div = [ 'imsd' => 'imsd',
                                                                                             'ard' => 'ard',
                                                                                             'tssd' => 'tssd',
                                                                                             'ord' => 'ord',
                                                                                             'records unit' => 'records unit',
                                                                                             'malsu' => 'malsu',
                                                                                             'ict unit' => 'ict unit',
                                                                                             'hr unit' => 'hr unit',
                                                                                             'budget unit' => 'budget unit',
                                                                                             'supply unit' => 'supply unit',];

                                                                                 $results = array_filter($office_div, function ($value) {
                                                                                    return $value != Auth::user()->office_division;
                                                                                 });
                                                                           @endphp

                                                                           @foreach ($results as  $value => $label)
                                                                           <option value="{{ $value }}">{{ strtoupper($label) }}</option>
                                                                           @endforeach
                                                                       </select>
                                                                   </div>
                                                               </div>
                                                               </div>
                                                               <div class="modal-footer">
                                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                   <button type="submit" class="btn btn-success">Release</button>
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
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

</div>
<script>
    $(document).ready(function() {
     // Disable and hide the hidden select when the page loads
     $('#hiddenSelectGroup').hide();
     $('#hiddenSelect').prop('disabled', true);

     // Show/hide and enable/disable the hidden select based on the selected value of enableDisableSelect
     $('#enableDisableSelect').change(function() {
       var selectedValue = $(this).val();
       
       if (selectedValue === 'incoming') {
         $('#hiddenSelectGroup').show();
         $('#hiddenSelect').prop('disabled', false);
       } else if (selectedValue === 'rejected') {
         $('#hiddenSelectGroup').hide();
         $('#hiddenSelect').prop('disabled', true);
       }
     });
   });

</script>
@endsection
