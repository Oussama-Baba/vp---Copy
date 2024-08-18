<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Bonjour {{ $post->user->name }},</p>
    <p>Un nouveau post a été ajouté. Veuillez vérifier la plateforme pour le revoir.</p>
    <p>Titre du Post : {{ $post->title }}</p>
    <p>Description du Post : {{ $post->description }}</p>
    <p><a href="{{ url('/login') }}">Voir le Post</a></p>
    <p>Merci !</p>

</body>
</html>
