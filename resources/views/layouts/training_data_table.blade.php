@php
    use Illuminate\Support\Str;
@endphp

<table id="myTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Created By</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
     <tbody>
    @php
        $dummyTrainings = [
            [
                'id' => 1,
                'name' => 'Laravel Basics',
                'created_by' => 'admin@example.com',
                'status' => 'active',
            ],
            [
                'id' => 2,
                'name' => 'Advanced PHP',
                'created_by' => 'trainer@example.com',
                'status' => 'pending',
            ],
            [
                'id' => 3,
                'name' => 'Database Optimization',
                'created_by' => 'john.doe@example.com',
                'status' => 'deactive',
            ],
        ];
    @endphp

    @foreach($dummyTrainings as $index => $training)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td title="{{ $training['name'] }}">{{ Str::limit($training['name'], 30, '...') }}</td>
            <td title="{{ $training['created_by'] }}">{{ Str::limit($training['created_by'], 40, '...') }}</td>
            <td>
                @if($training['status'] === 'active')
                    <span class="badge bg-success">Active</span>
                @elseif($training['status'] === 'deactive')
                    <span class="badge bg-warning">Deactive</span>
                @else
                    <span class="badge bg-secondary">Pending</span>
                @endif
            </td>
            <td>
                <a class="btn btn-sm btn-primary me-1" title="Edit" href="{{ url('/training/' . $training['id'] . '/edit') }}">
                    <i class="fas fa-edit"></i> Edit
                </a>
                @if($training['status'] === 'active')
                    <a href="{{ url('/training/' . $training['id'] . '/toggle') }}" class="btn btn-sm btn-warning" title="Deactivate">
                        <i class="fas fa-ban"></i> Deactivate
                    </a>
                @else
                    <a href="{{ url('/training/' . $training['id'] . '/toggle') }}" class="btn btn-sm btn-success" title="Activate">
                        <i class="fas fa-check"></i> Activate
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
</tbody>

</table>
