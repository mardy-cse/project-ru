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
            <th>Profile Image</th>
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
            <td title="{{ $speaker->designation }}">{{ Str::limit($speaker->designation, 30, '...') }}</td>
            <td class="text-center">
                <div class="profile-image-container d-flex justify-content-center">
                    <div class="position-relative">
                        <img src="{{ $speaker->profile_image_url }}" 
                             alt="Profile" 
                             class="rounded-circle border border-2"
                             style="width: 50px; height: 50px; object-fit: cover; cursor: pointer; transition: all 0.3s ease;"
                             onclick="showImageModal('{{ $speaker->profile_image_url }}', '{{ addslashes($speaker->name) }}')"
                             onerror="this.src='https://via.placeholder.com/50x50/6c757d/ffffff?text={{ substr($speaker->name, 0, 1) }}'; this.style.backgroundColor='#667eea';"
                             title="Click to view full image">
                        
                        <!-- Add a small indicator for clickable image -->
                        <div class="position-absolute bottom-0 end-0 bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 16px; height: 16px; margin-bottom: -2px; margin-right: -2px; font-size: 8px; color: white;">
                            <i class="fas fa-expand-alt"></i>
                        </div>
                    </div>
                </div>
            </td>
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
            <td colspan="8" class="text-center text-danger py-4">
                <div class="d-flex flex-column align-items-center">
                    <i class="fas fa-users-slash text-muted mb-2" style="font-size: 2rem; opacity: 0.5;"></i>
                    <span class="fw-bold">No speakers found</span>
                    <small class="text-muted">Try adjusting your search criteria or add new speakers</small>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
