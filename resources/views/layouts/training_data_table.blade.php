

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
    @foreach($training as $index => $training)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td title="{{ $training->name }}">{{ Str::limit($training->name, 30, '...') }}</td>
            <td title="{{ $training->creator->name ?? 'Unknown' }}">
                {{ Str::limit($training->creator->name ?? 'Unknown', 40, '...') }}
            </td>
            <td>
                @if($training->status == 1)
                    <span class="badge bg-success">Active</span>
                @elseif($training->status == 0)
                    <span class="badge bg-warning">Deactive</span>
                @else
                    <span class="badge bg-secondary">Pending</span>
                @endif
            </td>
            <td>
                <a class="btn btn-sm btn-primary me-1" title="Edit" href="{{ url('/training/' . $training->id . '/edit') }}">
                    <i class="fas fa-edit"></i> Edit
                </a>
                @if($training->status == 1)
                    <a href="{{ url('/training/' . $training->id . '/toggle') }}" class="btn btn-sm btn-warning" title="Deactivate">
                        <i class="fas fa-ban"></i> Deactivate
                    </a>
                @else
                    <a href="{{ url('/training/' . $training->id . '/toggle') }}" class="btn btn-sm btn-success" title="Activate">
                        <i class="fas fa-check"></i> Activate
                    </a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
