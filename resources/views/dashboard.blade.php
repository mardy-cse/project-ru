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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.css">

</head>

<body>

  <div id="skdDashMainContainer" class="site-dash-main w-full relative transition-all ease-in-out duration-200 pl-0 lg:pl-[270px] pt-[80px] pb-[60px]">
    <div class="fixed menuBodyWrap z-20 inset-0 bg-black opacity-50 transition-opacity hidden"></div>

    @include('layouts.sidebar')
    @include('layouts.header')

    @yield('content')

    @include('layouts.footer')

  </div>

  <!-- jQuery (must load first) -->
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  
  <!-- DataTables JS -->
  {{-- <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script> --}}
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  
  <!-- Custom JS -->
  <script src="./assets/js/main-script.js"></script>
  <script src="{{ asset('js/main-script.js') }}" defer></script>

  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.js"></script>
  <script>
    	
let table = new DataTable('#myTable');
  </script>
</body>

</html>