<div class="w-full bg-[#00A65A] py-4 px-6 flex items-center justify-between">
  <!-- Logo on the left -->
  <div class="w-1/3">
    <a href="{{ route('dashboard') }}" class="flex items-center">
      <img class="w-[120px] max-w-full rounded-sm" src="{{ asset('images/amar-school-logo.png') }}" alt="Logo" width="120">
      {{-- <img class="w-[120px] max-w-full rounded-sm" src="{{ asset('images/amar-school-logo.png') }}" alt="Logo" width="120"> --}}
    </a>
  </div>

  <!-- Empty middle space -->
  <div class="w-1/3"></div>

  <!-- Login and Register Buttons on the right -->
  <div class="w-1/3 flex justify-end gap-3">
    <a href="{{ route('login') }}" class="bg-white text-[#00A65A] font-medium px-4 py-2 rounded hover:bg-gray-100 transition duration-300">
      Login
    </a>
    <a href="{{ route('register') }}" class="bg-white text-[#00A65A] font-medium px-4 py-2 rounded hover:bg-gray-100 transition duration-300">
      Register
    </a>
  </div>
</div>
