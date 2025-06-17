@extends('dashboard')


@section('content')

<!-- DataTables CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

<div class="container-fluid mt-4">
    <!-- Border Wrapper for Both Sections -->
    <div class="border border-success rounded w-100">
        
        <!-- Green Background Heading -->
        <div class="text-white p-3 rounded-top mb-0" style="background-color: green; color: white;">
            <h1 class="h4 mb-0">Attendance</h1>
        </div>

        <br>

        <!-- Date Row -->
<div class="row align-items-center mb-3 ps-5">
    <div class="col-md-2">
        <label for="session_date" class="form-label fw-bold mb-0">
            Date: <span class="text-danger">*</span>
        </label>
    </div>
    <div class="col-md-6">
        <div class="input-group">
            <input 
  type="text" 
  value="{{ \Carbon\Carbon::parse($attendance->session_date)->format('d-M-Y') }}" 
  disabled 
  class="form-control bg-light"/>

            <span class="input-group-text bg-light">
                <i class="fas fa-calendar"></i>
            </span>
        </div>
    </div>
</div>

<!-- Training Title Row with dropdown icon -->
<div class="row align-items-center mb-3 ps-5">
    <div class="col-md-2">
        <label for="training_title" class="form-label fw-bold mb-0">
            Training Title: <span class="text-danger">*</span>
        </label>
    </div>
    <div class="col-md-6">
        <div class="input-group">
            <input 
                type="text" 
                id="training_title" 
                name="training_title" 
                class="form-control bg-light" 
                value="{{ $attendance->training->name ?? '' }}" 
                disabled>
            <span class="input-group-text bg-light">
                <i class="fas fa-caret-down"></i>
            </span>
        </div>
    </div>
</div>


        <!-- Batch Row with dropdown icon -->
        <div class="row align-items-center mb-3 ps-5">
            <div class="col-md-2">
                <label for="batch" class="form-label fw-bold mb-0">
                    Batch: <span class="text-danger">*</span>
                </label>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" id="batch" name="batch" class="form-control bg-light" 
                    value="{{ $attendance->batch->name ?? '' }}" 
                    disabled>
                    <span class="input-group-text bg-light">
                        <i class="fas fa-caret-down"></i>
                    </span>
                </div>
            </div>
        </div>

        <br>

    </div>
</div>


@include('attendance.list_of_participants')
   <div class="m-4 p-2 d-flex justify-content-between border bg-light border-light">
  <a href="/attendance/list" class="btn btn-secondary">✖ Close</a>


  <div>
    <a href="#" 
   class="btn btn-success">
   Present All
</a>
    <a href="#" class="btn btn-success">Save</a>
  </div>
</div>


@endsection