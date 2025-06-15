    @php 
    use Illuminate\Support\Str; 
    @endphp

  <table id="myTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>SN</th>
            <th>Training Name</th>
            <th>Batch Name</th>
            <th>Session Date</th>
            <th>Venue Name</th>
            <th>Session Day</th>
            <th>Start Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($attendances as $index => $attendance)
        <tr>
            <td>{{ $index + 1 }}</td>




            <td title="{{ $attendance->training->name ?? 'N/A' }}">
                {{ Str::limit($attendance->training->name ?? 'N/A', 30, '...') }}
            </td>
            <td title="{{ $attendance->batch->name ?? 'N/A' }}">
                {{ Str::limit($attendance->batch->name ?? 'N/A', 40, '...') }}
            </td>
            <td>{{ $attendance->session_date ? $attendance->session_date->format('Y-m-d') : 'N/A' }}</td>
            <td>{{ $attendance->batch->venue ?? 'N/A' }}</td>
            {{-- <td>{{ $attendance->session_day ?? 'N/A' }}</td> --}}
            <td>{{ $attendance->session_date ? \Carbon\Carbon::parse($attendance->session_date)->format('l') : 'N/A' }}</td>

            <td>{{ $attendance->batch->start_time ? $attendance->batch->start_time : 'N/A' }}</td>
            <td>

                @if($attendance->batch->batch_status == 1)
                    <span class="badge bg-success">On Going</span>
                @else
                    <span class="badge bg-danger">Completed</span>
                @endif
            </td>
            <td>
<a 
{{-- href="{{ url('/attendance/' . $attendance->id . '/edit') }}"  --}}
href="#" 
title="Open" 
style="text-decoration: none; color: rgb(13, 166, 226);">
    <i class="fas fa-folder"></i> Open
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
