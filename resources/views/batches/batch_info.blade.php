@extends('dashboard')

@section('content')

<!-- Full height container -->
<div class="d-flex flex-column min-vh-100 bg-gradient-to-br from-slate-50 to-blue-50 p-4">
  <div class="container-fluid flex-grow-1">

    <!-- Main Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 mb-4" >

      <!-- Card Header -->
      <div class="px-4 py-2 border-bottom bg-success text-white">
        <div class="d-flex align-items-center gap-2">
          <svg class="me-2" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <h4 class="m-0">Batch Info</h4>
        </div>
      </div>

      <!-- Card Body -->

      <div class="row m-4 p-2 border border-light">
        <!-- Left Column -->
        <div class="col-md-6 mb-3">
          @php
            $leftFields = [
              'Training Name' => $batch->training->name,
              'Batch Name' => $batch->name,
              'Start Date' => $batch->start_date->format('Y-m-d')
            ];
          @endphp
          
          @foreach($leftFields as $label => $value)
            <div class="row mb-3">
              <div class="col-md-4"><strong>{{ $label }}</strong></div>
              <div class="col-md-8">: {{ $value }}</div>
            </div>
          @endforeach
        </div>

        <!-- Right Column -->
        <div class="col-md-6 mb-3">
          @php
            $statusLabels = [1 => 'On Going', 0 => 'Completed'];
            $rightFields = [
              'Total Session' => $batch->number_of_sessions,
              'End Date' => $batch->end_date->format('Y-m-d'),
              'Status' => $statusLabels[$batch->batch_status] ?? 'N/A'
            ];
          @endphp
          
          @foreach($rightFields as $label => $value)
            <div class="row mb-3">
              <div class="col-md-4"><strong>{{ $label }}</strong></div>
              <div class="col-md-8">: {{ $value }}</div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="m-4 p-2 d-flex justify-content-start border bg-light border-light">
        <a href="/batch/list" class="btn btn-secondary">✖ Close</a>
      </div>

    </div>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 mb-4" >

      <!-- Card Header -->
      <div class="px-4 py-2 border-bottom bg-success text-white">
        <div class="d-flex align-items-center gap-2">
          <svg class="me-2" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <h4 class="m-0">Participant List</h4>
        </div>
      </div>

      <div class="overflow-x-auto p-6">
              @include('batches.participant_list_data_table');
      </div>


      <!-- Action Buttons -->
    <div class="m-4 p-2 d-flex justify-content-between border bg-light border-light">
  <a href="{{ url('/batch/list') }}" class="btn btn-secondary">✖ Close</a>


  <div>
    <a href="{{ url('/participant/approve-all/' . $batch->id) }}" 
   class="btn btn-success">
   Approve All
</a>
    <a href="{{ URL::previous() }}" class="btn btn-success">Save</a>
  </div>
</div>



    </div>
  </div>
</div>
@endsection
