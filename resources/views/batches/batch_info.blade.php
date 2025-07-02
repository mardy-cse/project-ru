@extends('dashboard')

@section('content')
<style>
  .info-card {
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    border-radius: 15px;
    border: 1px solid #dee2e6;
    margin-bottom: 2rem;
  }
  
  .info-row {
    padding: 0.75rem 0;
    border-bottom: 1px solid #f1f3f4;
    transition: background-color 0.2s ease;
  }
  
  .info-row:last-child {
    border-bottom: none;
  }
  
  .info-row:hover {
    background-color: rgba(0, 123, 255, 0.05);
    border-radius: 8px;
  }
  
  .info-label {
    font-weight: 600;
    color: #495057;
    font-size: 0.95rem;
  }
  
  .info-value {
    color: #212529;
    font-size: 0.95rem;
  }
  
  .section-title {
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    padding: 1rem 1.5rem;
    border-radius: 15px 15px 0 0;
    font-size: 1.1rem;
    font-weight: 600;
    border: none;
    margin: 0;
  }
  
  .status-badge {
    padding: 0.4rem 0.8rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
  }
  
  .status-ongoing {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }
  
  .status-completed {
    background-color: #d1ecf1;
    color: #0c5460;
    border: 1px solid #bee5eb;
  }
  
  .status-published {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
  }
  
  .status-unpublished {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
  }
</style>

<!-- Full height container -->
<div class="d-flex flex-column min-vh-100 bg-gradient-to-br from-slate-50 to-blue-50 p-4">
  <div class="container-fluid flex-grow-1">

    <!-- Main Batch Information Card -->
    <div class="info-card shadow-lg overflow-hidden mb-4">

      <!-- Card Header -->
      <div class="section-title">
        <div class="d-flex align-items-center gap-2">
          <i class="fas fa-info-circle me-2"></i>
          <h4 class="m-0">Batch Information</h4>
        </div>
      </div>

      <!-- Card Body -->

      <div class="row m-0 p-4">
        <!-- Left Column -->
        <div class="col-md-6">
          @php
            $leftFields = [
              'Training Name' => $batch->training->name ?? 'N/A',
              'Batch Name' => $batch->name,
              'Speaker Name' => $batch->speaker->name ?? 'N/A',
              'Start Date' => $batch->start_date ? $batch->start_date->format('M d, Y') : 'N/A',
              'End Date' => $batch->end_date ? $batch->end_date->format('M d, Y') : 'N/A',
              'Class Start Time' => $batch->start_time ? date('g:i A', strtotime($batch->start_time)) : 'N/A',
              'Class End Time' => $batch->end_time ? date('g:i A', strtotime($batch->end_time)) : 'N/A',
              'Class Duration' => $batch->class_duration ? $batch->class_duration . ' minutes' : 'N/A',
              'Seat Capacity' => $batch->seat_capacity ?? 'N/A'
            ];
          @endphp
          
          @foreach($leftFields as $label => $value)
            <div class="info-row row mx-2">
              <div class="col-5 info-label">{{ $label }}</div>
              <div class="col-7 info-value">: {{ $value }}</div>
            </div>
          @endforeach
        </div>

        <!-- Right Column -->
        <div class="col-md-6">
          @php
            $totalHours = floor(($batch->total_session_hours ?? 0));
            $totalMinutes = ($batch->total_session_minutes ?? 0);
            $totalDuration = $totalHours > 0 || $totalMinutes > 0 ? $totalHours . 'h ' . $totalMinutes . 'm' : 'N/A';
            
            $rightFields = [
              'Number of Sessions' => $batch->number_of_sessions ?? 'N/A',
              'Total Session Duration' => $totalDuration,
              'Enrollment Deadline' => $batch->enrollment_deadline ? $batch->enrollment_deadline->format('M d, Y') : 'N/A',
              'Expected Start Date' => $batch->expected_start_date ? $batch->expected_start_date->format('M d, Y') : 'N/A',
              'Venue' => $batch->venue ?? 'N/A',
              'Session Day' => $batch->session_day ?? 'N/A',
              'Visible Platform' => ucfirst($batch->visible_platform ?? 'N/A')
            ];
          @endphp
          
          @foreach($rightFields as $label => $value)
            <div class="info-row row mx-2">
              <div class="col-5 info-label">{{ $label }}</div>
              <div class="col-7 info-value">: {{ $value }}</div>
            </div>
          @endforeach
          
          <!-- Status fields with badges -->
          <div class="info-row row mx-2">
            <div class="col-5 info-label">Batch Status</div>
            <div class="col-7 info-value">: 
              @if($batch->batch_status == 1)
                <span class="status-badge status-ongoing">
                  <i class="fas fa-play-circle me-1"></i>On Going
                </span>
              @else
                <span class="status-badge status-completed">
                  <i class="fas fa-check-circle me-1"></i>Completed
                </span>
              @endif
            </div>
          </div>
          
          <div class="info-row row mx-2">
            <div class="col-5 info-label">Publication Status</div>
            <div class="col-7 info-value">: 
              @if($batch->publication_status == 1)
                <span class="status-badge status-published">
                  <i class="fas fa-eye me-1"></i>Published
                </span>
              @else
                <span class="status-badge status-unpublished">
                  <i class="fas fa-eye-slash me-1"></i>Unpublished
                </span>
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="px-4 py-3 bg-light border-top d-flex justify-content-start">
        <a href="/batch/list" class="btn btn-outline-secondary">
          <i class="fas fa-arrow-left me-2"></i>Back to Batch List
        </a>
      </div>

    </div>

    <!-- Participant List Card -->
    <div class="info-card shadow-lg overflow-hidden mb-4">

      <!-- Card Header -->
      <div class="section-title">
        <div class="d-flex align-items-center gap-2">
          <i class="fas fa-users me-2"></i>
          <h4 class="m-0">Participant List</h4>
          <span class="badge bg-light text-dark ms-2">
            {{ $batch->participants()->count() ?? 0 }} Participants
          </span>
        </div>
      </div>

      <div class="overflow-x-auto p-4">
              @include('batches.participant_list_data_table')
      </div>

      <!-- Action Buttons -->
      <div class="px-4 py-3 bg-light border-top d-flex justify-content-between">
        <a href="{{ url('/batch/list') }}" class="btn btn-outline-secondary">
          <i class="fas fa-arrow-left me-2"></i>Back to Batch List
        </a>

        <div class="d-flex gap-2">
          <a href="{{ url('/participant/approve-all/' . $batch->id) }}" 
             class="btn btn-success">
             <i class="fas fa-check-double me-2"></i>Approve All
          </a>
          <a href="{{ URL::previous() }}" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Save
          </a>
        </div>
      </div>
</div>



    </div>
  </div>
</div>
@endsection
