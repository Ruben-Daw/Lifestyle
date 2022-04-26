<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Missatge rebut</title>
</head>
<body>
    <p> Has rebut un missatge de: {{ strip_tags($msg['name']) }} - {{ $msg['email'] }}</p>
    <p><strong>Asumpte: </strong> {{ strip_tags($msg['subject']) }}</p>
    <p><strong>Contingut: </strong> {{ strip_tags($msg['content']) }}</p>
</body>
</html> 