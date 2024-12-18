<!doctype html>
<html lang="en" data-bs-theme="semi-dark">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    @stack('extra-style')

    <style>
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #preloaderVisibleBg {
            /* display: none; */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #00000010;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        
        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #003366;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>

</head>

<body>
    {{-- @include('sweetalert::alert') --}}

    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <div id="preloaderVisibleBg">
        <div class="spinner"></div>
    </div>

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
    @include('components.create-invoice-modal')
    @include('components.create-client-modal')

    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            const iconLink = document.querySelector('link[href*="Material+Icons+Outlined"]');
            const mainStyleLink = document.querySelector('link[href*="main.css"]');
            const bootstrapStyleLink = document.querySelector('link[href*="bootstrap-extended.css"]');

            let loadedCount = 0;
            const totalStylesheets = 3; // Number of stylesheets we're waiting for

            function incrementLoadCount() {
                loadedCount++;
                if (loadedCount === totalStylesheets) {
                    preloader.style.display = 'none';
                }
            }

            if (iconLink && mainStyleLink && bootstrapStyleLink) {
                iconLink.addEventListener('load', incrementLoadCount);
                mainStyleLink.addEventListener('load', incrementLoadCount);
                bootstrapStyleLink.addEventListener('load', incrementLoadCount);

                // Fallback: hide preloader after 5 seconds if stylesheets don't load
                setTimeout(function() {
                    preloader.style.display = 'none';
                }, 5000);
            } else {
                // If any of the stylesheet links are not found, hide preloader immediately
                preloader.style.display = 'none';
            }
        });
    </script>
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
    <script src="{{ asset('assets/js/invoice-scripts.js') }}"></script>

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
