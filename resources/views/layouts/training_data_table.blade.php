

@php 
use Illuminate\Support\Str; 
@endphp

<table id="myTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Thumbnail</th>
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
            <td class="text-center">
                <div class="thumbnail-image-container d-flex justify-content-center">
                    <div class="position-relative">
                        @php
                            $thumbnailUrl = $training->course_thumbnail 
                                ? asset('storage/' . $training->course_thumbnail) 
                                : asset('images/no-image-found.png');
                        @endphp
                        <img src="{{ $thumbnailUrl }}" 
                             alt="Training Thumbnail" 
                             class="border border-2"
                             style="width: 80px; height: 45px; object-fit: cover; cursor: pointer; transition: all 0.3s ease; border-radius: 8px;"
                             onclick="showImageModal('{{ $thumbnailUrl }}', '{{ addslashes($training->name) }}')"
                             onerror="this.src='{{ asset('images/no-image-found.png') }}';"
                             title="Click to view full image">
                        
                        <!-- Add a small indicator for clickable image -->
                        <div class="position-absolute bottom-0 end-0 bg-primary rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 16px; height: 16px; margin-bottom: -2px; margin-right: -2px; font-size: 8px; color: white;">
                            <i class="fas fa-expand-alt"></i>
                        </div>
                    </div>
                </div>
            </td>
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
