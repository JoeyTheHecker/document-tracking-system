@extends('layouts.app')

@section('content')
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
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
    width: 200px;
    }
    td:nth-child(5) {
    width: 100px;
    }
    td:nth-child(6) {
    width: 130px;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                                        <td>{{ $documentTracking->documentDetail->created_at }}</i></td>
                                        
                                        {{-- <td><button  class="ri ri-eye-fill btn btn-warning"  data-bs-toggle="modal" data-bs-target="#myModal-{{ $documentTracking->id }}"></button></td> --}}
                                            {{-- <div class="modal" id="myModal-{{ $documentTracking->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title secondary">Action</h5>
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
                                                                            <input type="text" value="{{ strtoupper($documentTracking->documentDetail->type) }}" readonly class="form-control">
                                                                    </div>
                                                                    <div class="mb-4">
                                                                        <label class="form-label">Document Code</label>
                                                                        <input type="text" value="{{ strtoupper($documentTracking->documentDetail->document_code) }}" class="form-control" readonly>
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
                                                                        <label class="form-label"><b>STATUS: </b></label>
                                                                        <select name="status" class="form-control" required="true" id="primary-select"> 
                                                                            <option value="" selected="true" disabled>Select...</option>
                                                                            <option value="incoming">Release</option>
                                                                            <option value="rejected">Reject</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-4" id="secondary-select-container" style="display: none;">
                                                                        <label class="form-label"><b>TO: </b></label>
                                                                        <select name="office_division" class="form-control">
                                                                            <option value="" selected="true" disabled>Select...</option>
                                                                            @php
                                                                                 $office_div = [ 'tssd' => 'tssd',
                                                                                                 'ord' => 'ord',
                                                                                                 'imsd' => 'imsd',
                                                                                                 'records office' => 'records office',];
 
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
                                                                    <button type="submit" class="btn btn-success">Save</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            
                                    <td><button type="button" class="ri ri-eye-fill btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $documentTracking->id }}"></button></td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal-{{ $documentTracking->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Document Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('document.update' ,$documentTracking->id) }}" method="POST" enctype="multipart/form-data">
                                                        @method('PATCH')
                                                            @csrf
                                                        <div class="modal-body">
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
                                                                    <label class="form-label"><b>STATUS: </b></label>
                                                                    <select name="status" class="form-control" required="true" id="primary-select"> 
                                                                        <option value="incoming">Release</option>
                                                                        <option value="rejected">Reject</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-4" id="secondary-select-container">
                                                                    <label class="form-label"><b>TO: </b></label>
                                                                    <select name="office_division" class="form-control" required id="mySelect">
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
    
                                                            {{-- <label for="primary-select">Primary Select:</label>
                                                            <select id="primary-select" class="form-control">
                                                                <option value="" selected="true" disabled>Select...</option>
                                                                <option value="show">Show</option>
                                                                <option value="hide">Hide</option>
                                                            </select> --}}
                                                
                                                        {{-- <div id="secondary-select-container" style="display: none;">
                                                            <label for="secondary-select">Secondary Select:</label>
                                                            <select id="secondary-select" class="form-control">
                                                            <option value="option1">Option 1</option>
                                                            <option value="option2">Option 2</option>
                                                            <option value="option3">Option 3</option>
                                                            </select>
                                                        </div> --}}
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save</button>
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
  // Event listener for changes in the primary select inside any modal with class 'modal'
  $(document).on('change', '.modal #primary-select', function() {
    var selectedValue = $(this).val();
    var secondarySelectContainer = $(this).closest('.modal').find('#secondary-select-container');
    var mySelect2 = $(this).closest('.modal').find('#mySelect');
    if (selectedValue === "rejected") {
      secondarySelectContainer.hide();
      mySelect2.prop('disabled', true);
    } else if (selectedValue === "incoming") {
      secondarySelectContainer.show();
      mySelect2.prop('disabled', false);
    }
  });
});
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
@endsection
