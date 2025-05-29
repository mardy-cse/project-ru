@extends('dashboard')

@section('content')

<!-- Full height container -->
<div class="d-flex flex-column min-vh-100 bg-gradient-to-br from-slate-50 to-blue-50 p-4">
  <div class="container-fluid flex-grow-1">

    <!-- Main Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-200 mb-4">

      <!-- Card Header -->
      <div class="px-4 py-2 border-bottom" style="background-color: green; color: white;">
        <div class="d-flex align-items-center gap-2">
          <svg class="me-2" width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <h4 class="m-0">Batch Info</h4>
        </div>
      </div>

      <!-- Card Body -->
      <div class="row m-4 p-2 border" style="border-color: rgb(212, 210, 210);">
        <!-- Left Column -->
        <div class="col-md-6 mb-3">
          <div class="row mb-3">
            <div class="col-md-4"><strong>Training Name</strong></div>
            <div class="col-md-8">: App Development</div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4"><strong>Batch Name</strong></div>
            <div class="col-md-8">: ML Optimization</div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4"><strong>Start Date</strong></div>
            <div class="col-md-8">: May 26, 2025</div>
          </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-6 mb-3">
          <div class="row mb-3">
            <div class="col-md-4"><strong>Total Session</strong></div>
            <div class="col-md-8">: 1</div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4"><strong>End Date</strong></div>
            <div class="col-md-8">: May 27, 2025</div>
          </div>
          <div class="row mb-3">
            <div class="col-md-4"><strong>Status</strong></div>
            <div class="col-md-8">: Complete</div>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="m-4 p-2 d-flex justify-content-start border" style="background-color: aliceblue; border-color: rgb(212, 210, 210);">
        <a href="/batch/list" class="btn btn-secondary">✖ Close</a>
      </div>

    </div>
  </div>
</div>
@endsection
