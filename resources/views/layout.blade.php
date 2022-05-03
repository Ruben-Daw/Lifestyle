<!DOCTYPE html>
<!-- Rubén Gómez Cuesta -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeStyle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
        background-color: rgb(240, 158, 6);
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
    
</style>
<body>
<div class="container">

    @if(session()->has('success'))

        <div class="alert alert-warning alert-dismissible fade show w-50" role="alert">
            <i class="bi bi-exclamation-triangle" style="margin-right:10px; font-size:20px;"></i>{{ session()->get('success') }}<a href="/cart">Canvia la quantitat del producte</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    @if(session()->has('message'))

        <div class="alert alert-success alert-dismissible fade show w-50" role="alert">
            {{ session()->get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @endif

    <!-- COMPONENT NAVBAR i tambe aplico la propietat rounded -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-2 rounded" >
        <div class="container-fluid">
            <a href="/"><img src="{{ asset('imgs/logo.png') }}" height="150px" style="position: relative;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 offset-lg-1">
                <!-- COMPONENT COLLAPSE -->
                <li class="nav-item">
                    <a href="/" class="link {{ request()->is('/') ? 'active' : '' }}" style="color:black; text-decoration: none;">Inici</a>
                </li>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <li class="nav-item">
                    <a href="/contact" class="link {{ request()->is('contact') ? 'active' : '' }}" style="color:black; text-decoration: none;">Contacta'ns</a>
                </li>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <li class="nav-item">
                    <a data-bs-toggle="collapse" class="link {{ request()->is('novetats') ? 'active' : '' }}" href="#novetats" role="button" aria-expanded="false" aria-controls="novetats" style="color:black; text-decoration: none;">Novetats</a>
                </li>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <li class="nav-item">
                    <a data-bs-toggle="collapse" class="link {{ request()->is('home') ? 'active' : '' }}" href="#home" role="button" aria-expanded="false" aria-controls="home" style="color:black; text-decoration: none;">Home</a>
                </li>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <li class="nav-item">
                    <a data-bs-toggle="collapse" class="link {{ request()->is('dona') ? 'active' : '' }}" href="#dona" role="button" aria-expanded="false" aria-controls="dona" style="color:black; text-decoration: none;">Dona</a>
                </li>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <li class="nav-item">
                    <a data-bs-toggle="collapse" class="link {{ request()->is('nen') ? 'active' : '' }}" href="#nen" role="button" aria-expanded="false" aria-controls="nen" style="color:black; text-decoration: none;">Nen/a</a>
                </li>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                <li class="nav-item">
                    <a data-bs-toggle="collapse" class="link {{ request()->is('ofertes') ? 'active' : '' }}" href="#ofertes" role="button" aria-expanded="false" aria-controls="ofertes" style="color:black; text-decoration: none;">Ofertes</a>
                </li>
            </ul>
            <!-- Aqui utilitzo la propietat flex -->
            <form action="{{ route('shop.index') }}" method="get" class="d-flex" style="margin-right:50px;">

                @csrf

                @if (isset($search))
                    <input class="form-control me-2" type="search" name="search" placeholder="Buscar" aria-label="Search" value="{{ $search }}">
                @else
                    <input class="form-control me-2" type="search" name="search" placeholder="Buscar" aria-label="Search">
                @endif
                <!-- COMPONENT BUTTON -->
                <button class="btn btn-outline-success" id="browseBtn" type="submit">Buscar</button>
            </form>

            @guest
                <a href="/login"><i class="bi bi-box-arrow-in-right login" style="text-decoration: none;"></i></a>&nbsp&nbsp
            @endguest
            
            @auth
            <a href="/login" onclick="event.preventDefault(); document.getElementById('logout-form').submit()"><i class="bi bi-box-arrow-in-left"></i></a>&nbsp&nbsp
            @endauth

            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none">
                @csrf
            </form>

            <a href="/favs"><i class="bi bi-heart fav" style="text-decoration: none;"></i></a>&nbsp&nbsp
            <a href="/cart" style="text-decoration: none;">
                <i class="bi bi-bag bag"></i>
                <!-- COMPONENT BADGE -->
                <span class="top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size:10px;">
                    {{getProductsCartNum()}}
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
            </div>
        </div>
    </nav>

    <!-- COMPONENT COLLAPSE -->
        <!-- NOVETATS -->
        <div class="collapse" id="novetats">
            <div class="card card-body">
                <div class="row justify-content-around">

                    <div class="col-12 col-lg-2">
                        <b><a href="/novetats" style="color:black; text-decoration: none;">Novetats per a home</a></b>
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/novetats" style="color:black; text-decoration: none;">Novetats per a dona</a></b>
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/novetats" style="color:black; text-decoration: none;">Novetats per a nen/a</a></b>
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/novetats" style="color:black; text-decoration: none;">Novetats per marca</a></b>
                    </div>

                </div>
            </div>
        </div>

        <!-- HOME -->
        <div class="collapse" id="home">
            <div class="card card-body">
                <div class="row justify-content-around">

                    <div class="col-12 col-lg-2">
                        <b><a href="/home" style="color:black; text-decoration: none;">Lifestyle</a></b>
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/home" style="color:black; text-decoration: none;">Fútbol</a></b>
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/home" style="color:black; text-decoration: none;">Basquet</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/home" style="color:black; text-decoration: none;">Padel</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/home" style="color:black; text-decoration: none;">Tenis</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/home" style="color:black; text-decoration: none;">Atletisme</a></b>    
                    </div>

                </div>

                <div class="row justify-content-start mt-lg-2">
                    <div class="col-12 col-lg-2">
                        <b><a href="/home" style="color:black; text-decoration: none;">Skateboard</a></b>    
                    </div>
                </div>
            </div>
        </div>

        <!-- DONA -->
        <div class="collapse" id="dona">
            <div class="card card-body">
                <div class="row justify-content-around">

                    <div class="col-12 col-lg-2">
                        <b><a href="/dona" style="color:black; text-decoration: none;">Lifestyle</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/dona" style="color:black; text-decoration: none;">Fútbol</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/dona" style="color:black; text-decoration: none;">Basquet</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/dona" style="color:black; text-decoration: none;">Padel</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/dona" style="color:black; text-decoration: none;">Tenis</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/dona" style="color:black; text-decoration: none;">Atletisme</a></b>    
                    </div>

                </div>

                <div class="row justify-content-start mt-lg-2">
                    <div class="col-12 col-lg-2">
                        <b><a href="/dona" style="color:black; text-decoration: none;">Skateboard</a></b>    
                    </div>
                </div>
            </div>
        </div>

        <!-- NEN/A -->
        <div class="collapse" id="nen">
            <div class="card card-body">
                <div class="row justify-content-around">

                    <div class="col-12 col-lg-2">
                        <b><a href="/nen" style="color:black; text-decoration: none;">Lifestyle</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/nen" style="color:black; text-decoration: none;">Fútbol</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/nen" style="color:black; text-decoration: none;">Basquet</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/nen" style="color:black; text-decoration: none;">Padel</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/nen" style="color:black; text-decoration: none;">Tenis</a></b>    
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/nen" style="color:black; text-decoration: none;">Atletisme</a></b>    
                    </div>

                </div>

                <div class="row justify-content-start mt-lg-2">
                    <div class="col-12 col-lg-2">
                        <b><a href="/nen" style="color:black; text-decoration: none;">Skateboard</a></b>    
                    </div>
                </div>

            </div>
        </div>

        <!-- OFERTES -->
        <div class="collapse" id="ofertes">
            <div class="card card-body">
                <div class="row justify-content-around">

                    <div class="col-12 col-lg-2">
                        <b><a href="/ofertes" style="color:black; text-decoration: none;">Ofertes per a home</a></b>
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/ofertes" style="color:black; text-decoration: none;">Ofertes per a dona</a></b>
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/ofertes" style="color:black; text-decoration: none;">Ofertes per a nen/a</a></b>
                    </div>

                    <div class="col-12 col-lg-2">
                        <b><a href="/ofertes" style="color:black; text-decoration: none;">Ofertes per marca</a></b>
                    </div>

                </div>
            </div>
        </div>

        @yield('content')

        <!-- COMPONENT TOAST -->
        <div class="toast-container position-absolute p-3 top-0 start-0">
            <div class="toast align-items-center text-white bg-warning border-0" id="toastBasic" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body" style="color: black">
                        Cerca no trobada.
                    </div>
                    <!-- COMPONENT CLOSE BUTTON -->
                    <button type="button" class="btn-close m-auto" id="btnClose" data-bs-dismiss="toast" aria-label="Close" style="color: black;"></button>
                </div>
            </div>
        </div>

        <footer class="footer-08">
            <div class="container-fluid px-lg-5">
                <div class="row">
                    <div class="col-md-9 py-5">
                        <div class="row">
                            <div class="col-md-4 mb-md-0 mb-4">
                                <h2 class="footer-heading">Quant a nosaltres</h2>
                                <p style="color:black;">Som una petita botiga online de les millors sabates</p>
                                <ul class="ftco-footer-social p-0">
                                    <li class="ftco-animate"><a href="https://twitter.com" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="bi bi-twitter" style="margin-left: 10px; font-size:20px"></i></a></li>
                                    <li class="ftco-animate"><a href="https://www.instagram.com" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="bi bi-facebook" style="margin-left: 10px; font-size:20px"></i></a></li>
                                    <li class="ftco-animate"><a href="https://www.instagram.com" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="bi bi-instagram" style="margin-left: 10px; font-size:20px"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div class="row justify-content-center">
                                    <div class="col-md-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Novetats</h2>
                                                <ul class="list-unstyled">
                                                    <li><b><a href="/shop" class="py-1 d-block">Novetats per home</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">Novetats per dona</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">Novetats per Nen/a</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">Novetats per marca</a></b></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Home</h2>
                                                <ul class="list-unstyled">
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus1</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus2</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus3</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus4</a></b></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Dona</h2>
                                                <ul class="list-unstyled">
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus1</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus2</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus3</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus4</a></b></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Nen/a</h2>
                                                <ul class="list-unstyled">
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus1</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus2</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus3</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">tipus4</a></b></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 mb-md-0 mb-4">
                                                <h2 class="footer-heading">Ofertes</h2>
                                                <ul class="list-unstyled">
                                                    <li><b><a href="/shop" class="py-1 d-block">Ofertes per home</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">Ofertes per dona</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">Ofertes per Nen/a</a></b></li>
                                                    <li><b><a href="/shop" class="py-1 d-block">Ofertes per marca</a></b></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-md-5">
                            <div class="col-md-12">
                                <p class="copyright" style="color: black;">
                                    Copyright ©<script>document.write(new Date().getFullYear());</script> All rights reserved | LifeStyle
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
                        <h2 class="footer-heading footer-heading-white">Contacteu amb nosaltres</h2>
                        <form method="POST" action="{{ route('contact') }}" class="contact-form">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="El teu nom" value={{ old('name') }}>
                                {!! $errors->first('name', '<small style="color:red">:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="El teu email" value={{ old('email') }}>
                                {!! $errors->first('email', '<small style="color:red">:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Assumpte" value={{ old('subject') }}>
                                {!! $errors->first('subject', '<small style="color:red">:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <textarea  name="content" id="" cols="30" rows="3" class="form-control" placeholder="Missatge">{{ old('content') }}</textarea>
                                {!! $errors->first('content', '<small style="color:red">:message</small><br>') !!}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control submit px-3">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>

        // document.querySelector("#browseBtn").onclick = function(e) {
        //     e.preventDefault();
        //     new bootstrap.Toast(document.querySelector('#toastBasic')).show();
        // }

        document.querySelector("#btnClose").onclick = function(e) {
            e.preventDefault();
            new bootstrap.Toast(document.querySelector('#toastBasic')).hide();
        }

        // document.querySelector("#tancarMissatge").onclick = function(e) {
        //     e.preventDefault();
        //     new bootstrap.Toast(document.querySelector('#missatgeEnviat')).hide();
        // }

        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

    </script>


</body>
</html>