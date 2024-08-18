<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Amanus Dashboard')</title>
    <link rel="stylesheet" href="/assets/vendors/core/core.css">
    <link rel="stylesheet" href="/assets/css/demo_1/style.css">
    <link rel="stylesheet" href="/assets/css/demo_1/style.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/assets/css/table.css">
    <link rel="stylesheet" href="/assets/css/usercart">
    <!-- Custom CSS -->
</head>
<body class="navbar-dark">
    <div>@include('adminpanel.navbar')
        @include('adminpanel.sidebar')
                @yield('content')
            </div>


    <script src="{{ asset('/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
</body>
</html>
