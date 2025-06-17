<div class="container-fluid mt-4">
    <div class="border border-success rounded w-100">
        
        <div class="text-white p-3 rounded-top mb-0" style="background-color: green; color: white;">
            <h1 class="h4 mb-0">List of Training Participants</h1>
        </div>

        <div class="p-4">
            @if(isset($participants) && $participants->count() > 0)

                <div class="table-responsive">
                    <table id="participantsTable" class="display table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($participants as $index => $participant)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td title="{{ $participant->name ?? 'N/A' }}">
                                    {{ $participant->name ? Str::limit($participant->name, 25, '...') : 'N/A' }}
                                </td>
                                <td>{{ $participant->mobile ?? 'N/A' }}</td>
                                <td title="{{ $participant->email ?? 'N/A' }}">
                                    {{ $participant->email ? Str::limit($participant->email, 30, '...') : 'N/A' }}
                                </td>
                                
                                <td>
                                    @if($participant->status)
                                        <span class="badge bg-success">Present</span>
                                    @else
                                        <span class="badge bg-danger">Absent</span>
                                    @endif
                                </td>
                                {{-- <td>
                                    <a href="{{ url('/training-participant/' . $participant->id . '/view') }}" 
                                       class="btn btn-sm btn-info me-1" title="View">
                                        <i class="fas fa-eye">view</i>
                                    </a>
                                    <a href="{{ url('/training-participant/' . $participant->id . '/edit') }}" 
                                       class="btn btn-sm btn-primary me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td> --}}
                      <td>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" 
               name="attendance[{{ $participant->id }}]" 
               id="present{{ $participant->id }}" 
               value="present" 
               {{ $participant->status == 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="present{{ $participant->id }}">Present</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" 
               name="attendance[{{ $participant->id }}]" 
               id="absent{{ $participant->id }}" 
               value="absent" 
               {{ $participant->status != 1 ? 'checked' : '' }}>
        <label class="form-check-label" for="absent{{ $participant->id }}">Absent</label>
    </div>
</td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center fw-semibold">
                    No training participants found for this batch
                </div>
            @endif
        </div>

    </div>
</div>