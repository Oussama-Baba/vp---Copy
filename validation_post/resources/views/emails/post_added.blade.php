<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Hello {{ $post->user->name }},</p>
    <p>A new post has been added. Please check the platform to review it.</p>
    <p>Post Title: {{ $post->title }}</p>
    <p>Post Description: {{ $post->description }}</p>
    <p><a href="{{ url('/') }}">View Post</a></p>
    <p>Thank you!</p>

</body>
</html>
