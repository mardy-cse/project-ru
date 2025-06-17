@include('user_views.trainings.training_course_header')

<div>
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

      <main id="mainContent" class="skd-course-view flex-1 overflow-x-hidden overflow-y-auto bg-[#F9FAFC]">
      <div class="container mx-auto px-6 py-8">
        <div class="flex flex-wrap w-full gap-[20px] lg:flex-nowrap">
          <div class="skd-card-col flex flex-col flex-wrap gap-[20px] relative w-full md:min-w-[340px] max-w-[400px]">
            <div class="trc-course-item relative w-full rounded-[8px] bg-white border border-[#85C16D] py-[10px] px-[10px]">
              <div class="relative z-10 flex flex-col h-full items-start justify-start text-center pb-[20px]">
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
                    <h2 class="text-[15px] md:text-[16px] leading-2 mt-1 font-medium">{{ $batch->training->name }}</h2>
                    <p class="text-[14px] leading-5 py-1 text-left w-full">Batch: {{ $batch->name }}</p>
                    <p class="text-[14px] leading-5 py-1 text-left w-full">
                      Status: {{ $batch->batch_status == 1 ? 'ONGOING' : ($batch->batch_status == 0 ? 'COMPLETE' : 'PENDING') }}
                    </p>
                    <p class="text-[14px] leading-5 py-1 text-left w-full">Training Medium: {{ $batch->venue }}</p>
                    <p class="text-[14px] leading-5 py-1 text-left w-full text-[#892626]">
                      Registration Ends: {{ \Carbon\Carbon::parse($batch->enrollment_deadline)->format('d-M-Y') }}
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="trc-course-item relative w-full rounded-[8px] bg-white border border-[#85C16D] py-[10px] px-[10px]">
              <div class="relative z-10 flex flex-col h-full items-start justify-start text-center pb-[20px]">
                <div class="trc-course-item-img h-[200px] block w-full mb-4">
               
                  <img src="{{ asset('storage/' . ($batch->speaker->profile_image ?? 'assets/images/dash-course-img.png')) }}" alt="Training Image" class="w-full h-full object-cover">
                </div>
                <div class="trc-course-item-desc w-full block relative">
                  <div class="skd-course-desc flex items-start justify-center flex-col w-full text-left text-[#000000]">
                    <h2 class="text-[15px] md:text-[16px] leading-2 mt-1 font-medium">Trainer Information</h2>
                    {{-- <p class="text-[14px] leading-5 py-1 text-left w-full">{{$batch->speaker->name}}</p> --}}
                    {{-- <p class="text-[14px] leading-5 py-1 text-left w-full">Designation: {{ $batch->speaker->designation }}</p> --}}
              
<p class="text-[14px] leading-5 py-1 text-left w-full">
    Specialization: 
    @if(isset($batch->speaker->category_names) && count($batch->speaker->category_names) > 0)
        {{ implode(', ', $batch->speaker->category_names) }}
    @else
        N/A
    @endif
</p>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="skd-card-col flex flex-col flex-wrap gap-[20px] relative w-full md:min-w-[350px]">
           <div class="trc-course-item relative w-full rounded-[8px] bg-white border border-[#85C16D] py-[10px] px-[10px]">

  <div class="w-full mb-4">
    <h3 class="text-[#85C16D] text-[18px] font-normal mb-1">Overview</h3>
    <div class="text-[14px] leading-5 pb-2 text-left w-full">
      {!! $batch->training->training_overview ?? '<p>No specific requirements</p>' !!}
    </div>
  </div>

  <div class="w-full mb-4">
    <h3 class="text-[#85C16D] text-[18px] font-normal mb-1">This Course is Best Suited For</h3>
    <div class="text-[14px] leading-5 pb-2 text-left w-full">
      {!! $batch->training->course_qualification ?? '<p>No description available</p>' !!}
    </div>
  </div>

  <div class="w-full mb-4">
    <h3 class="text-[#85C16D] text-[18px] font-normal mb-1">Why Join</h3>
    <div class="text-[14px] leading-5 pb-2 text-left w-full">
      {!! $batch->training->training_objective ?? '<p>No course outline available</p>' !!}
    </div>
  </div>

  <div class="w-full mb-4">
    <h3 class="text-[#85C16D] text-[18px] font-normal mb-1">What You'll Learn</h3>
    <div class="text-[14px] leading-5 pb-2 text-left w-full">
      {!! $batch->training->training_objective ?? '<p>No course outline available</p>' !!}
    </div>
  </div>

</div>


            <div class="trc-course-item relative w-full rounded-[8px] bg-white border border-[#85C16D] py-[10px] px-[10px]">
              <div class="w-full mb-1">
                <h3 class="text-[#85C16D] text-[18px] font-normal mb-2">Training Schedule</h3>
                <div class="skd-table-content w-full block relative mx-auto">
                  <div class="skd-table relative overflow-x-auto">
                    <table class="w-full text-[12px] xl:text-[13px] text-center text-[#545D69] min-w-[580px]">
                      <thead>
                        <tr class="bg-[#F0F0F0] font-normal align-baseline text-[#000000]">
                          <th class="px-3 py-2 2xl:py-3 font-normal align-middle w-[80px]">
                            <div class="th-title flex items-center justify-center text-center h-full w-full">Day</div>
                          </th>
                          <th class="px-3 py-2 2xl:py-3 font-normal align-middle">
                            <div class="th-title flex items-center justify-center text-center h-full w-full">Time</div>
                          </th>
                          <th class="px-3 py-2 2xl:py-3 font-normal align-middle">
                            <div class="th-title flex items-center justify-center text-center h-full w-full">Location</div>
                          </th>
                          <th class="px-3 py-2 2xl:py-3 font-normal align-middle" width="100">
                            <div class="th-title flex items-center justify-center text-center h-full w-full">Seats</div>
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="bg-[#FCFCFC]">
                          <td class="text-center">{{ $batch->session_day ?? 'Sunday' }}</td>
                          <td class="text-center">
  {{ ($batch->start_time ?? '04:00 PM') . ' to ' . ($batch->end_time ?? '05:00 PM') }}</td>

                          <td class="text-center">{{ $batch->venue ?? 'Online' }}</td>
                          <td class="text-center">{{ $batch->seat_capacity ?? '85' }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="w-full mb-4">
              <div class="adm-enroll-box w-full max-w-[620px] rounded-md p-[20px] lg:px-[30px] flex flex-col flex-wrap relative text-[#686868] bg-[#DBF5D0]">
                <div class="block w-full text-left mb-6 relative">
                  <h2 class="text-[#3C8DBC] text-[20px] font-semibold">Admission Is Going On</h2>
                  <p class="text-[15px] text-lh-1_5">Enroll now to {{ $batch->training->name }} courses as per your suitable time.</p>
                </div>
                <div class="flex relative flex-nowrap items-center justify-between w-full max-w-[280px] mx-auto rounded-md bg-[#ADDF98] hover:bg-[#37BABB] p-[16px] transition-all ease-in-out duration-300 text-[#000B8C] hover:text-[#ffffff] overflow-hidden">
                  <span class="absolute top-0 right-[40px] h-full flex items-center justify-center">
                    <svg class="h-[126px] w-[140px]" xmlns="http://www.w3.org/2000/svg" width="140" height="126" viewBox="0 0 140 126" fill="none">
                      <circle opacity="0.08" cx="52.3249" cy="27.2692" r="44.7692" stroke="white" stroke-width="15"/>
                      <circle opacity="0.08" cx="87.1716" cy="73.7311" r="44.7692" stroke="white" stroke-width="15"/>
                    </svg>
                  </span>
                  <div class="block relative">
                    <p class="text-[15px] text-lh-1_5">Course Fee {{ $batch->venue }} <br>BDT {{ $batch->course_fee ?? '5,000' }}</p>
                    <a href="{{ route('login') }}"
   class="flex items-center justify-center py-[5px] px-[15px] bg-[#F9FAFC] text-[16px] leading-tight text-[#000B8C] font-normal rounded-md mt-4 h-[40px] hover:bg-[#00A65A] hover:text-[#ffffff] transition-all ease-in-out duration-300">
   Enroll Now
</a>

                  </div>
                  <div class="flex relative items-center justify-center p-[10px] min-w-[50px] h-[50px] w-[50px] rounded-full bg-[#F3FFEE]">
                    <svg class="w-[24px]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <g clip-path="url(#clip0_19_1233)">
                        <path d="M23.181 6.3338C22.7804 6.07627 22.3035 5.99016 21.8382 6.09136C21.3728 6.19256 20.9747 6.46889 20.7172 6.86948L20.3328 7.46761L18.0914 10.9544V0.46875C18.0914 0.209906 17.8815 0 17.6227 0H0.46875C0.209859 0 0 0.209906 0 0.46875V17.4169C0 17.6757 0.209859 17.8856 0.46875 17.8856C0.727641 17.8856 0.9375 17.6757 0.9375 17.4169V0.9375H17.1539V12.4128L14.3207 16.8202C14.2889 16.8694 14.266 16.927 14.2548 16.9845L13.8953 18.8383C13.7105 18.7709 13.4985 18.7525 13.2745 18.7943C12.9407 18.8567 12.6293 19.0127 12.3557 19.2199C12.3456 19.0625 12.3307 18.904 12.3121 18.7335C12.2602 18.2565 12.0504 17.8693 11.7214 17.6433C11.0354 17.1723 10.2048 17.7262 9.93183 17.9081C9.04809 18.4974 8.28923 19.3335 7.73723 20.3259C7.61137 20.5522 7.6928 20.8376 7.91906 20.9634C7.9912 21.0036 8.06939 21.0226 8.14645 21.0226C8.31108 21.0226 8.47083 20.9357 8.55656 20.7816C9.03637 19.9189 9.69178 19.195 10.452 18.6882C10.9862 18.3319 11.1525 18.39 11.1907 18.4162C11.3311 18.5125 11.37 18.7411 11.3802 18.8349C11.4407 19.3914 11.4573 19.7838 11.3877 20.509C11.3659 20.7353 11.5097 20.9446 11.7288 21.0054C11.9479 21.0664 12.179 20.9611 12.2771 20.7561C12.4916 20.3078 12.9622 19.8064 13.4468 19.7159C13.5435 19.6979 13.5975 19.7156 13.6075 19.7674C13.6213 19.8506 13.6085 20.1682 13.5802 20.463C13.5021 20.8918 14.0095 21.1898 14.3413 20.9149L17.154 18.9081V23.0625H0.9375V21.5419C0.9375 21.283 0.727641 21.0731 0.46875 21.0731C0.209859 21.0731 0 21.283 0 21.5419V23.5312C0 23.7901 0.209859 24 0.46875 24H17.6227C17.8815 24 18.0914 23.7901 18.0914 23.5312V17.5485L23.3323 9.39567L23.7167 8.79755C24.2482 7.97058 24.008 6.86536 23.181 6.3338ZM21.5059 7.37639C21.7549 6.98902 22.2861 6.87309 22.674 7.12242C23.0662 7.37447 23.1801 7.89853 22.9281 8.29064L22.7971 8.49445L21.3749 7.5802L21.5059 7.37639ZM14.7239 19.4901L15.0155 17.9865L15.0435 17.8422L15.567 18.1786L16.0904 18.5151L15.6215 18.8497L14.7239 19.4901ZM17.229 17.1564C17.2288 17.1567 17.2285 17.157 17.2283 17.1573L16.785 17.847L15.3629 16.9329L18.017 12.8042C18.0174 12.8035 18.0177 12.8028 18.0181 12.8021L20.8679 8.36883L22.2901 9.28308L17.229 17.1564Z" fill="url(#paint0_linear_19_1233)"/>
                        <path d="M8.80088 2.19995H3.58496C3.32607 2.19995 3.11621 2.40986 3.11621 2.6687V8.58981C3.11621 8.84865 3.32607 9.05856 3.58496 9.05856H8.80088C9.05977 9.05856 9.26963 8.84865 9.26963 8.58981V2.6687C9.26963 2.40981 9.05977 2.19995 8.80088 2.19995ZM8.33213 3.13745V6.49244C8.07329 6.28787 7.78862 6.14528 7.51309 6.04604C7.67823 5.79629 7.7747 5.49737 7.7747 5.17619C7.7747 4.30403 7.0651 3.59444 6.1929 3.59444C5.32074 3.59444 4.61115 4.30403 4.61115 5.17619C4.61115 5.497 4.70743 5.79564 4.87224 6.04525C4.5969 6.14439 4.31241 6.2868 4.05371 6.49122V3.13745H8.33213ZM6.19313 5.82025C6.19196 5.82025 6.19023 5.8202 6.18896 5.8202C5.83552 5.81805 5.54865 5.53004 5.54865 5.17614C5.54865 4.82092 5.83768 4.53189 6.1929 4.53189C6.54816 4.53189 6.8372 4.82092 6.8372 5.17614C6.8372 5.53019 6.55009 5.81828 6.19646 5.8202C6.19548 5.82025 6.19407 5.82025 6.19313 5.82025ZM4.09763 8.12106C4.16321 7.7994 4.30271 7.53756 4.51904 7.3277C5.12846 6.73647 6.15493 6.75705 6.17687 6.75761C6.17851 6.75765 6.18015 6.75756 6.18184 6.75761C6.18554 6.75761 6.1892 6.75789 6.19295 6.75789C6.19712 6.75789 6.2012 6.75761 6.20532 6.75756C6.20682 6.75751 6.20832 6.75761 6.20982 6.75756C6.22009 6.75779 7.25345 6.73708 7.8639 7.32606C8.08168 7.53615 8.22216 7.79861 8.28812 8.12106H4.09763Z" fill="url(#paint1_linear_19_1233)"/>
                        <path d="M11.4795 4.06958H14.9189C15.1778 4.06958 15.3877 3.85967 15.3877 3.60083C15.3877 3.34199 15.1778 3.13208 14.9189 3.13208H11.4795C11.2206 3.13208 11.0107 3.34199 11.0107 3.60083C11.0107 3.85967 11.2206 4.06958 11.4795 4.06958Z" fill="url(#paint2_linear_19_1233)"/>
                        <path d="M11.4795 6.12988H14.9189C15.1778 6.12988 15.3877 5.91998 15.3877 5.66113C15.3877 5.40229 15.1778 5.19238 14.9189 5.19238H11.4795C11.2206 5.19238 11.0107 5.40229 11.0107 5.66113C11.0107 5.91998 11.2206 6.12988 11.4795 6.12988Z" fill="url(#paint3_linear_19_1233)"/>
                        <path d="M11.4795 8.18994H14.9189C15.1778 8.18994 15.3877 7.98004 15.3877 7.72119C15.3877 7.46235 15.1778 7.25244 14.9189 7.25244H11.4795C11.2206 7.25244 11.0107 7.46235 11.0107 7.72119C11.0107 7.98004 11.2206 8.18994 11.4795 8.18994Z" fill="url(#paint4_linear_19_1233)"/>
                        <path d="M3.20508 10.7952V13.1017C3.20508 13.3605 3.41494 13.5704 3.67383 13.5704H14.9189C15.1777 13.5704 15.3876 13.3605 15.3876 13.1017V10.7952C15.3876 10.5363 15.1777 10.3264 14.9189 10.3264H3.67383C3.41494 10.3264 3.20508 10.5363 3.20508 10.7952ZM4.14258 11.2639H14.4501V12.6329H4.14258V11.2639Z" fill="url(#paint5_linear_19_1233)"/>
                        <path d="M10.7732 15.4128C10.7732 15.154 10.5633 14.9441 10.3044 14.9441H3.83887C3.57998 14.9441 3.37012 15.154 3.37012 15.4128C3.37012 15.6717 3.57998 15.8816 3.83887 15.8816H10.3045C10.5633 15.8816 10.7732 15.6717 10.7732 15.4128Z" fill="url(#paint6_linear_19_1233)"/>
                        <path d="M3.83887 16.9089C3.57998 16.9089 3.37012 17.1188 3.37012 17.3777C3.37012 17.6365 3.57998 17.8464 3.83887 17.8464H6.88316C7.14205 17.8464 7.35191 17.6365 7.35191 17.3777C7.35191 17.1188 7.14205 16.9089 6.88316 16.9089H3.83887Z" fill="url(#paint7_linear_19_1233)"/>
                        <path d="M0.0797892 19.7588C0.221492 19.9715 0.517039 20.0291 0.729477 19.8882C0.942477 19.7469 0.999899 19.4502 0.858852 19.2381C0.717524 19.0255 0.421133 18.9675 0.209164 19.1087C-0.00482015 19.2512 -0.0598514 19.5454 0.0797892 19.7588Z" fill="url(#paint8_linear_19_1233)"/>
                      </g>
                      <defs>
                        <linearGradient id="paint0_linear_19_1233" x1="-0.361895" y1="13.6216" x2="23.9999" y2="13.6921" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_19_1233" x1="3.02342" y1="6.09268" x2="9.26978" y2="6.10889" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <linearGradient id="paint2_linear_19_1233" x1="10.9447" y1="3.66417" x2="15.387" y2="3.72417" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <linearGradient id="paint3_linear_19_1233" x1="10.9447" y1="5.72448" x2="15.387" y2="5.78448" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <linearGradient id="paint4_linear_19_1233" x1="10.9447" y1="7.78454" x2="15.387" y2="7.84453" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <linearGradient id="paint5_linear_19_1233" x1="3.02137" y1="12.1676" x2="15.3865" y2="12.302" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <linearGradient id="paint6_linear_19_1233" x1="3.25848" y1="15.4762" x2="10.7695" y2="15.6478" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <linearGradient id="paint7_linear_19_1233" x1="3.31007" y1="17.441" x2="7.35142" y2="17.4907" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <linearGradient id="paint8_linear_19_1233" x1="-0.0111415" y1="19.5615" x2="0.936096" y2="19.5642" gradientUnits="userSpaceOnUse">
                          <stop stop-color="#CDFCBA"/>
                          <stop offset="1" stop-color="#ADDF98"/>
                        </linearGradient>
                        <clipPath id="clip0_19_1233">
                          <rect width="24" height="24" fill="white"/>
                        </clipPath>
                      </defs>
                    </svg>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>

</div>