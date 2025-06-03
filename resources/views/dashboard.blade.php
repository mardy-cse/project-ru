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
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}" />

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/twinput.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <div id="skdDashMainContainer" class="site-dash-main w-full relative transition-all ease-in-out duration-200 pl-0 lg:pl-[270px] pt-[80px] pb-[60px]">
        <div class="fixed menuBodyWrap z-20 inset-0 bg-black opacity-50 transition-opacity hidden"></div>

        @include('layouts.sidebar')
        @include('layouts.header')

        @yield('content')

        @include('layouts.footer')
    </div>

    <!-- JS Libraries -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    

    <!-- Custom Scripts -->
    <script src="{{ asset('js/main-script.js') }}" defer></script>

    <!-- Default DataTable Initialization -->
    <script>
    $(document).ready(function() {
        // Initialize DataTable for #myTable
        if ($('#myTable').length) {
            let table = new DataTable('#myTable');
        }

        // Initialize DataTable for any table with class 'display'
        $('.display').each(function() {
            if (!$.fn.DataTable.isDataTable(this)) {
                let table = new DataTable(this, {
                    responsive: true,
                    lengthChange: true,
                    autoWidth: false,
                    pageLength: 10
                });
            }
        });
    });
    </script>

    <!-- Select2 Init -->
    <script>
        $(document).ready(function () {
            console.log("Select2 initialized");
            $('.select2').select2({
                placeholder: "Select category",
                allowClear: true,
                width: '100%'
            });
        });
    </script>

    <!-- Toastr Configuration -->
    <script>
    toastr.options = {
        "closeButton": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "timeOut": "4000"
    };

    // Custom CSS for width
    $('<style>')
        .prop('type', 'text/css')
        .html(`
            #toast-container.toast-top-center {
                width: 600px !important;
                left: 50% !important;
                margin-left: -300px !important;
            }
            #toast-container > div {
                width: 100% !important;
                padding: 15px 20px !important;
            }
        `)
        .appendTo('head');

    @if(session('success'))
        toastr.success('{{ session('success') }}');
    @endif
    @if(session('error'))
        toastr.error('{{ session('error') }}');
    @endif
    @if(session('warning'))
        toastr.warning('{{ session('warning') }}');
    @endif
    @if(session('info'))
        toastr.info('{{ session('info') }}');
    @endif
    </script>

    <!-- Page Specific Scripts -->
    @yield('scripts')
</body>

</html>
