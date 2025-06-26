@extends('dashboard')

@section('content')

<!-- DataTables CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

{{-- Success/Error Messages --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="container-fluid mt-4">
    <!-- Border Wrapper for Both Sections -->
    <div class="border border-success rounded w-100">
        
        <!-- Green Background Heading -->
        <div class="text-white p-3 rounded-top mb-0" style="background-color: green; color: white;">
            <h1 class="h4 mb-0">
                <i class="fas fa-users me-2"></i>
                Attendance Management
            </h1>
        </div>

        <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
            @csrf
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
                        <input type="text" 
                               value="{{ \Carbon\Carbon::parse($attendance->session_date)->format('d-M-Y') }}" 
                               disabled 
                               class="form-control bg-light"/>
                        <span class="input-group-text bg-light">
                            <i class="fas fa-calendar"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Training Title Row -->
            <div class="row align-items-center mb-3 ps-5">
                <div class="col-md-2">
                    <label for="training_title" class="form-label fw-bold mb-0">
                        Training Title: <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" 
                               id="training_title" 
                               name="training_title" 
                               class="form-control bg-light" 
                               value="{{ $attendance->training->name ?? '' }}" 
                               disabled>
                        <span class="input-group-text bg-light">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Batch Row -->
            <div class="row align-items-center mb-3 ps-5">
                <div class="col-md-2">
                    <label for="batch" class="form-label fw-bold mb-0">
                        Batch: <span class="text-danger">*</span>
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" 
                               id="batch" 
                               name="batch" 
                               class="form-control bg-light" 
                               value="{{ $attendance->batch->name ?? '' }}" 
                               disabled>
                        <span class="input-group-text bg-light">
                            <i class="fas fa-layer-group"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Participants Count -->
            <div class="row align-items-center mb-3 ps-5">
                <div class="col-md-2">
                    <label class="form-label fw-bold mb-0">Total Participants:</label>
                </div>
                <div class="col-md-6">
                    <span class="badge bg-info fs-6">{{ $participants->count() }} Participants</span>
                </div>
            </div>

            <br>

            @include('attendance.list_of_participants')
            
            <div class="m-4 p-2 d-flex justify-content-between border bg-light border-light">
                <a href="/attendance/list" class="btn btn-secondary">
                    <i class="fas fa-times me-1"></i> Close
                </a>

                <div>
                    <button type="button" 
                            onclick="markAllPresent()" 
                            class="btn btn-success me-2">
                        <i class="fas fa-check-double me-1"></i>
                        Present All
                    </button>
                    
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>
                        Save Attendance
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- DataTables JavaScript -->
<script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

<script>
    // Initialize DataTable
    $(document).ready(function() {
        $('#participantsTable').DataTable({
            "pageLength": 25,
            "order": [[1, "asc"]]
        });
    });

    // Mark all participants as present
    function markAllPresent() {
        const presentRadios = document.querySelectorAll('input[type="radio"][value="present"]');
        presentRadios.forEach(radio => {
            radio.checked = true;
        });
    }

    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            alert.style.transition = 'opacity 0.5s ease-out';
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.remove();
            }, 500);
        });
    }, 5000);
</script>

@endsection
    <a href="#" class="btn btn-success">Save</a>
  </div>
</div>


@endsection