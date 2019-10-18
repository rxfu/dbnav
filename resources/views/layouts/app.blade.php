<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="图书馆,导航,数据库,检索">
    <meta name="description" content="广西师范大学图书馆导航检索数据库">
    <meta name="author" content="FuRongxin">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', __('Default page')) | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- jQuery -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <!-- App -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <!-- Font Awesome Icons -->
    <link href="{{ asset('vendor/font-awesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/regular.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/font-awesome/css/solid.min.css') }}" rel="stylesheet">
    
    <!---Bootstrap 4 -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Theme Styles -->
    <link href="{{ asset('css/adminlte.min.css') }}" rel="stylesheet">
    <!-- App Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom Styles -->
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
    <div id="wrapper">
        @include('shared.header')

        @include('shared.sidebar')

        <!-- Content wrapper -->
        <div class="content-wrapper">
            @include('shared.alert')
            
            <!-- Content header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">{{ $title ?? __('Default title') }}</h1>
                        </div>
                        <div class="col-sm-6">
                            {{-- @include('shared.breadcrumb') --}}
                        </div>
                    </div>
                </div>
            </section>
    
            <!-- Main content -->
            <section class="content">
                <div class="content-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        @include('shared.footer')
    </div>
    
    <!-- Custom Scripts -->
    @stack('scripts')
</body>
</html>
