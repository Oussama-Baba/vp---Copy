<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Amanus Home')</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/usercart">
    <!-- Custom CSS -->
</head>
<body >

                @yield('content')



    <script src="{{ asset('/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
</body>
</html>
