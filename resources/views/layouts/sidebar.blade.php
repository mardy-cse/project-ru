    <div class="skd-sidebar block fixed left-0 top-[80px] bottom-0 h-auto bg-[#DBF5D0] z-50">
      <div class="menu-conteiner h-full overflow-y-auto font-normal">
        <nav class="relative">
          <div class="relative block w-full">

            <!-- Dashboard - সবার জন্য -->
            <a class="dash-sb-menu-item {{ request()->is('dashboardcontent') || request()->is('dashboard') ? 'active' : '' }} w-full flex flex-col gap-[10px] relative items-center justify-center my-[1px] py-[20px] px-[10px] text-black" href="/dashboardcontent">
              <span class="w-[60px] h-[60px] flex items-center justify-center p-2">
                <svg class="sb-menu-icon h-[50px] w-[50px]" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 76 75" fill="none">
                  <g clip-path="url(#clip0_6_41)">
                    <path d="M0.5 37.5C0.5 27.5544 4.45088 18.0161 11.4835 10.9835C18.5161 3.95088 28.0544 0 38 0C47.9456 0 57.4839 3.95088 64.5165 10.9835C71.5491 18.0161 75.5 27.5544 75.5 37.5C75.5 47.4456 71.5491 56.9839 64.5165 64.0165C57.4839 71.0491 47.9456 75 38 75C28.0544 75 18.5161 71.0491 11.4835 64.0165C4.45088 56.9839 0.5 47.4456 0.5 37.5ZM47.375 51.5625C47.375 47.6221 44.958 44.2529 41.5156 42.876V12.8906C41.5156 10.9424 39.9482 9.375 38 9.375C36.0518 9.375 34.4844 10.9424 34.4844 12.8906V42.876C31.042 44.2676 28.625 47.6367 28.625 51.5625C28.625 56.7334 32.8291 60.9375 38 60.9375C43.1709 60.9375 47.375 56.7334 47.375 51.5625ZM21.5938 25.7812C22.837 25.7812 24.0292 25.2874 24.9083 24.4083C25.7874 23.5292 26.2812 22.337 26.2812 21.0938C26.2812 19.8505 25.7874 18.6583 24.9083 17.7792C24.0292 16.9001 22.837 16.4062 21.5938 16.4062C20.3505 16.4062 19.1583 16.9001 18.2792 17.7792C17.4001 18.6583 16.9062 19.8505 16.9062 21.0938C16.9062 22.337 17.4001 23.5292 18.2792 24.4083C19.1583 25.2874 20.3505 25.7812 21.5938 25.7812ZM19.25 37.5C19.25 36.2568 18.7561 35.0645 17.8771 34.1854C16.998 33.3064 15.8057 32.8125 14.5625 32.8125C13.3193 32.8125 12.127 33.3064 11.2479 34.1854C10.3689 35.0645 9.875 36.2568 9.875 37.5C9.875 38.7432 10.3689 39.9355 11.2479 40.8146C12.127 41.6936 13.3193 42.1875 14.5625 42.1875C15.8057 42.1875 16.998 41.6936 17.8771 40.8146C18.7561 39.9355 19.25 38.7432 19.25 37.5ZM61.4375 42.1875C62.6807 42.1875 63.873 41.6936 64.7521 40.8146C65.6311 39.9355 66.125 38.7432 66.125 37.5C66.125 36.2568 65.6311 35.0645 64.7521 34.1854C63.873 33.3064 62.6807 32.8125 61.4375 32.8125C60.1943 32.8125 59.002 33.3064 58.1229 34.1854C57.2439 35.0645 56.75 36.2568 56.75 37.5C56.75 38.7432 57.2439 39.9355 58.1229 40.8146C59.002 41.6936 60.1943 42.1875 61.4375 42.1875ZM59.0938 21.0938C59.0938 19.8505 58.5999 18.6583 57.7208 17.7792C56.8417 16.9001 55.6495 16.4062 54.4062 16.4062C53.163 16.4062 51.9708 16.9001 51.0917 17.7792C50.2126 18.6583 49.7188 19.8505 49.7188 21.0938C49.7188 22.337 50.2126 23.5292 51.0917 24.4083C51.9708 25.2874 53.163 25.7812 54.4062 25.7812C55.6495 25.7812 56.8417 25.2874 57.7208 24.4083C58.5999 23.5292 59.0938 22.337 59.0938 21.0938Z" fill="black"/>
                  </g>
                  <defs>
                    <clipPath id="clip0_6_41">
                      <rect width="75" height="75" fill="white" transform="translate(0.5)"/>
                    </clipPath>
                  </defs>
                </svg>
              </span>
              <span class="text-[16px] text-lh-1_5 sb-menu-text">Dash Board</span>
            </a>
          </div>

          <!-- User Only Menu Items (role_id = 2) -->
          @if(auth()->user()->role_id == 2)
            <div class="relative block w-full">
              <a 
                href="/training/courses"
                style="text-decoration: none;" 
                class="dash-sb-menu-item {{ request()->is('training/courses*') || request()->is('training/*') || request()->routeIs('user.training.*') ? 'active' : '' }} w-full flex flex-col gap-[10px] relative items-center justify-center my-[1px] py-[20px] px-[10px] text-black"
              >
                <span class="w-[60px] h-[60px] flex items-center justify-center p-2">
                  <i class="fa fa-users" style="font-size: 50px;"></i>
                </span>
                <span style="font-size: 16px; line-height: 1.5;" class="sb-menu-text">Training Courses</span>
              </a>
            </div>
          @endif

          <!-- Admin Only Menu Items (role_id = 1) -->
          @if(auth()->user()->role_id == 1)
            <a 
              href="/speaker/list"
              style="text-decoration: none;" 
              class="dash-sb-menu-item {{ request()->is('speaker_content') || request()->is('add_speaker') || request()->is('speaker/*') ? 'active' : '' }} w-full flex flex-col gap-[10px] relative items-center justify-center my-[1px] py-[20px] px-[10px] text-black"
            >
              <span class="w-[60px] h-[60px] flex items-center justify-center p-2">
                <i class="fa fa-microphone" style="font-size: 50px;"></i>
              </span>
              <span style="font-size: 16px; line-height: 1.5;" class="sb-menu-text">Speaker</span>
            </a>

            <div class="relative block w-full">
              <a 
                href="/training/list"
                style="text-decoration: none;" 
                class="dash-sb-menu-item {{ request()->is('dash-training-course*') || request()->is('training*') ? 'active' : '' }} w-full flex flex-col gap-[10px] relative items-center justify-center my-[1px] py-[20px] px-[10px] text-black"
              >
                <span class="w-[60px] h-[60px] flex items-center justify-center p-2">
                  <i class="fa fa-users" style="font-size: 50px;"></i>
                </span>
                <span style="font-size: 16px; line-height: 1.5;" class="sb-menu-text">Training Courses</span>
              </a>
            </div>

            <div class="relative block w-full">
              <a 
                href="/batch/list"
                style="text-decoration: none;" 
                class="dash-sb-menu-item {{ request()->is('batch*') || request()->is('batch*') ? 'active' : '' }} w-full flex flex-col gap-[10px] relative items-center justify-center my-[1px] py-[20px] px-[10px] text-black"
              >
                <span class="w-[60px] h-[60px] flex items-center justify-center p-2">
                  <i class="fa fa-calendar" style="font-size: 50px;"></i>
                </span>
                <span style="font-size: 16px; line-height: 1.5;" class="sb-menu-text">Batches</span>
              </a>
            </div>

            <div class="relative block w-full">
              <a 
                href="/attendance/list"
                style="text-decoration: none;" 
                class="dash-sb-menu-item {{ request()->is('attendance*') ? 'active' : '' }} w-full flex flex-col gap-[10px] relative items-center justify-center my-[1px] py-[20px] px-[10px] text-black"
              >
                <span class="w-[60px] h-[60px] flex items-center justify-center p-2">
                  <i class="fa fa-users" style="font-size: 50px;"></i>
                </span>
                <span style="font-size: 16px; line-height: 1.5;" class="sb-menu-text">Attendance</span>
              </a>
            </div>
          @endif

        </nav>
      </div>
    </div>