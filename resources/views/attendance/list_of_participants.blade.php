<div class="container-fluid mt-4">
    <div class="border border-success rounded w-100">
        
        <div class="text-white p-3 rounded-top mb-0" style="background-color: green; color: white;">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h4 mb-0">
                    <i class="fas fa-users me-2"></i>
                    List of Training Participants
                </h1>
                <span class="badge bg-light text-dark">
                    Total: {{ $participants->count() }} participants
                </span>
            </div>
        </div>

        <div class="p-4">
            @if(isset($participants) && $participants->count() > 0)
                <div class="table-responsive">
                    <table id="participantsTable" class="display table table-striped" style="width:100%">
                        <thead class="table-dark">
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Organization</th>
                                <th>Current Status</th>
                                <th>Mark Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participants as $index => $participant)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td title="{{ $participant->name ?? 'N/A' }}">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-user-circle me-2 text-muted"></i>
                                        {{ $participant->name ? Str::limit($participant->name, 25, '...') : 'N/A' }}
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted">
                                        <i class="fas fa-phone me-1"></i>
                                        {{ $participant->mobile ?? 'N/A' }}
                                    </span>
                                </td>
                                <td title="{{ $participant->email ?? 'N/A' }}">
                                    <span class="text-muted">
                                        <i class="fas fa-envelope me-1"></i>
                                        {{ $participant->email ? Str::limit($participant->email, 30, '...') : 'N/A' }}
                                    </span>
                                </td>
                                <td>{{ $participant->organization ?? 'N/A' }}</td>
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
                                <td>
                                    <div class="btn-group" role="group">
                                        <input type="radio" 
                                               class="btn-check" 
                                               name="attendance[{{ $participant->id }}]" 
                                               id="present{{ $participant->id }}" 
                                               value="present" 
                                               {{ $participant->status == 1 ? 'checked' : '' }}>
                                        <label class="btn btn-outline-success btn-sm" for="present{{ $participant->id }}">
                                            <i class="fas fa-check me-1"></i>Present
                                        </label>

                                        <input type="radio" 
                                               class="btn-check" 
                                               name="attendance[{{ $participant->id }}]" 
                                               id="absent{{ $participant->id }}" 
                                               value="absent" 
                                               {{ $participant->status != 1 ? 'checked' : '' }}>
                                        <label class="btn btn-outline-danger btn-sm" for="absent{{ $participant->id }}">
                                            <i class="fas fa-times me-1"></i>Absent
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-user-slash text-muted" style="font-size: 4rem;"></i>
                    </div>
                    <h5 class="text-muted">No training participants found for this batch</h5>
                    <p class="text-muted">There are no enrolled participants in this batch yet.</p>
                </div>
            @endif
        </div>
    </div>
</div>