{{-- Admin Dashboard Content --}}
<div class="w-full relative">
  {{-- Admin Welcome Section --}}
  <div class="mb-4 md:mb-6">
    <h1 class="text-[24px] md:text-[28px] font-bold text-[#0E0E0E] mb-2">Admin Dashboard</h1>
    <p class="text-[14px] md:text-[16px] text-[#686868]">Welcome back, {{ Auth::user()->name }}! Here's your system overview.</p>
  </div>

  {{-- System Overview Stats --}}
  <div class="w-full relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 lg:gap-6 mb-6 md:mb-8">
    <div class="bg-[#ADDF98] p-4 md:p-6 rounded-lg shadow-sm">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-[16px] md:text-[18px] font-semibold text-[#0E0E0E]">Total Users</h3>
          <p class="text-[20px] md:text-[24px] font-bold text-[#000B8C]">{{ \App\Models\User::where('role_id', 2)->count() }}</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 bg-[#85C16D] rounded-full flex items-center justify-center">
          <i class="fas fa-users text-white text-lg md:text-xl"></i>
        </div>
      </div>
    </div>

    <div class="bg-[#ECFAFC] p-4 md:p-6 rounded-lg shadow-sm">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-[16px] md:text-[18px] font-semibold text-[#0E0E0E]">Active Courses</h3>
          <p class="text-[20px] md:text-[24px] font-bold text-[#3C8DBC]">{{ \App\Models\Training::where('status', 1)->count() }}</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 bg-[#3C8DBC] rounded-full flex items-center justify-center">
          <i class="fas fa-book text-white text-lg md:text-xl"></i>
        </div>
      </div>
    </div>

    <div class="bg-[#F8FCE9] p-4 md:p-6 rounded-lg shadow-sm">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-[16px] md:text-[18px] font-semibold text-[#0E0E0E]">Total Enrollments</h3>
          <p class="text-[20px] md:text-[24px] font-bold text-[#85C16D]">{{ \App\Models\TrainingParticipant::count() }}</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 bg-[#85C16D] rounded-full flex items-center justify-center">
          <i class="fas fa-user-graduate text-white text-lg md:text-xl"></i>
        </div>
      </div>
    </div>

    <div class="bg-[#FFF2E6] p-4 md:p-6 rounded-lg shadow-sm">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-[16px] md:text-[18px] font-semibold text-[#0E0E0E]">Active Batches</h3>
          <p class="text-[20px] md:text-[24px] font-bold text-[#FF8A00]">{{ \App\Models\Batches::where('batch_status', 1)->count() }}</p>
        </div>
        <div class="w-10 h-10 md:w-12 md:h-12 bg-[#FF8A00] rounded-full flex items-center justify-center">
          <i class="fas fa-layer-group text-white text-lg md:text-xl"></i>
        </div>
      </div>
    </div>
  </div>

  {{-- Main Content Grid --}}
  <div class="w-full relative grid grid-cols-1 xl:grid-cols-2 gap-4 md:gap-6">
    
    {{-- Recent Enrollments --}}
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
      <h2 class="text-[18px] md:text-[20px] font-semibold text-[#0E0E0E] mb-4">Recent Enrollments</h2>
      @php
        $recentEnrollments = \App\Models\TrainingParticipant::with(['batch.training'])
          ->orderBy('created_at', 'desc')
          ->limit(5)
          ->get();
      @endphp
      
      @if($recentEnrollments->count() > 0)
        <div class="space-y-3">
          @foreach($recentEnrollments as $enrollment)
            <div class="border-l-4 border-[#3C8DBC] pl-4 py-2">
              <h4 class="font-medium text-[16px] text-[#0E0E0E]">{{ $enrollment->name }}</h4>
              <p class="text-[14px] text-[#686868]">{{ $enrollment->batch->training->name ?? 'Training Course' }}</p>
              <p class="text-[12px] text-[#888888]">{{ $enrollment->created_at->diffForHumans() }}</p>
              <span class="inline-block px-2 py-1 text-xs rounded {{ $enrollment->status ? 'bg-green-100 text-green-800' : 'bg-orange-100 text-orange-800' }}">
                {{ $enrollment->status ? 'Approved' : 'Pending' }}
              </span>
            </div>
          @endforeach
        </div>
        
        <div class="mt-4 text-center">
          <a href="/batch/list" class="inline-block h-[32px] md:h-[36px] rounded-md bg-[#3C8DBC] hover:bg-[#85C16D] transition-all ease-in-out duration-300 text-white text-[13px] md:text-[14px] leading-tight py-[4px] md:py-[6px] px-[12px] md:px-[16px] flex items-center justify-center w-auto">
            View All Enrollments
          </a>
        </div>
      @else
        <p class="text-[13px] md:text-[14px] text-[#686868] text-center py-4">No recent enrollments</p>
      @endif
    </div>

    {{-- Training Management --}}
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
      <h2 class="text-[18px] md:text-[20px] font-semibold text-[#0E0E0E] mb-4">Training Management</h2>
      
      <div class="space-y-4">
        <div class="border border-[#E5E5E5] rounded-lg p-4">
          <h3 class="font-medium text-[16px] text-[#0E0E0E] mb-2">Quick Actions</h3>
          <div class="grid grid-cols-1 gap-2">
            <a href="/training/add_training" class="flex items-center gap-2 text-[13px] md:text-[14px] text-[#3C8DBC] hover:text-[#85C16D] transition-colors">
              <i class="fas fa-plus"></i>
              <span>Add New Training</span>
            </a>
            <a href="/batch/add_new_batch" class="flex items-center gap-2 text-[13px] md:text-[14px] text-[#3C8DBC] hover:text-[#85C16D] transition-colors">
              <i class="fas fa-plus"></i>
              <span>Create New Batch</span>
            </a>
            <a href="/speaker/add_new" class="flex items-center gap-2 text-[13px] md:text-[14px] text-[#3C8DBC] hover:text-[#85C16D] transition-colors">
              <i class="fas fa-user-plus"></i>
              <span>Add Speaker</span>
            </a>
          </div>
        </div>

        <div class="border border-[#E5E5E5] rounded-lg p-4">
          <h3 class="font-medium text-[14px] md:text-[16px] text-[#0E0E0E] mb-2">Management</h3>
          <div class="grid grid-cols-1 gap-2">
            <a href="/training/list" class="flex items-center gap-2 text-[13px] md:text-[14px] text-[#3C8DBC] hover:text-[#85C16D] transition-colors">
              <i class="fas fa-list"></i>
              <span>Manage Trainings</span>
            </a>
            <a href="/batch/list" class="flex items-center gap-2 text-[13px] md:text-[14px] text-[#3C8DBC] hover:text-[#85C16D] transition-colors">
              <i class="fas fa-layer-group"></i>
              <span>Manage Batches</span>
            </a>
            <a href="/batch/list" class="flex items-center gap-2 text-[13px] md:text-[14px] text-[#3C8DBC] hover:text-[#85C16D] transition-colors">
              <i class="fas fa-users"></i>
              <span>Manage Participants</span>
            </a>
            <a href="/attendance/list" class="flex items-center gap-2 text-[13px] md:text-[14px] text-[#3C8DBC] hover:text-[#85C16D] transition-colors">
              <i class="fas fa-check-square"></i>
              <span>Attendance Management</span>
            </a>
          </div>
        </div>
      </div>
    </div>

    {{-- System Statistics --}}
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
      <h2 class="text-[18px] md:text-[20px] font-semibold text-[#0E0E0E] mb-4">System Statistics</h2>
      
      <div class="space-y-3 md:space-y-4">
        @php
          $totalParticipants = \App\Models\TrainingParticipant::count();
          $completedTrainings = \App\Models\TrainingParticipant::where('is_training_completed', true)->count();
          $pendingApprovals = \App\Models\TrainingParticipant::where('status', false)->count();
          $certificatesIssued = \App\Models\TrainingParticipant::whereNotNull('certificate_url')->count();
        @endphp
        
        <div class="flex justify-between items-center py-2 border-b border-[#E5E5E5]">
          <span class="text-[13px] md:text-[14px] text-[#686868]">Completion Rate</span>
          <span class="text-[14px] md:text-[16px] font-semibold text-[#0E0E0E]">
            {{ $totalParticipants > 0 ? round(($completedTrainings / $totalParticipants) * 100) : 0 }}%
          </span>
        </div>
        
        <div class="flex justify-between items-center py-2 border-b border-[#E5E5E5]">
          <span class="text-[13px] md:text-[14px] text-[#686868]">Pending Approvals</span>
          <span class="text-[14px] md:text-[16px] font-semibold text-[#FF8A00]">{{ $pendingApprovals }}</span>
        </div>
        
        <div class="flex justify-between items-center py-2 border-b border-[#E5E5E5]">
          <span class="text-[13px] md:text-[14px] text-[#686868]">Certificates Issued</span>
          <span class="text-[14px] md:text-[16px] font-semibold text-[#85C16D]">{{ $certificatesIssued }}</span>
        </div>
        
        <div class="flex justify-between items-center py-2">
          <span class="text-[13px] md:text-[14px] text-[#686868]">Total Speakers</span>
          <span class="text-[14px] md:text-[16px] font-semibold text-[#3C8DBC]">{{ \App\Models\Speakers::count() }}</span>
        </div>
      </div>
    </div>

    {{-- Recent Activities --}}
    <div class="bg-white p-4 md:p-6 rounded-lg shadow-sm">
      <h2 class="text-[18px] md:text-[20px] font-semibold text-[#0E0E0E] mb-4">Recent System Activities</h2>
      
      <div class="space-y-3">
        @php
          $recentUsers = \App\Models\User::where('role_id', 2)->orderBy('created_at', 'desc')->limit(3)->get();
          $recentTrainings = \App\Models\Training::orderBy('created_at', 'desc')->limit(2)->get();
        @endphp
        
        @foreach($recentUsers as $user)
          <div class="flex items-start gap-3 py-2">
            <div class="w-8 h-8 bg-[#ADDF98] rounded-full flex items-center justify-center">
              <i class="fas fa-user text-[#0E0E0E] text-sm"></i>
            </div>
            <div>
              <p class="text-[13px] md:text-[14px] text-[#0E0E0E] font-medium">New user registered</p>
              <p class="text-[11px] md:text-[12px] text-[#686868]">{{ $user->name }} - {{ $user->created_at->diffForHumans() }}</p>
            </div>
          </div>
        @endforeach
        
        @foreach($recentTrainings as $training)
          <div class="flex items-start gap-3 py-2">
            <div class="w-8 h-8 bg-[#ECFAFC] rounded-full flex items-center justify-center">
              <i class="fas fa-book text-[#3C8DBC] text-sm"></i>
            </div>
            <div>
              <p class="text-[13px] md:text-[14px] text-[#0E0E0E] font-medium">New training added</p>
              <p class="text-[11px] md:text-[12px] text-[#686868]">{{ $training->name }} - {{ $training->created_at->diffForHumans() }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
