@include('user_views.trainings.training_course_header')

<div>
    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<main id="mainContent" class="flex-1 overflow-x-hidden overflow-y-auto bg-[#F9FAFC]">>
      <div class="container mx-auto px-6 py-8">
        <div class="dash-trc-content relative w-full block lg:pt-6">
          <div class="trc-cards-sec block w-full max-w-[1140px] mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px] 2xl:gap-[70px]">
              <div class="trc-card-item relative overflow-hidden w-full rounded-[8px] bg-white border-b-[4px] border-[#59A0DD] py-[30px] px-[15px]">
                <span class="trc-card-bg absolute left-0 top-0 block">
                  <svg class="absolute left-0 top-0" xmlns="http://www.w3.org/2000/svg" width="199" height="195" viewBox="0 0 199 195" fill="none">
                    <g opacity="0.2" filter="url(#filter0_f_1142_2591)">
                      <circle cx="20.5" cy="16.5" r="74.5" fill="#59A0DD"/>
                    </g>
                    <defs>
                      <filter id="filter0_f_1142_2591" x="-158" y="-162" width="357" height="357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="52" result="effect1_foregroundBlur_1142_2591"/>
                      </filter>
                    </defs>
                  </svg>
                </span>
                <div class="relative z-10 flex flex-col h-full items-center justify-center text-center">
                  <span class="trc-card-icon h-[30px] w-[30px] flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                      <g clip-path="url(#clip0_1142_2595)">
                        <path d="M14.5 7V0.46C15.4251 0.809335 16.2653 1.35131 16.965 2.05L20.449 5.536C21.1485 6.23488 21.6909 7.07489 22.04 8H15.5C15.2348 8 14.9804 7.89464 14.7929 7.70711C14.6054 7.51957 14.5 7.26522 14.5 7ZM22.5 10.485V19C22.4984 20.3256 21.9711 21.5964 21.0338 22.5338C20.0964 23.4711 18.8256 23.9984 17.5 24H7.5C6.17441 23.9984 4.90356 23.4711 3.96622 22.5338C3.02888 21.5964 2.50159 20.3256 2.5 19V5C2.50159 3.67441 3.02888 2.40356 3.96622 1.46622C4.90356 0.528882 6.17441 0.00158786 7.5 0L12.015 0C12.178 0 12.339 0.013 12.5 0.024V7C12.5 7.79565 12.8161 8.55871 13.3787 9.12132C13.9413 9.68393 14.7044 10 15.5 10H22.476C22.487 10.161 22.5 10.322 22.5 10.485ZM14.5 19C14.5 18.7348 14.3946 18.4804 14.2071 18.2929C14.0196 18.1054 13.7652 18 13.5 18H8.5C8.23478 18 7.98043 18.1054 7.79289 18.2929C7.60536 18.4804 7.5 18.7348 7.5 19C7.5 19.2652 7.60536 19.5196 7.79289 19.7071C7.98043 19.8946 8.23478 20 8.5 20H13.5C13.7652 20 14.0196 19.8946 14.2071 19.7071C14.3946 19.5196 14.5 19.2652 14.5 19ZM17.5 15C17.5 14.7348 17.3946 14.4804 17.2071 14.2929C17.0196 14.1054 16.7652 14 16.5 14H8.5C8.23478 14 7.98043 14.1054 7.79289 14.2929C7.60536 14.4804 7.5 14.7348 7.5 15C7.5 15.2652 7.60536 15.5196 7.79289 15.7071C7.98043 15.8946 8.23478 16 8.5 16H16.5C16.7652 16 17.0196 15.8946 17.2071 15.7071C17.3946 15.5196 17.5 15.2652 17.5 15Z" fill="#59A0DD"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_1142_2595">
                          <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  <h2 class="text-[20px] text-[#474D49] py-1 font-bold capitalize">Total Courses <br>
                {{ $batch->count() }}</h2>
                </h2>
                </div>
              </div>

              <div class="trc-card-item relative overflow-hidden w-full rounded-[8px] bg-white border-b-[4px] border-[#85C16D] py-[30px] px-[15px]">
                <span class="trc-card-bg absolute left-0 top-0 block">
                  <svg xmlns="http://www.w3.org/2000/svg" width="199" height="195" viewBox="0 0 199 195" fill="none">
                    <g opacity="0.2" filter="url(#filter0_f_1142_2600)">
                      <circle cx="20.5" cy="16.5" r="74.5" fill="#85C16D"/>
                    </g>
                    <defs>
                      <filter id="filter0_f_1142_2600" x="-158" y="-162" width="357" height="357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="52" result="effect1_foregroundBlur_1142_2600"/>
                      </filter>
                    </defs>
                  </svg>
                </span>
                <div class="relative z-10 flex flex-col h-full items-center justify-center text-center">
                  <span class="trc-card-icon h-[30px] w-[30px] flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                      <g clip-path="url(#clip0_1142_2604)">
                        <path d="M14.5 7V0.46C15.4251 0.809335 16.2653 1.35131 16.965 2.05L20.449 5.536C21.1485 6.23488 21.6909 7.07489 22.04 8H15.5C15.2348 8 14.9804 7.89464 14.7929 7.70711C14.6054 7.51957 14.5 7.26522 14.5 7ZM22.5 10.485V19C22.4984 20.3256 21.9711 21.5964 21.0338 22.5338C20.0964 23.4711 18.8256 23.9984 17.5 24H7.5C6.17441 23.9984 4.90356 23.4711 3.96622 22.5338C3.02888 21.5964 2.50159 20.3256 2.5 19V5C2.50159 3.67441 3.02888 2.40356 3.96622 1.46622C4.90356 0.528882 6.17441 0.00158786 7.5 0L12.015 0C12.178 0 12.339 0.013 12.5 0.024V7C12.5 7.79565 12.8161 8.55871 13.3787 9.12132C13.9413 9.68393 14.7044 10 15.5 10H22.476C22.487 10.161 22.5 10.322 22.5 10.485ZM14.5 19C14.5 18.7348 14.3946 18.4804 14.2071 18.2929C14.0196 18.1054 13.7652 18 13.5 18H8.5C8.23478 18 7.98043 18.1054 7.79289 18.2929C7.60536 18.4804 7.5 18.7348 7.5 19C7.5 19.2652 7.60536 19.5196 7.79289 19.7071C7.98043 19.8946 8.23478 20 8.5 20H13.5C13.7652 20 14.0196 19.8946 14.2071 19.7071C14.3946 19.5196 14.5 19.2652 14.5 19ZM17.5 15C17.5 14.7348 17.3946 14.4804 17.2071 14.2929C17.0196 14.1054 16.7652 14 16.5 14H8.5C8.23478 14 7.98043 14.1054 7.79289 14.2929C7.60536 14.4804 7.5 14.7348 7.5 15C7.5 15.2652 7.60536 15.5196 7.79289 15.7071C7.98043 15.8946 8.23478 16 8.5 16H16.5C16.7652 16 17.0196 15.8946 17.2071 15.7071C17.3946 15.5196 17.5 15.2652 17.5 15Z" fill="#85C16D"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_1142_2604">
                          <rect width="24" height="24" fill="white" transform="translate(0.5)"/>
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  <h2 class="text-[20px] text-[#474D49] py-1 font-bold capitalize">Total Registration <br> 02</h2>
                </div>
              </div>

              <div class="trc-card-item relative overflow-hidden w-full rounded-[8px] bg-white border-b-[4px] border-[#33DADA] py-[30px] px-[15px]">
                <span class="trc-card-bg absolute left-0 top-0 block">
                  <svg xmlns="http://www.w3.org/2000/svg" width="199" height="195" viewBox="0 0 199 195" fill="none">
                    <g opacity="0.2" filter="url(#filter0_f_1142_2591)">
                      <circle cx="20.5" cy="16.5" r="74.5" fill="#59A0DD"/>
                    </g>
                    <defs>
                      <filter id="filter0_f_1142_2591" x="-158" y="-162" width="357" height="357" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                        <feGaussianBlur stdDeviation="52" result="effect1_foregroundBlur_1142_2591"/>
                      </filter>
                    </defs>
                  </svg>
                </span>
                <div class="relative z-10 flex flex-col h-full items-center justify-center text-center">
                  <span class="trc-card-icon h-[30px] w-[30px] flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <g clip-path="url(#clip0_1142_2613)">
                        <path d="M14 7V0.46C14.9251 0.809335 15.7653 1.35131 16.465 2.05L19.949 5.536C20.6485 6.23488 21.1909 7.07489 21.54 8H15C14.7348 8 14.4804 7.89464 14.2929 7.70711C14.1054 7.51957 14 7.26522 14 7ZM22 10.485V19C21.9984 20.3256 21.4711 21.5964 20.5338 22.5338C19.5964 23.4711 18.3256 23.9984 17 24H7C5.67441 23.9984 4.40356 23.4711 3.46622 22.5338C2.52888 21.5964 2.00159 20.3256 2 19V5C2.00159 3.67441 2.52888 2.40356 3.46622 1.46622C4.40356 0.528882 5.67441 0.00158786 7 0L11.515 0C11.678 0 11.839 0.013 12 0.024V7C12 7.79565 12.3161 8.55871 12.8787 9.12132C13.4413 9.68393 14.2044 10 15 10H21.976C21.987 10.161 22 10.322 22 10.485ZM14 19C14 18.7348 13.8946 18.4804 13.7071 18.2929C13.5196 18.1054 13.2652 18 13 18H8C7.73478 18 7.48043 18.1054 7.29289 18.2929C7.10536 18.4804 7 18.7348 7 19C7 19.2652 7.10536 19.5196 7.29289 19.7071C7.48043 19.8946 7.73478 20 8 20H13C13.2652 20 13.5196 19.8946 13.7071 19.7071C13.8946 19.5196 14 19.2652 14 19ZM17 15C17 14.7348 16.8946 14.4804 16.7071 14.2929C16.5196 14.1054 16.2652 14 16 14H8C7.73478 14 7.48043 14.1054 7.29289 14.2929C7.10536 14.4804 7 14.7348 7 15C7 15.2652 7.10536 15.5196 7.29289 15.7071C7.48043 15.8946 7.73478 16 8 16H16C16.2652 16 16.5196 15.8946 16.7071 15.7071C16.8946 15.5196 17 15.2652 17 15Z" fill="#33DADA"/>
                      </g>
                      <defs>
                        <clipPath id="clip0_1142_2613">
                          <rect width="24" height="24" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                  </span>
                  <h2 class="text-[20px] text-[#474D49] py-1 font-bold capitalize">Achieved Certification <br> 05</h2>
                </div>
              </div>
            </div>
          </div>

          <div class="trc-course-tab-sec relative w-full block mt-10">
            <div x-data="{ tab: 'tabSkdCourseOngoing' }">
              <div class="dash-skd-tab-menu w-full mb-6 lg:mb-10">
                <button x-on:click="tab = 'tabSkdCourseOngoing'" x-bind:class="{ 'tab-active': tab === 'tabSkdCourseOngoing' }" class="tab-btn-item" type="button">
                  <span class="tab-btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                      <path d="M14.8498 2H10.1498C9.10977 2 8.25977 2.84 8.25977 3.88V4.82C8.25977 5.86 9.09977 6.7 10.1398 6.7H14.8498C15.8898 6.7 16.7298 5.86 16.7298 4.82V3.88C16.7398 2.84 15.8898 2 14.8498 2Z" fill="white"/>
                      <path d="M17.74 4.81998C17.74 6.40998 16.44 7.70998 14.85 7.70998H10.15C8.56004 7.70998 7.26004 6.40998 7.26004 4.81998C7.26004 4.25998 6.66004 3.90998 6.16004 4.16998C4.75004 4.91998 3.79004 6.40998 3.79004 8.11998V17.53C3.79004 19.99 5.80004 22 8.26004 22H16.74C19.2 22 21.21 19.99 21.21 17.53V8.11998C21.21 6.40998 20.25 4.91998 18.84 4.16998C18.34 3.90998 17.74 4.25998 17.74 4.81998ZM15.84 12.73L11.84 16.73C11.69 16.88 11.5 16.95 11.31 16.95C11.12 16.95 10.93 16.88 10.78 16.73L9.28004 15.23C8.99004 14.94 8.99004 14.46 9.28004 14.17C9.57004 13.88 10.05 13.88 10.34 14.17L11.31 15.14L14.78 11.67C15.07 11.38 15.55 11.38 15.84 11.67C16.13 11.96 16.13 12.44 15.84 12.73Z" fill="white"/>
                    </svg>
                  </span>
                  <span class="tab-btn-text">Ongoing</span>
                </button>
            
                <button x-on:click="tab = 'tabSkdCourses'"  x-bind:class="{ 'tab-active': tab === 'tabSkdCourses' }" class="tab-btn-item" type="button">
                  <span class="tab-btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                      <path d="M16.5 2H8.5C5 2 3.5 4 3.5 7V17C3.5 20 5 22 8.5 22H16.5C20 22 21.5 20 21.5 17V7C21.5 4 20 2 16.5 2ZM8.5 12.25H12.5C12.91 12.25 13.25 12.59 13.25 13C13.25 13.41 12.91 13.75 12.5 13.75H8.5C8.09 13.75 7.75 13.41 7.75 13C7.75 12.59 8.09 12.25 8.5 12.25ZM16.5 17.75H8.5C8.09 17.75 7.75 17.41 7.75 17C7.75 16.59 8.09 16.25 8.5 16.25H16.5C16.91 16.25 17.25 16.59 17.25 17C17.25 17.41 16.91 17.75 16.5 17.75ZM19 9.25H17C15.48 9.25 14.25 8.02 14.25 6.5V4.5C14.25 4.09 14.59 3.75 15 3.75C15.41 3.75 15.75 4.09 15.75 4.5V6.5C15.75 7.19 16.31 7.75 17 7.75H19C19.41 7.75 19.75 8.09 19.75 8.5C19.75 8.91 19.41 9.25 19 9.25Z" fill="#59A0DD"/>
                    </svg>
                  </span>
                  <span class="tab-btn-text">Courses</span>
                </button>
            
                <button x-on:click="tab = 'tabSkdMyCourse'" x-bind:class="{ 'tab-active': tab === 'tabSkdMyCourse' }" class="tab-btn-item" type="button">
                  <span class="tab-btn-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="20" viewBox="0 0 17 20" fill="none">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M5.12871 10.99C5.12871 11.4 5.46535 11.73 5.87129 11.73H10.7624C11.1683 11.73 11.505 11.4 11.505 10.99C11.505 10.57 11.1683 10.24 10.7624 10.24H5.87129C5.46535 10.24 5.12871 10.57 5.12871 10.99ZM15.8381 7.02561C16.0708 7.02292 16.3242 7.02 16.5545 7.02C16.802 7.02 17 7.22 17 7.47V15.51C17 17.99 15.0099 20 12.5446 20H4.67327C2.09901 20 0 17.89 0 15.29V4.51C0 2.03 2 0 4.46535 0H9.75247C10.0099 0 10.2079 0.21 10.2079 0.46V3.68C10.2079 5.51 11.703 7.01 13.5149 7.02C13.9381 7.02 14.3112 7.02316 14.6377 7.02593C14.8917 7.02809 15.1175 7.03 15.3168 7.03C15.4578 7.03 15.6405 7.02789 15.8381 7.02561ZM16.11 5.5662C15.2961 5.5692 14.3367 5.5662 13.6466 5.5592C12.5516 5.5592 11.6496 4.6482 11.6496 3.5422V0.9062C11.6496 0.4752 12.1674 0.2612 12.4635 0.5722C12.9995 1.1351 13.7361 1.90891 14.4693 2.67913C15.2002 3.44689 15.9277 4.21108 16.4496 4.7592C16.7387 5.0622 16.5268 5.5652 16.11 5.5662Z" fill="#59A0DD"/>
                    </svg>
                  </span>
                  <span class="tab-btn-text">My Course</span>
                </button>
              </div>
            
              <div class="skd-tab-content relative w-full block">

                <div x-show="tab === 'tabSkdCourseOngoing'" class="tab-content-block">
  <div class="tab-main-content relative w-full block">
    <div class="relative w-full block mb-6">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px] w-full">
        @foreach($batch as $batch)
        <div class="trc-course-item relative overflow-hidden w-full rounded-[8px] bg-white border border-[#85C16D] pt-[10px] px-[10px] pb-[70px]">
          <div class="relative z-10 flex flex-col h-full items-start justify-start text-center">
            <div class="trc-course-item-img h-[175px] block w-full mb-4">
              <img src="{{ asset('storage/' . ($batch->training->course_thumbnail ?? 'assets/images/dash-course-img.png')) }}" alt="Training Image" class="w-full h-full object-cover">


            
            </div>
            <div class="trc-course-item-desc w-full block relative">
              <div class="skd-course-desc flex items-start justify-center flex-col w-full text-left text-[#000000]">
                <div class="flex flex-col gap-2 flex-wrap mb-2 w-full">
                  <div class="relative pl-[24px] inline-block mr-4">
                    <span class="absolute left-0 top-[2px] h-[16px] w-[16px] bg-[#00A65A] rounded-sm block"></span>
                    <p class="text-[13px] leading-3 flex min-h-[20px] items-center text-left">
                      Durations: {{ \Carbon\Carbon::parse($batch->start_date)->format('d-M-Y') }} to {{ \Carbon\Carbon::parse($batch->end_date)->format('d-M-Y') }}
                    </p>
                  </div>
                  <div class="relative pl-[24px] inline-block mr-4">
                    <span class="absolute left-0 top-[2px] h-[16px] w-[16px] bg-[#00A65A] rounded-sm block"></span>
                    <p class="text-[13px] leading-3 flex min-h-[20px] items-center text-left">
                      Total Hours: {{ $batch->class_duration }}
                    </p>
                  </div>
                </div>
                <h2 class="text-[15px] md:text-[16px] leading-2 mt-1 font-medium">{{ $batch->training->name}}</h2>
    
                <p class="text-[14px] leading-5 py-1 text-left w-full">Batch: {{ $batch->name }}</p>
                <p class="text-[14px] leading-5 py-1 text-left w-full">
  Status: {{ $batch->batch_status == 1 ? 'ONGOING' : ($batch->batch_status == 0 ? 'COMPLETE' : 'PENDING') }}
</p>

                <p class="text-[14px] leading-5 py-1 text-left w-full">Training Medium: {{ $batch->venue  }}</p>
                <p class="text-[14px] leading-5 py-1 text-left w-full text-[#892626]">Registration Ends: {{ \Carbon\Carbon::parse($batch->enrollment_deadline)->format('d-M-Y') }}</p>
                
                {{-- Enrollment Status for logged in users --}}
                @if(Auth::check())
                    @php
                        $isEnrolled = \App\Models\TrainingParticipant::where('batch_id', $batch->id)
                            ->where('email', Auth::user()->email)
                            ->exists();
                    @endphp
                    @if($isEnrolled)
                        <div class="mt-2">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="fas fa-check-circle mr-1"></i>
                                Enrolled
                            </span>
                        </div>
                    @endif
                @endif
              </div>
            </div>
          </div>
         <a class="h-[40px] absolute bottom-[10px] right-[10px] rounded-lg bg-[#00A65A] hover:bg-[#3C8DBC] transition-all ease-in-out duration-300 text-white flex items-center justify-center gap-2 w-full max-w-[170px] md:w-[140px] text-[16px] py-2 px-4" 
            href="{{ Auth::check() ? route('userCourse.view', $batch->id) : route('course.view', $batch->id) }}">
    <span class="text-[16px]">View</span>
    <span class="inline-block">
        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 19.7498C15.608 19.7498 19.75 15.6088 19.75 10.4998C19.75 5.39182 15.608 1.24982 10.5 1.24982C5.392 1.24982 1.25 5.39182 1.25 10.4998C1.25 15.6088 5.392 19.7498 10.5 19.7498Z" stroke="#F9FAFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M9.05762 13.971L12.5436 10.5L9.05762 7.02901" stroke="#F9FAFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        </svg>
    </span>
</a>

        </div>
        @endforeach

      </div>
    </div>
  </div>
</div>

                <div x-show="tab === 'tabSkdCourses'" class="tab-content-block">
                  <div class="tab-main-content relative w-full block">
                    <div class="relative w-full block mb-6">
                      <div class="grid grid-cols-1 md:grid-cols-2 gap-[20px] w-full max-w-[440px] md:max-w-[880px] mx-auto">
    @foreach($trainingCategory as $category)
        <div class="course-list-item">
            <a href="#">
                {{ $category->category_name }}
                <span class="text-red-600 font-bold mr-1">
                    {{ $category->trainings->count() }}
                </span>
            </a>
        </div>
    @endforeach
</div>

                    </div>
                  </div>
                </div>
            
                <div x-show="tab === 'tabSkdMyCourse'" class="tab-content-block">
                  <div class="tab-main-content relative w-full block">
                    <div class="relative w-full block mb-6">
                      @if(Auth::check() && isset($enrolledBatches) && $enrolledBatches->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-[30px] w-full">
                          @foreach($enrolledBatches as $enrolledBatch)
                            @php
                              // Get user's enrollment status for this batch
                              $userEnrollment = $enrolledBatch->trainingParticipants->where('email', Auth::user()->email)->first();
                              $enrollmentStatus = $userEnrollment ? ($userEnrollment->status ? 'Approved' : 'Pending') : 'Unknown';
                              $statusColor = $userEnrollment && $userEnrollment->status ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800';
                              $statusIcon = $userEnrollment && $userEnrollment->status ? 'fas fa-check-circle' : 'fas fa-clock';
                            @endphp
                            <div class="trc-course-item relative overflow-hidden w-full rounded-[8px] bg-white border border-[#28a745] pt-[10px] px-[10px] pb-[70px]">
                              <div class="relative z-10 flex flex-col h-full items-start justify-start text-center">
                                <div class="trc-course-item-img h-[175px] block w-full mb-4">
                                  <img src="{{ asset('storage/' . ($enrolledBatch->training->course_thumbnail ?? 'assets/images/dash-course-img.png')) }}" alt="Training Image" class="w-full h-full object-cover">
                                </div>
                                <div class="trc-course-item-desc w-full block relative">
                                  <div class="skd-course-desc flex items-start justify-center flex-col w-full text-left text-[#000000]">
                                    <div class="flex items-center justify-between w-full mb-2">
                                      <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ $statusColor }}">
                                        <i class="{{ $statusIcon }} mr-1"></i>
                                        {{ $enrollmentStatus }}
                                      </span>
                                    </div>
                                    <div class="flex flex-col gap-2 flex-wrap mb-2 w-full">
                                      <div class="relative pl-[24px] inline-block mr-4">
                                        <span class="absolute left-0 top-[2px] h-[16px] w-[16px] bg-[#00A65A] rounded-sm block"></span>
                                        <p class="text-[13px] leading-3 flex min-h-[20px] items-center text-left">
                                          Durations: {{ \Carbon\Carbon::parse($enrolledBatch->start_date)->format('d-M-Y') }} to {{ \Carbon\Carbon::parse($enrolledBatch->end_date)->format('d-M-Y') }}
                                        </p>
                                      </div>
                                      <div class="relative pl-[24px] inline-block mr-4">
                                        <span class="absolute left-0 top-[2px] h-[16px] w-[16px] bg-[#00A65A] rounded-sm block"></span>
                                        <p class="text-[13px] leading-3 flex min-h-[20px] items-center text-left">
                                          Total Hours: {{ $enrolledBatch->class_duration }}
                                        </p>
                                      </div>
                                    </div>
                                    <h2 class="text-[15px] md:text-[16px] leading-2 mt-1 font-medium">{{ $enrolledBatch->training->name }}</h2>
                                    <p class="text-[14px] leading-5 py-1 text-left w-full">Batch: {{ $enrolledBatch->name }}</p>
                                    <p class="text-[14px] leading-5 py-1 text-left w-full">
                                      Status: {{ $enrolledBatch->batch_status == 1 ? 'ONGOING' : ($enrolledBatch->batch_status == 0 ? 'COMPLETE' : 'PENDING') }}
                                    </p>
                                    <p class="text-[14px] leading-5 py-1 text-left w-full">Training Medium: {{ $enrolledBatch->venue }}</p>
                                    <p class="text-[14px] leading-5 py-1 text-left w-full text-[#892626]">Registration Ends: {{ \Carbon\Carbon::parse($enrolledBatch->enrollment_deadline)->format('d-M-Y') }}</p>
                                  </div>
                                </div>
                              </div>
                              <a class="h-[40px] absolute bottom-[10px] right-[10px] rounded-lg bg-[#28a745] hover:bg-[#1e7e34] transition-all ease-in-out duration-300 text-white flex items-center justify-center gap-2 w-full max-w-[170px] md:w-[140px] text-[16px] py-2 px-4" 
                                 href="{{ route('userCourse.view', $enrolledBatch->id) }}">
                                <span class="text-[16px]">View Course</span>
                                <span class="inline-block">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.5 19.7498C15.608 19.7498 19.75 15.6088 19.75 10.4998C19.75 5.39182 15.608 1.24982 10.5 1.24982C5.392 1.24982 1.25 5.39182 1.25 10.4998C1.25 15.6088 5.392 19.7498 10.5 19.7498Z" stroke="#F9FAFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.05762 13.971L12.5436 10.5L9.05762 7.02901" stroke="#F9FAFC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                  </svg>
                                </span>
                              </a>
                            </div>
                          @endforeach
                        </div>
                      @else
                        <div class="text-center py-8">
                          <div class="mb-4">
                            <i class="fas fa-graduation-cap text-6xl text-gray-300"></i>
                          </div>
                          <h3 class="text-lg font-medium text-gray-900 mb-2">No Enrolled Courses</h3>
                          <p class="text-gray-500 mb-4">You haven't enrolled in any courses yet.</p>
                          @if(Auth::check())
                            <button x-on:click="tab = 'tabSkdCourseOngoing'" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-[#00A65A] hover:bg-[#3C8DBC] transition-all ease-in-out duration-300">
                              <i class="fas fa-search mr-2"></i>
                              Browse Courses
                            </button>
                          @else
                            <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-[#00A65A] hover:bg-[#3C8DBC] transition-all ease-in-out duration-300">
                              <i class="fas fa-sign-in-alt mr-2"></i>
                              Login to Enroll
                            </a>
                          @endif
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
</div>