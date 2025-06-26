@extends('dashboard')

@section('content')
    <main id="mainContent" class="flex-1 overflow-x-hidden overflow-y-auto bg-[#f8f9fd]">
      <div class="w-full max-w-none px-4 md:px-6 lg:px-8 py-6 md:py-8">
        
        @if(Auth::user()->isAdmin())
          {{-- Admin Dashboard Content --}}
          @include('layouts.partials.admin-dashboard')
        @else
          {{-- User Dashboard Content --}}
          @include('layouts.partials.user-dashboard')
        @endif
        
      </div>
    </main>
@endsection
