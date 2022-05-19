<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LifeStyle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>

    <ul>
        <li><a href="{{route('users.index')}}">Veure usuaris</a></li>
        <li><a href="{{route('login')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="bi bi-box-arrow-in-left"></i></a></li>
    </ul>
    
    <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
        @csrf
    </form>
</body>
</html>