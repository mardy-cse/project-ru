@extends('dashboard')

@section('content')

<!-- DataTables CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Batch Information Card -->
        <div class="col-md-4">
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        Batch Information
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Training:</strong><br>
                        <span class="text-muted">{{ $batch->training->name ?? 'N/A' }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Batch:</strong><br>
                        <span class="text-muted">{{ $batch->name ?? 'N/A' }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Duration:</strong><br>
                        <span class="text-muted">
                            {{ \Carbon\Carbon::parse($batch->start_date)->format('d-M-Y') }} to 
                            {{ \Carbon\Carbon::parse($batch->end_date)->format('d-M-Y') }}
                        </span>
                    </div>
                    <div class="mb-3">
                        <strong>Venue:</strong><br>
                        <span class="text-muted">{{ $batch->venue ?? 'N/A' }}</span>
                    </div>
                    <div class="mb-3">
                        <strong>Total Participants:</strong><br>
                        <span class="badge bg-info">{{ $batch->trainingParticipants->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance Statistics -->
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="fas fa-chart-bar me-2"></i>
                        Attendance Statistics
                    </h5>
                </div>
                <div class="card-body">
                    @php
                        $totalParticipants = $batch->trainingParticipants->count();
                        $presentCount = $batch->trainingParticipants->where('status', 1)->count();
                        $absentCount = $totalParticipants - $presentCount;
                        $attendancePercentage = $totalParticipants > 0 ? round(($presentCount / $totalParticipants) * 100, 2) : 0;
                    @endphp

                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h4>{{ $totalParticipants }}</h4>
                                    <p class="mb-0">Total</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h4>{{ $presentCount }}</h4>
                                    <p class="mb-0">Present</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h4>{{ $absentCount }}</h4>
                                    <p class="mb-0">Absent</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h4>{{ $attendancePercentage }}%</h4>
                                    <p class="mb-0">Attendance</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="mt-4">
                        <div class="d-flex justify-content-between">
                            <span>Attendance Rate</span>
                            <span>{{ $attendancePercentage }}%</span>
                        </div>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar 
                                @if($attendancePercentage >= 80) bg-success 
                                @elseif($attendancePercentage >= 60) bg-warning 
                                @else bg-danger 
                                @endif" 
                                role="progressbar" 
                                style="width: {{ $attendancePercentage }}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Participants List -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-success">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fas fa-users me-2"></i>
                        Participants Attendance Report
                    </h5>
                    <button onclick="window.print()" class="btn btn-light btn-sm">
                        <i class="fas fa-print me-1"></i>
                        Print Report
                    </button>
                </div>
                <div class="card-body">
                    @if($batch->trainingParticipants->count() > 0)
                        <div class="table-responsive">
                            <table id="reportTable" class="display table table-striped" style="width:100%">
                                <thead class="table-dark">
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Organization</th>
                                        <th>Designation</th>
                                        <th>Status</th>
                                        <th>Enrollment Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($batch->trainingParticipants as $index => $participant)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $participant->name ?? 'N/A' }}</td>
                                        <td>{{ $participant->email ?? 'N/A' }}</td>
                                        <td>{{ $participant->mobile ?? 'N/A' }}</td>
                                        <td>{{ $participant->organization ?? 'N/A' }}</td>
                                        <td>{{ $participant->designation ?? 'N/A' }}</td>
                                        <td>
                                            @if($participant->status)
                                                <span class="badge bg-success">
                                                    <i class="fas fa-check me-1"></i>Present
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    <i class="fas fa-times me-1"></i>Absent
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $participant->created_at ? $participant->created_at->format('d-M-Y') : 'N/A' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-user-slash text-muted" style="font-size: 4rem;"></i>
                            <h5 class="text-muted mt-3">No participants found</h5>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mt-4 mb-4">
        <div class="col-12 text-center">
            <a href="{{ route('attendance.details', $batch->id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-1"></i>
                Manage Attendance
            </a>
            <a href="/attendance/list" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>
                Back to Attendance List
            </a>
        </div>
    </div>
</div>

<!-- DataTables JavaScript -->
<script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#reportTable').DataTable({
            "pageLength": 25,
            "order": [[1, "asc"]],
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>

<style>
    @media print {
        .btn, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_paginate {
            display: none !important;
        }
    }
</style>

@endsection
