

<header id="siteHeader" class="fixed z-30 top-0 left-0 w-full flex justify-between items-center py-2 px-6 lg:pl-0 bg-[#DBF5D0] border-b border-[#EBEEF2] h-[80px]">
  <div class="flex items-center">
    <!-- Logo Section -->
<div class="flex items-center justify-center relative h-[80px] w-[100px] lg:w-[270px] px-4">
  <a href="{{ route('dashboard') }}" class="flex items-center">
    <img class="w-[120px] max-w-full rounded-sm" src="{{ asset('images/amar-school-logo.png') }}" alt="Logo" width="120">
  </a>
</div>


    <!-- Mobile Menu Button -->
    <button class="skdSidebarNavBtn text-center text-gray-600 w-6 h-8 p-1 ml-4 focus:outline-none hover:text-[#000B8C] transition-colors">
      <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg>
    </button>

    <!-- Module Name -->
    <div class="relative hidden md:block ml-6">
      <h1 class="text-[18px] text-[#000B8C] font-medium">Training Module</h1>
    </div>
  </div>

  <!-- User Profile Section -->
  <div class="flex items-center">
    @auth
    <div class="relative" x-data="{ open: false }">
      <!-- Profile Dropdown Trigger -->
      <button @click="open = !open" class="flex gap-2 items-center py-1 px-3 cursor-pointer flex-nowrap focus:outline-none hover:bg-[#c5e8bc] rounded-full transition-colors">
        <div class="relative block h-10 w-10 rounded-full overflow-hidden border-2 border-[#DBF5D0] shadow-sm">
          <img class="h-full w-full object-cover" 
               src="{{ Auth::user()->profile_photo_url ?? 'https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80' }}" 
               alt="{{ Auth::user()->name }}">
        </div>
        <div class="relative mr-2 hidden sm:block">
          <h3 class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</h3>
        </div>
        <svg class="w-4 h-4 ml-1 text-gray-600 transition-transform duration-200" 
             :class="{ 'transform rotate-180': open }" 
             fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
      </button>

      <!-- Dropdown Menu -->
      <div x-show="open" 
           @click.away="open = false"
           x-transition:enter="transition ease-out duration-200"
           x-transition:enter-start="opacity-0 translate-y-1"
           x-transition:enter-end="opacity-100 translate-y-0"
           x-transition:leave="transition ease-in duration-150"
           x-transition:leave-start="opacity-100 translate-y-0"
           x-transition:leave-end="opacity-0 translate-y-1"
           class="absolute right-0 mt-2 w-56 bg-white rounded-lg shadow-lg py-1 z-50 border border-gray-200 divide-y divide-gray-100">
        
        <!-- Profile Section -->
        <div class="px-4 py-3">
          <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
          <p class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</p>
        </div>
        

        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>


         <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
        
      </div>
    </div>
    @else
    <!-- Login/Register buttons for guests -->
    <div class="flex items-center space-x-4">
      <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-[#000B8C] transition-colors">Login</a>
      <a href="{{ route('register') }}" class="bg-[#000B8C] text-white px-4 py-2 rounded-md text-sm hover:bg-[#000080] transition-colors">Register</a>
    </div>
    @endauth
  </div>
</header>