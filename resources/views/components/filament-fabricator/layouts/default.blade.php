@props(['page'])
@php 
    $metaImage = \App\Models\GlobalSetting::getContentBySlug('meta-image');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ $page->meta_keywords ?? 'Bintang Fajar Abadi, HST, Unleashia, Embryollise, in2it, skincare' }}" />
        <meta name="description" content="{{ $page->meta_description ?? 'BINTANG FAJAR ABADI with the BRANDS UNLEASHIA, EMBRYOLISSE and HST has a strong online and offline sales base in Indonesia' }}" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Open Graph (Facebook, LinkedIn, etc) -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $page->meta_title ?? 'Bintang Fajar Abadi - Official Distributor' }}">
        <meta property="og:description" content="{{ $page->meta_description ?? 'BINTANG FAJAR ABADI with the BRANDS UNLEASHIA, EMBRYOLLISSE and HST has a strong online and offline sales base in Indonesia' }}">
        <meta property="og:image" content="{{ asset('storage/' . $metaImage ?? 'assets/front/images/default.png') }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="{{ $page->meta_title ?? 'Bintang Fajar Abadi - Official Distributor' }}">
        <meta name="twitter:description" content="{{ $page->meta_description ?? 'BINTANG FAJAR ABADI with the BRANDS UNLEASHIA, EMBRYOLLISSE and HST has a strong online and offline sales base in Indonesia' }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $metaImage ?? 'assets/front/images/default.png') }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.png') }}" />

        <title>{{ $page->title }} - {{ config('app.name', 'Bintang Fajar Abadi') }}</title>

        <!-- Scripts -->
        <link href="{{ asset('assets/front/css/fonts.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/bootstrap/bootstrap.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/magnific-popup/magnific-popup.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/aos.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/slick/slick.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/typography.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/svg.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/shortcode.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/widget.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/component.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/color.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/responsive.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/front/css/svg-inline.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    </head>
    <body class="modren-layout parallax-section" id="@stack('classHeaderBackground')" data-stellar-background-ratio="0.5" style="background-position: 0% -30px">
        <!-- LOADER -->

        @include('sweetalert::alert')
        <div id="loader-overflow" style="display: none">
            <div id="loader3" class="loader-cont" style="display: none">
            Please enable JS
            </div>
        </div>

        <div class="main-wrapper">
            @include('components.layouts.navigation')

            <!-- Content -->
            <main>
                @if (isset($page->blocks))
                    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
                @endif
                @yield('content')
            </main>

            @include('components.layouts.footer')
        </div>

        <!--jquery library js-->
            <script src="{{ asset('assets/front/plugins/jquery/jquery.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
            <!-- bootstrap -->
            <script src="{{ asset('assets/front/plugins/bootstrap/bootstrap.js') }}"></script>
            <!-- Slick Slider -->
            <script src="{{ asset('assets/front/plugins/slick/slick.min.js') }}"></script>
            <!-- Popup Js -->
            <script src="{{ asset('assets/front/plugins/magnific-popup/magnific-popup.js') }}"></script>
            <!-- Dll Menu Js -->
            <script src="{{ asset('assets/front/plugins/modernizr/modernizr.custom.js') }}"></script>
            <script src="{{ asset('assets/front/plugins/jquery/jquery.dlmenu.js') }}"></script>
            <script src="{{ asset('assets/front/js/jquery.waypoints.min.js') }}"></script>
            <script src="{{ asset('assets/front/js/jquery.countup.min.js') }}"></script>
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
            <script src="{{ asset('assets/front/js/aos.js') }}"></script>
            <script src="{{ asset('assets/front/js/custom.js') }}"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    AOS.init();
                })
            </script>
            @yield('additional')

            @stack('custom-scripts')

        <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            $('.have-children').on('click', function(e) {
                e.preventDefault(); 
                $(this).next('.children').slideToggle(); 
            });
        </script>
    </body>
</html>
