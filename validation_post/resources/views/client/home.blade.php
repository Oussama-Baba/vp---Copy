<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>home</h1>
    @guest
    <a href="{{ route('login') }}">Login</a>
    @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
    @endif
@else
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
            Logout
        </a>
    </form>
@endguest


</body>
</html>
