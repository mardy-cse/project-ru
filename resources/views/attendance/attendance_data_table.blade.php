@php 
use Illuminate\Support\Str; 
@endphp

<table id="myTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>SN</th>
            <th>Training Name</th>
            <th>Batch Name</th>
            <th>Start Date</th>
            <th>Venue</th>
            <th>Total Participants</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attendances as $index => $attendance)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td title="{{ $attendance['training']->name ?? 'N/A' }}">
                {{ Str::limit($attendance['training']->name ?? 'N/A', 30, '...') }}
            </td>
            <td title="{{ $attendance['batch']->name ?? 'N/A' }}">
                {{ Str::limit($attendance['batch']->name ?? 'N/A', 40, '...') }}
            </td>
            <td>{{ $attendance['session_date'] ? \Carbon\Carbon::parse($attendance['session_date'])->format('d-M-Y') : 'N/A' }}</td>
            <td>{{ $attendance['batch']->venue ?? 'N/A' }}</td>
            <td>
                <span class="badge bg-info">{{ $attendance['participant_count'] ?? 0 }} Participants</span>
            </td>
            <td>
                @if($attendance['batch']->batch_status == 1)
                    <span class="badge bg-success">On Going</span>
                @elseif($attendance['batch']->batch_status == 0)
                    <span class="badge bg-danger">Completed</span>
                @else
                    <span class="badge bg-warning">Pending</span>
                @endif
            </td>
            <td>
                <a href="{{ route('attendance.details', $attendance['id']) }}" 
                   class="btn btn-sm btn-primary me-1" 
                   title="Manage Attendance">
                    <i class="fas fa-users"></i> Manage
                </a>
                <a href="{{ route('attendance.report', $attendance['id']) }}" 
                   class="btn btn-sm btn-info" 
                   title="View Report">
                    <i class="fas fa-chart-bar"></i> Report
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Custom DataTable Script for Attendance --}}
<script>
    $(document).ready(function () {
        // Destroy existing DataTable if it exists
        if ($.fn.DataTable.isDataTable('#myTable')) {
            $('#myTable').DataTable().destroy();
        }
    
        // Initialize with descending order
        $('#myTable').DataTable({
            "order": [[0, "desc"]], // Sort by SN column in descending order
            responsive: true,
            lengthChange: true,
            autoWidth: false,
            pageLength: 10
        });
    });
</script>
