<header id="siteHeader" class="fixed z-30 top-0 left-0 w-full flex justify-between items-center py-2 px-6 lg:pl-0 bg-[#DBF5D0] border-b border-[#EBEEF2] h-[80px]">
      <div class="flex items-center">
        <div class="flex items-center justify-center relative h-[80px] w-[100px] lg:w-[270px] px-15px">

          <a href="{{ route('dashboard') }}" class="flex items-center">
            <img class="w-[120px] w-max-[100%] rounded-sm" src="./assets/images/ba-logo.svg" alt="Logo" width="120">
          </a>
        </div>

        <button class="skdSidebarNavBtn text-center text-gray-500 w-6 h-8 p-1 ml-4 focus:outline-none">
          <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round"></path>
          </svg>
        </button>

        <div class="relative hidden md:block ml-6">
          <h1 class="text-[18px] text-[#000B8C]">Business Automation Ltd</h1>
        </div>
      </div>

      <div class="flex items-center">
        <div class="relative">



          <!-- Profile Dropdown -->
          <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex gap-2 items-center py-1 px-3 cursor-pointer flex-nowrap focus:outline-none">
              <div class="relative block h-10 w-10 rounded-full overflow-hidden">
                <img class="h-full w-full object-cover" 
                     src="{{ Auth::user()->profile_photo_url ?? 'https://images.unsplash.com/photo-1528892952291-009c663ce843?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=296&q=80' }}" 
                     alt="{{ Auth::user()->name }}">
              </div>
              <div class="relative mr-2 hidden sm:block">
                <h3 class="text-[16px] leading-tight text-[#0E0E0E]">{{ Auth::user()->name }}</h3>
              </div>
              <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="open" 
                 @click.away="open = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-200">
              
              <a href="#" 
                 class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                Profile
              </a>

              <div class="border-t border-gray-100"></div>

              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex items-center">
                  <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2h6a2 2 0 012 2v2"></path>
                  </svg>
                  Logout
                </button>
              </form>
            </div>




          </div>
        </div>
      </div>
    </header>