<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets') }}/admin/images/favicon.ico">
    <!-- jsvectormap css -->
    <link href="{{asset('assets') }}/admin/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
    <!--Swiper slider css-->
    <link href="{{asset('assets') }}/admin/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />
    <!-- Layout config Js -->
    <script src="{{asset('assets') }}/admin/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('assets') }}/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets') }}/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets') }}/admin/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('assets') }}/admin/css/custom.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
    @yield('javascript')
</head>
<body>
@include('admin._header')
@include('admin._sidebar')

@yield('content')
@include('admin._footer')
@yield('footer')
</body>
</html>
