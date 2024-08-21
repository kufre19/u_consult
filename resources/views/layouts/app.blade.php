<!doctype html>
<html lang="en" data-bs-theme="semi-dark">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png">


    <!--plugins-->
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link
        href="{{ asset('assets/fonts.googleapis.com/css2ab59.css?family=Noto+Sans:wght@300;400;500;600&amp;display=swap') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/fonts.googleapis.com/cssf511.css?family=Material+Icons+Outlined') }}" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/blue-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('sass/responsive.css') }}" rel="stylesheet">
    @stack('extra-style')

</head>

<body>



    {{-- dashboard header starts --}}
    @extends('layouts.dashboard-header')

    {{-- dashboard header ends --}}

    {{-- navigation start --}}
    @extends('layouts.side-nav')
    {{-- navigation end --}}

    <!--start main wrapper-->
    @yield('main-content')
    <!--end main wrapper-->


    <!--start footer-->
    {{-- <footer class="page-footer mt-6">
        <p class="mb-0">Copyright © 2024. All right reserved.</p>
    </footer> --}}
    <!--end footer-->



    <!--bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!--plugins-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/metisMenu.min.js') }}"></script>

    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard1.js') }}"></script>
    {{-- <script>
        new PerfectScrollbar(".user-list")
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const logoutLinks = document.querySelectorAll('a[href="{{ route('logout') }}"]');
            logoutLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('logout-form').submit();
                });
            });
        });
    </script>

    @stack('extra-js')



</body>


</html>
