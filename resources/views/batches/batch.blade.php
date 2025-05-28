@extends('dashboard')

@section('content')
<!-- DataTables CSS -->
<link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

<div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 p-6">
  <div class="max-w-7xl mx-auto">


    <!-- Main Table Card -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
      <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
  <div class="px-6 py-2 border-b border-gray-200 bg-green-200" style="background-color: green; color: white;">
    <div class="flex justify-between items-center">
      <!-- Left side: icon + title -->
      <div class="flex items-center gap-2">
        <!-- Hamburger icon -->
        <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: white;">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <h4 class="text-xl font-bold text-gray-900" style="color:white">Batch List</h4>
      </div>

      <!-- Right side: button -->
    <a href="/batch/add_new_batch" style="text-decoration: none;">
  <button class="px-6 py-2 rounded-xl flex items-center gap-2 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-black font-semibold border-2 border-gray-300 hover:border-gray-400 bg-white">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    <span class="font-semibold">Create New Batch</span>
  </button>
</a>

    </div>
  </div>
</div>
<div class="overflow-x-auto p-6">
        @include('batches.batch_data_table')
      </div>
    </div>
  </div>
</div>


<!-- DataTables JavaScript -->
<script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

<script>
// Initialize DataTable
$(document).ready(function() {
    let table = new DataTable('#myTable', {
        responsive: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
        language: {
            search: "Search speakers:",
            lengthMenu: "Show _MENU_ speakers per page",
            info: "Showing _START_ to _END_ of _TOTAL_ speakers",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });
});

function openAddModal() {
    document.getElementById('addSpeakerModal').classList.remove('hidden');
}

function closeAddModal() {
    document.getElementById('addSpeakerModal').classList.add('hidden');
}

function viewSpeaker(id) {
    alert('View speaker: ' + id);
}

function editSpeaker(id) {
    alert('Edit speaker: ' + id);
}

function deleteSpeaker(id) {
    if(confirm('Are you sure you want to delete this speaker?')) {
        alert('Delete speaker: ' + id);
    }
}

// Image preview functionality
document.getElementById('profile_image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('imagePreview').classList.remove('hidden');
            document.getElementById('imagePlaceholder').classList.add('hidden');
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection