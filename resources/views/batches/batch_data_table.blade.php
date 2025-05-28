@php 
    use Illuminate\Support\Str; 
@endphp

<table id="myTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>SN</th>
            <th>Training Name</th>
            <th>Batch Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Time</th>
            <th>Total Sessions</th>
            <th>Venue</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Laravel Fundamentals</td>
            <td>Batch A</td>
            <td>2025-06-01</td>
            <td>2025-06-15</td>
            <td>10:00 AM - 12:00 PM</td>
            <td>10</td>
            <td>Room 101</td>
            <td><span class="text-green-600">Active</span></td>
            <td>
                <a href="#" class="text-blue-600 hover:underline">View</a> |
                <a href="#" class="text-yellow-600 hover:underline">Edit</a> |
                <a href="#" class="text-red-600 hover:underline">Delete</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Advanced PHP</td>
            <td>Batch B</td>
            <td>2025-07-10</td>
            <td>2025-07-25</td>
            <td>2:00 PM - 4:00 PM</td>
            <td>8</td>
            <td>Lab 202</td>
            <td><span class="text-green-600">Active</span></td>
            <td>
                <a href="#" class="text-blue-600 hover:underline">View</a> |
                <a href="#" class="text-yellow-600 hover:underline">Edit</a> |
                <a href="#" class="text-red-600 hover:underline">Delete</a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td>Vue.js with Laravel</td>
            <td>Batch C</td>
            <td>2025-08-05</td>
            <td>2025-08-20</td>
            <td>3:00 PM - 5:00 PM</td>
            <td>12</td>
            <td>Virtual</td>
            <td><span class="text-gray-500">Inactive</span></td>
            <td>
                <a href="#" class="text-blue-600 hover:underline">View</a> |
                <a href="#" class="text-yellow-600 hover:underline">Edit</a> |
                <a href="#" class="text-red-600 hover:underline">Delete</a>
            </td>
        </tr>
    </tbody>
</table>
