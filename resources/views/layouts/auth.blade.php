<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <!-- Icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon/android-chrome-512x512.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/font-awesome/css/font-awesome.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front/custom.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="row m-0 vh-100">
                <div class="col p-0 d-none d-lg-block login-bg"></div>
                <div class="col d-flex flex-column justify-content-center align-items-center p-0 w-100 bg-white">
                    <div class="p-4 m-3">  
                        <div class="login-brand">
                            <img src="{{ asset('favicon/android-chrome-512x512.png') }}" alt="logo" width="100" class="">
                        </div>
                        <h4 class="text-primary font-weight-bold text-center">{{ __('Login ke Sistem Datalas') }}</h4>
                        <div class="card-body">
                            @yield('content')
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; 2021 - {{ date('Y') }} &mdash; <a href="{{ config('app.url') }}">{{ config('app.name') }}</a> <div class="bullet"></div> Admin Template By <a href="http://getstisla.com/">Stisla</a>
                        </div>
                    </div> 
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('modules/jquery.min.js') }}"></script>
    <script src="{{ asset('modules/popper.js') }}"></script>
    <script src="{{ asset('modules/tooltip.js') }}"></script>
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('modules/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
