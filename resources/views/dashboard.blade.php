{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="bn" class="no-js">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard | BA Skill Development</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="skill-development" />
    <meta name="keywords" content="Skill Development framework">
    <meta name="description" content="One Stop Service is an online platform integrating relevant Government agencies for providing efficient and transparent services to domestic and foreign investors" />

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />

    <!-- Fav icon -->
    <link rel="shortcut icon" type="image/png" href="./assets/images/favicon.ico" />

    <!-- CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/twinput.css') }}">
    
    

</head>

<body>

  <div id="skdDashMainContainer" class="site-dash-main w-full relative transition-all ease-in-out duration-200 pl-0 lg:pl-[270px] pt-[80px] pb-[60px]">
    <div class="fixed menuBodyWrap z-20 inset-0 bg-black opacity-50 transition-opacity hidden"></div>

    @include('layouts.sidebar')
    @include('layouts.header')

    @yield('content')



    @include('layouts.footer')

  </div>

  <script src="./assets/js/main-script.js"></script>
<script src="{{ asset('js/main-script.js') }}" defer></script>
</body>

</html>