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
            <th>End Date</th>
            <th>Time</th>
            <th>Total Sessions</th>
            <th>Venue</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

     @foreach ($batch as $index => $batch)

        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $categories[$batch->training_id] ?? 'N/A' }}</td>
            <td>{{ $batch->name }}</td>
            <td>{{ \Carbon\Carbon::parse($batch->start_date)->format('Y-m-d') }}</td>
            <td>{{ \Carbon\Carbon::parse($batch->end_date)->format('Y-m-d') }}</td>
            <td>{{ \Carbon\Carbon::parse($batch->start_time)->format('g:i A') }} - {{ \Carbon\Carbon::parse($batch->end_time)->format('g:i A') }}</td>
            <td>{{ $batch->number_of_sessions }}</td>
            <td>{{ $batch->venue }}</td>
            <td>
    @if ($batch->publication_status == 1)
        <span class="text-green-600">Published</span>
    @else
        <span class="text-gray-500">Unpublished</span>
    @endif
</td>

             <td>
                 <a class="btn btn-sm btn-info me-1" title="Open" href="{{ url('/batch/' . $batch->id . '/open') }}">
                   <i class="fas fa-eye"></i> Open
                </a>
                <a class="btn btn-sm btn-primary me-1" title="Edit" href="{{ url('/batch/' . $batch->id . '/edit') }}">
                    <i class="fas fa-edit"></i> Edit
                </a>
                @if($batch->publication_status == '1')
                    <a href="{{ url('/batch/' . $batch->id . '/togglePublishStatus') }}" class="btn btn-sm btn-warning" title="Deactivate">
                        <i class="fas fa-ban"></i> Unpublished
                    </a>
                @else
                    <a href="{{ url('/batch/' . $batch->id . '/togglePublishStatus') }}" class="btn btn-sm btn-success" title="Activate">
                        <i class="fas fa-check"></i> Published
                    </a>
                @endif
            </td>

        </tr>
    @endforeach
    <tbody>
   
</tbody>

</table>
