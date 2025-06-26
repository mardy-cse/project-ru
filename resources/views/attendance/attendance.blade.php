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
        <h4 class="text-xl font-bold text-gray-900" style="color:white">Attendance</h4>
      </div>

      <!-- Right side: button -->
    <a href="#" style="text-decoration: none;">
  <button class="px-6 py-2 rounded-xl flex items-center gap-2 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-black font-semibold border-2 border-gray-300 hover:border-gray-400 bg-white">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
    </svg>
    <span class="font-semibold">Filter Attendance</span>
  </button>
</a>

    </div>
  </div>
</div>
<div class="overflow-x-auto p-6">
        @include('attendance.attendance_data_table')
      </div>
    </div>
  </div>
</div>


<!-- DataTables JavaScript -->
<script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
@endsection