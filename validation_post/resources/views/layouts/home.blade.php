<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Amanus Home')</title>



    <link rel="stylesheet" href="/assets/css/usercart">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom CSS -->
</head>
<body>
              @yield('content')
    <script src="{{ asset('/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('/assets/js/template.js') }}"></script>
</body>
</html>
