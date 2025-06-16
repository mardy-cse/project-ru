<div class="w-full bg-[#00A65A] py-4 px-6 flex items-center justify-between">
  <!-- Empty left space to help center the title -->
  <div class="w-1/3"></div>

  <!-- Centered Title -->
  <div class="w-1/3 text-center">
    <h1 class="text-white text-2xl font-semibold">Skill Development</h1>
  </div>

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