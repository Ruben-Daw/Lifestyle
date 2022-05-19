<!DOCTYPE html>
<!-- Rubén Gómez Cuesta -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin control Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{{asset('css/main.css')}}" rel="stylesheet" media="all">
</head>
<!-- Num elements: 10 -->
<style>
    
    .card2:hover{
        border: 5px solid rgb(230, 4, 230);
    }
    
    body{
        background-color:black;
    }

    .link:hover {
        border: 1px solid;
        padding:2px;
    }

    .active{
        border-bottom: 2px solid;
    }


    .tooltip-inner {
        background-color: rgb(66, 26, 248);
        box-shadow: 0px 0px 4px black;
        opacity: 1 !important;
    }

    i{
        font-size:25px;
    }

    .fav{
        color: red;
    }

    .bag{
        color: black;
    }

    .ir-arriba {
        display:none;
        padding:20px;
        color:#fff;
        cursor:pointer;
        position: fixed;
        bottom:10px;
        right:20px;
    }

    .dropdown-toggle::after {
            content: none;
    }
</style>
<body>
<div class="container">

    @if(session()->has('success'))

        <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    @if(session()->has('message'))

        <div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
            <i class="bi bi-exclamation-triangle" style="margin-right:10px; font-size:20px;"></i>{{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    <!-- COMPONENT NAVBAR i tambe aplico la propietat rounded -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-2 rounded" >
        <div class="container-fluid">
            <a href="{{route('home')}}"><img src="{{ asset('imgs/logo.png') }}" height="150px" style="position: relative;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 offset-lg-1">
                    <!-- COMPONENT COLLAPSE -->
                    <li class="nav-item">
                        <a href="{{route('users.index')}}" class="link {{ request()->is('/admin/users') ? 'active' : '' }}" style="color:black; text-decoration: none;">Tractament d'usuaris</a>
                    </li>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <li class="nav-item">
                        <a href="{{route('products.index')}}" class="link {{ request()->is('/admin/products') ? 'active' : '' }}" style="color:black; text-decoration: none;">Tractament de productes</a>
                    </li>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <li class="nav-item">
                        <a href="{{route('products.create')}}" class="link {{ request()->is('/admin/addProduct') ? 'active' : '' }}" style="color:black; text-decoration: none;">Afegir producte</a>
                    </li>
                </ul>
                
                @auth
                <a href="{{route('login')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()" ><i class="bi bi-box-arrow-left" style="text-decoration: none; margin-right:10px;"></i></a>&nbsp&nbsp
                @endauth

                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                    @csrf
                </form>

            </div>
        </div>
    </nav>

        @yield('content')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>