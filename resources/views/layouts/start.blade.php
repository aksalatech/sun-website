<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="FYP Tour & Travel" />
        <meta name="description" content="FYP Tour & Travel" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('storage/logo/favicon.png') }}" />
        <!-- Favicone Icon -->

        <title>@yield('title') - {{ config('app.name', 'FYP Tour & Travel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Template -->
        <link href="{{ asset('assets/front/css/fonts.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/bootstrap/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/animate/animate.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/slick/slick.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/typography.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/svg.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/shortcode.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/widget.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/component.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/color.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/svg-inline.css') }}" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        
        
    </head>
    <body class="modren-layout parallax-section" data-stellar-background-ratio="0.5" style="background-position: 0% -30px">
        <!-- LOADER -->
        <div id="loader-overflow" style="display: none">
            <div id="loader3" class="loader-cont" style="display: none">
            Please enable JS
            </div>
        </div>

        <div class="main-wrapper">
            @include('components.layouts.navigation')

            <!-- Content -->
            <main>
                @yield('content')
            </main>

            @include('components.layouts.footer')
        </div>
      
            <!--jquery library js-->
            <script src="{{ asset('assets/front/plugins/jquery/jquery.js') }}"></script>
            
            <!-- bootstrap -->
            <script src="{{ asset('assets/front/plugins/bootstrap/bootstrap.js') }}"></script>
            <!-- Slick Slider -->
            <script src="{{ asset('assets/front/plugins/slick/slick.min.js') }}"></script>
            <!-- Popup Js -->
            <script src="{{ asset('assets/front/plugins/magnific-popup/magnific-popup.js') }}"></script>
            <!-- Dll Menu Js -->
            <script src="{{ asset('assets/front/plugins/modernizr/modernizr.custom.js') }}"></script>
            <script src="{{ asset('assets/front/plugins/jquery/jquery.dlmenu.js') }}"></script>
            <!-- Fontawesome Js -->
            <script src="{{ asset('assets/front/plugins/fontawesome/fontawesome.js') }}"></script>
            <!-- Date Picker -->
            <script type="text/javascript" src="{{ asset('assets/front/plugins/moment/moment.min.js') }}"></script>
            <script type="text/javascript" src="{{ asset('assets/front/plugins/daterangepicker/daterangepicker.min.js') }}"></script>
            <!-- Google Map Js -->
            <script src="{{ asset('assets/front/plugins/gmap3/gmap3.min.js') }}"></script>
            <script src="{{ asset('assets/front/plugins/accordion/accordion.js') }}"></script>
            <!-- Input Number Js -->
            <script src="{{ asset('assets/front/js/input-number.js') }}"></script>
            <!--Custom Script-->
            <script src="{{ asset('assets/front/js/custom.js') }}"></script>
        
            @yield('additional')

        <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            
        </script>
        
    </body>
</html>
