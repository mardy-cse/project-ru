@php
    use Illuminate\Support\Str;
@endphp

<table id="myTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Designation</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($speakers as $index => $speaker)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td title="{{ $speaker->name }}">{{ Str::limit($speaker->name, 20, '...') }}</td>
            <td title="{{ $speaker->email }}">{{ Str::limit($speaker->email, 50, '...') }}</td>
            <td>{{ $speaker->phone }}</td>
            <td title="{{ $speaker->designation }}">{{ Str::limit($speaker->designation, 50, '...') }}</td>
            <td>
                @if($speaker->status == 'active')
                    <span class="badge bg-success">Active</span>
                @elseif($speaker->status == 'deactive')
                    <span class="badge bg-warning">Deactive</span>
                @else
                    <span class="badge bg-warning">Pending</span>
                @endif
            </td>
            <td>
                <a class="btn btn-sm btn-primary me-1" title="Edit" href="{{ url('/speaker/' . $speaker->id . '/edit') }}">
                    <i class="fas fa-edit"></i> Edit
                </a>
                @if($speaker->status == 'active')
                    <a href="{{ url('/speaker/' . $speaker->id . '/toggle') }}" class="btn btn-sm btn-warning" title="Deactivate">
                        <i class="fas fa-ban"></i> Deactivate
                    </a>
                @else
                    <a href="{{ url('/speaker/' . $speaker->id . '/toggle') }}" class="btn btn-sm btn-success" title="Activate">
                        <i class="fas fa-check"></i> Activate
                    </a>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center text-danger">No speakers found</td>
        </tr>
        @endforelse
    </tbody>
</table>
