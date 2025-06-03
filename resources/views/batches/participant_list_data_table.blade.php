@php
    use Illuminate\Support\Str;
@endphp

<table id="myTable" class="display table table-bordered" style="width:100%">
  <thead class="table-light">
    <tr>
      <th>SN</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Designation</th>
      <th>Team</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($participants as $index => $user)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td title="{{ $user['name'] }}">{{ Str::limit($user['name'], 30, '...') }}</td>
        <td title="{{ $user['email'] }}">{{ Str::limit($user['email'], 40, '...') }}</td>
        <td>{{ $user['mobile'] }}</td>
        <td>{{ $user['designation'] }}</td>
        <td>{{ $user['team'] }}</td>
        <td>
  @if ((int) $user['status'] === 1)
    <span class="badge bg-success">Approved</span>
  @else
    <span class="badge bg-danger">Decline</span>
  @endif
</td>
<td>
  {{-- <div class="form-check mb-2">
    <input class="form-check-input" type="radio" name="status_{{ $index + 1 }}" value="1" {{ (int) $user['status'] === 1 ? 'checked' : '' }}>
    <label class="form-check-label">Approve</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="status_{{ $index + 1 }}" value="0" {{ (int) $user['status'] === 0 ? 'checked' : '' }}>
    <label class="form-check-label">Decline</label>
  </div> --}}


  {{-- Working on the logic to toggle the status based on the radio button selection. --}}

@if ($user['status'] == 1)
    <a href="{{ url('/participant/' . $user['id'] . '/toggle-status') }}" class="btn btn-sm btn-warning" title="Decline">
        <i class="fas fa-ban"></i> Decline
    </a>
@else
    <a href="{{ url('/participant/' . $user['id'] . '/toggle-status') }}" class="btn btn-sm btn-success" title="Approve">
        <i class="fas fa-check"></i> Approve
    </a>
@endif

</td>

      </tr>
    @endforeach
  </tbody>
</table>
