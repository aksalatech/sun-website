<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="HTML5 Template Avo onepage themeforest" />
        <meta name="description" content="Avo - Onepage Multi-Purpose HTML5 Template" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="assets/front/images/favicon.ico" />
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <link rel="stylesheet" href="assets/front/css/colors.css" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Template -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="assets/admin/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
		<link href="assets/admin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/admin/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/admin/css/style.bundle.css" rel="stylesheet" type="text/css" />
    </head>
    <body id="kt_body" class="header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-secondary-enabled page-loading">
        
        <!-- Content -->
        <main>
            @yield('content')
        </main>
        
        <script>
            var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
        </script>
		<script src="assets/admin/plugins/global/plugins.bundle.js"></script>
		<script src="assets/admin/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/admin/js/scripts.bundle.js"></script>
		<script src="assets/admin/js/pages/custom/login/login-general.js"></script>
    </body>
</html>
