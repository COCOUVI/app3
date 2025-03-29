<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <p>Welcome To IG</p>
    <p>Coucou {{$Name}}</p>
    <label  for id="age">Entrer votre age:</label>
    <form action="{{route('postIg')}}" method="post">
        @csrf
        @method('post')
        <input type="number" name="age" id="">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>