@extends('dashboard')

@section('content')
    <main id="mainContent" class="flex-1 overflow-x-hidden overflow-y-auto bg-[#f8f9fd]">
      <div class="container mx-auto px-6 py-8">
        <div class="w-full relative grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div class="w-full block">
            <div class="profile-header w-full p-[20px] rounded-md relative mb-4 bg-[#ADDF98]">
              <div class="flex gap-4 lg:gap-6 items-center flex-wrap w-full mb-4">
                <div class="w-[160px] h-[160px] relative rounded-md bg-[#C4D0CB] flex items-center justify-center">
                  <img src="./assets/images/profile-img-01.png" alt="profile-img" class="rounded-md w-full h-full object-cover">
                </div>
                <div class="flex flex-col gap-1 items-start">
                  <h3 class="text-[24px] text-[#0E0E0E]">Karim Rahman</h3>
                  <div class="text-[16px] text-[#0E0E0E] inline-flex gap-2 items-center pb-1">
                    <span class="p-info-icon h-[20px] w-[20px]">
                      <svg class="h-[20px] w-[20px]" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 30 30" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.1109 5.10981L4.20158 5.01504C6.61086 2.60555 8.17981 1.96689 9.85383 2.92953C10.3354 3.20644 10.7868 3.59404 11.4007 4.21751L13.2836 6.17004C14.3237 7.30491 14.5601 8.39348 14.2215 9.66831L14.1748 9.83709L14.123 10.0049L13.8713 10.7434C13.3325 12.3997 13.5575 13.3341 15.4743 15.2505C17.4677 17.2433 18.3982 17.4064 20.1822 16.783L20.5001 16.6725L20.8846 16.5476L21.0529 16.5009C22.4079 16.1394 23.5525 16.4279 24.7665 17.641L26.2837 19.1065L26.7303 19.5457C27.2254 20.0507 27.5527 20.4507 27.7944 20.8736C28.751 22.5471 28.1117 24.1151 25.6329 26.5847L25.3971 26.8236C25.027 27.1803 24.6812 27.4358 24.1733 27.677C23.3206 28.0818 22.3133 28.2345 21.1427 28.0717C18.2584 27.6706 14.6002 25.3947 9.96485 20.7606C9.58752 20.3833 9.22613 20.0134 8.88031 19.6506L8.20934 18.9345C1.92203 12.1036 1.36736 7.90735 3.94397 5.27563L4.1109 5.10981ZM9.88302 5.35116C9.47577 4.94967 9.17995 4.70492 8.91915 4.55495C8.34224 4.2232 7.71937 4.36343 6.56662 5.35559L6.20441 5.67918C6.14123 5.7375 6.07661 5.79804 6.01048 5.86086L5.59514 6.26539L5.55771 6.31215L5.27614 6.59504C4.5957 7.29005 4.27339 8.1383 4.55113 9.59709C5.00689 11.9909 7.09302 15.2382 11.2905 19.4346C15.6641 23.8071 18.9965 25.8801 21.401 26.2145C22.8028 26.4095 23.5178 26.07 24.2469 25.323L24.803 24.7618C25.0637 24.489 25.2865 24.2417 25.4747 24.0157L25.7313 23.6924C26.3871 22.8188 26.447 22.2948 26.1666 21.8041C26.0598 21.6174 25.9046 21.4127 25.6786 21.1626L25.3721 20.8388L25.1907 20.6572L23.2766 18.809C22.637 18.2192 22.1999 18.1355 21.5362 18.3125L21.3446 18.3676L20.5518 18.6368C18.2516 19.3796 16.5922 19.0194 14.1487 16.5765C11.6179 14.0463 11.3211 12.3567 12.169 9.92397L12.2234 9.76764L12.3739 9.31442L12.4478 9.02554C12.5789 8.39683 12.4292 7.95847 11.7534 7.28251C11.7255 7.25468 11.6944 7.22333 11.6606 7.189L9.88302 5.35116Z" fill="black"/>
                      </svg>
                    </span>
                    <span>+8801712345678</span>  
                  </div>
                  <div class="text-[16px] text-[#0E0E0E] inline-flex gap-2 items-center pb-1">
                    <span class="p-info-icon h-[20px] w-[20px]">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 28 25" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.7212 14.831C12.8849 14.831 12.0512 14.5547 11.3537 14.0022L5.74741 9.48225C5.34366 9.15725 5.28116 8.566 5.60491 8.1635C5.93116 7.76225 6.52116 7.6985 6.92366 8.02225L12.5249 12.5372C13.2287 13.0947 14.2199 13.0947 14.9287 12.5322L20.4737 8.02475C20.8762 7.696 21.4662 7.7585 21.7937 8.161C22.1199 8.56225 22.0587 9.15225 21.6574 9.47975L16.1024 13.9947C15.3999 14.5522 14.5599 14.831 13.7212 14.831" fill="black"/>
                        <mask id="mask0_7_269" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="28" height="25">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 0.5H27.1249V24.875H0.25V0.5Z" fill="white"/>
                        </mask>
                        <g mask="url(#mask0_7_269)">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M7.54875 23H19.8238C19.8263 22.9975 19.8363 23 19.8438 23C21.27 23 22.535 22.49 23.505 21.5213C24.6313 20.4 25.25 18.7887 25.25 16.985V8.4C25.25 4.90875 22.9675 2.375 19.8238 2.375H7.55125C4.4075 2.375 2.125 4.90875 2.125 8.4V16.985C2.125 18.7887 2.745 20.4 3.87 21.5213C4.84 22.49 6.10625 23 7.53125 23H7.54875ZM7.5275 24.875C5.59875 24.875 3.87625 24.175 2.54625 22.85C1.065 21.3725 0.25 19.29 0.25 16.985V8.4C0.25 3.89625 3.38875 0.5 7.55125 0.5H19.8238C23.9863 0.5 27.125 3.89625 27.125 8.4V16.985C27.125 19.29 26.31 21.3725 24.8288 22.85C23.5 24.1737 21.7763 24.875 19.8438 24.875H19.8238H7.55125H7.5275Z" fill="black"/>
                        </g>
                      </svg>
                    </span>
                    <span>karim@gmail.com</span>  
                  </div>
                  <a href="dash-profile.html" class="h-[40px] rounded-md bg-[#3C8DBC] hover:bg-[#85C16D] transition-all ease-in-out duration-300 text-white w-auto text-[14px] leading-tight py-[8px] px-[20px] mt-2 flex items-center justify-center">Update Profile</a>
                </div>
              </div>
            </div>

            <div class="dast-std-status w-full p-[20px] rounded-md relative mb-4 bg-[#ADDF98]">
              <h2 class="text-[20px] md:text-[22px] lg:text-[24px] text-black font-semibold mb-2">Student Status</h2>
              <div class="relative w-full grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="flex flex-col w-full rounded-md min-h-[120px] h-full text-black items-center justify-center text-center p-[10px] shadow-sm bg-[#F8FCE9]">
                  <span class="text-[14px] block text-[#686868]">Module Class</span>
                  <span class="text-[20px] font-semibold">25/30</span>
                </div>

                <div class="flex flex-col w-full rounded-md min-h-[120px] h-full text-black items-center justify-center text-center p-[10px] shadow-sm bg-[#ECFAFC]">
                  <span class="text-[14px] block text-[#686868]">Extra Class</span>
                  <span class="text-[20px] font-semibold">25/30</span>
                </div>

                <div class="flex flex-col w-full rounded-md min-h-[120px] h-full text-black items-center justify-center text-center p-[10px] shadow-sm bg-[#F8FCE9]">
                  <span class="text-[14px] block text-[#686868]">Review Class</span>
                  <span class="text-[20px] font-semibold">25/30</span>
                </div>

                <div class="flex flex-col w-full rounded-md min-h-[120px] h-full text-black items-center justify-center text-center p-[10px] shadow-sm bg-[#ECFAFC]">
                  <span class="text-[14px] block text-[#686868]">Present Class</span>
                  <span class="text-[20px] font-semibold">25/30</span>
                </div>

                <div class="flex flex-col w-full rounded-md min-h-[120px] h-full text-black items-center justify-center text-center p-[10px] shadow-sm bg-[#F8FCE9]">
                  <span class="text-[14px] block text-[#686868]">Home Work</span>
                  <span class="text-[20px] font-semibold">25/30</span>
                </div>

                <div class="flex flex-col w-full rounded-md min-h-[120px] h-full text-black items-center justify-center text-center p-[10px] shadow-sm bg-[#ECFAFC]">
                  <span class="text-[14px] block text-[#686868]">Absent Class</span>
                  <span class="text-[20px] font-semibold">25/30</span>
                </div>
              </div>
            </div>
          </div>

          <div class="w-full block">
            <div class="dast-std-status w-full p-[20px] rounded-md relative mb-4 bg-[#ADDF98]">
              <h2 class="text-[20px] md:text-[22px] lg:text-[24px] text-[#000B8C] font-semibold mb-2">Course Status</h2>
              <div class="relative w-full">
                <p class="mb-3 w-full flex flex-wrap text-left text-[16px] text-[#0E0E0E]">
                  <span class="w-[150px] mr-[10px]">Course Name:</span>
                  <span>GovStack Specification Roadmap</span>
                </p>
                <p class="mb-3 w-full flex flex-wrap text-left text-[16px] text-[#0E0E0E]">
                  <span class="w-[150px] mr-[10px]">Batch Name:</span>
                  <span>GovStack Specification Roadmap</span>
                </p>
                <p class="mb-3 w-full flex flex-wrap text-left text-[16px] text-[#0E0E0E]">
                  <span class="w-[150px] mr-[10px]">Class Day:</span>
                  <span>Saturday & Sunday</span>
                </p>
                <p class="mb-3 w-full flex flex-wrap text-left text-[16px] text-[#0E0E0E]">
                  <span class="w-[150px] mr-[10px]">Class Time:</span>
                  <span>5 pm</span>
                </p>
              </div>

              <div class="w-full max-w-[540px] mx-auto block p-0 mt-10">
                <div class="w-full inline-flex gap-6 h-[40px] items-center justify-between py-3 px-4 bg-[#c3eeab] text-[16px] text-[#0E0E0E] rounded-md mb-4">
                  <span>Class Status</span> <span>Ongoing</span>
                </div>
                <div class="w-full inline-flex gap-6 h-[40px] items-center justify-between py-3 px-4 bg-[#c3eeab] text-[16px] text-[#0E0E0E] rounded-md mb-4">
                  <span>Batch Status</span> <span>Online</span>
                </div>
                <div class="w-full inline-flex gap-6 h-[40px] items-center justify-between py-3 px-4 bg-[#c3eeab] text-[16px] text-[#0E0E0E] rounded-md mb-4">
                  <span>Admission Status</span> <span>Active</span>
                </div>
                <div class="w-full inline-flex gap-6 h-[40px] items-center justify-between py-3 px-4 bg-[#c3eeab] text-[16px] text-[#0E0E0E] rounded-md mb-4">
                  <span>Student Status</span> <span>Regular</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="std-progress-sec w-full relative my-10">
          <div class="w-full max-w-[640px] mx-auto relative">
            <div class="w-full relative grid grid-cols-1 lg:grid-cols-2 gap-6">
              <div class="progress-item w-full block">
                <span class="block w-full mb-1 text-base text-gray-600">Complete Module Class</span>
                <div class="w-full bg-[#D9D9D9] rounded-lg overflow-hidden">
                  <div class="bg-[#5DE1E1] text-xs leading-none py-1" style="width: 80%"></div>
                </div>
              </div>

              <div class="progress-item w-full block">
                <span class="block w-full mb-1 text-base text-gray-600">Total Present Class</span>
                <div class="w-full bg-[#D9D9D9] rounded-lg overflow-hidden">
                  <div class="bg-[#5DE1E1] text-xs leading-none py-1" style="width: 50%"></div>
                </div>
              </div>

              <div class="progress-item w-full block">
                <span class="block w-full mb-1 text-base text-gray-600">Total Home Work Submit</span>
                <div class="w-full bg-[#D9D9D9] rounded-lg overflow-hidden">
                  <div class="bg-[#5DE1E1] text-xs leading-none py-1" style="width: 40%"></div>
                </div>
              </div>

              <div class="progress-item w-full block">
                <span class="block w-full mb-1 text-base text-gray-600">Total Absent Class</span>
                <div class="w-full bg-[#D9D9D9] rounded-lg overflow-hidden">
                  <div class="bg-[#5DE1E1] text-xs leading-none py-1" style="width: 25%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection