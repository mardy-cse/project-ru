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
                        <button class="btn btn-sm btn-warning" onclick="deactivateSpeaker({{ $speaker->id }})" title="Deactivate">
                            <i class="fas fa-ban"></i> Deactive
                        </button>
                    @else
                        <button class="btn btn-sm btn-success" onclick="activateSpeaker({{ $speaker->id }})" title="Activate">
                            <i class="fas fa-check"></i> Active
                        </button>
                    @endif
                </td>
            </tr>
            @empty
            <!-- Sample data when no speakers exist -->
            <tr>
                <td>1</td>
                <td>Tiger Nixon</td>
                <td>tiger.nixon@example.com</td>
                <td>+880 1712-345678</td>
                <td>System Architect</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick="editSpeaker(1)" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-warning" onclick="deactivateSpeaker(1)" title="Deactivate">
                        <i class="fas fa-ban"></i> Deactive
                    </button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Garrett Winters</td>
                <td>garrett.winters@example.com</td>
                <td>+880 1812-345679</td>
                <td>Accountant</td>
                <td><span class="badge bg-success">Active</span></td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick="editSpeaker(2)" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-warning" onclick="deactivateSpeaker(2)" title="Deactivate">
                        <i class="fas fa-ban"></i> Deactive
                    </button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Ashton Cox</td>
                <td>ashton.cox@example.com</td>
                <td>+880 1912-345680</td>
                <td>Junior Technical Author</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>
                    <button class="btn btn-sm btn-primary me-1" onclick="editSpeaker(3)" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-warning" onclick="deactivateSpeaker(3)" title="Deactivate">
                        <i class="fas fa-ban"></i> Deactive
                    </button>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>