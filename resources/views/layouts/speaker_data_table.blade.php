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
                <td>{{ $speaker->name }}</td>
                <td>{{ $speaker->email }}</td>
                <td>{{ $speaker->phone }}</td>
                <td>{{ $speaker->designation }}</td>
                <td>
                    @if($speaker->status == 'active')
                        <span class="badge bg-success">Active</span>
                    @elseif($speaker->status == 'inactive')
                        <span class="badge bg-danger">Inactive</span>
                    @else
                        <span class="badge bg-warning">Pending</span>
                    @endif
                </td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick="editSpeaker({{ $speaker->id }})" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    @if($speaker->status == 'active')
                        <a href="{{ url('/speaker/' . $speaker->id . '/toggle') }}" class="btn btn-sm btn-warning" title="Deactivate">
                            <i class="fas fa-ban"></i> Deactivate
                        </a>
                    @else
                        <a href="{{ url('/speaker/' . $speaker->id . '/toggle') }}" class="btn btn-sm btn-success" title="Deactivate">
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