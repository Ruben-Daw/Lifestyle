@extends('layout')

@section('content')
    <div style="background-color: rgb(196, 194, 194); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">
        
        <div class="row mt-2">
            <div class="col">
                <!-- COMPONENT CAROUSEL -->
                <div class="carousel slide carousel-fade" id="meu-carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <a href="#">
                                <img class="img-fluid" src="{{asset("imgs/nike1.jpg")}}" style="width: 100%; height: 100%;">
                            </a>
                        </div>

                        <div class="carousel-item" data-bs-interval="5000">
                            <a href="#">
                                <img class="img-fluid" src="{{asset("imgs/zapatillas1.jpg")}}" style="width: 100%; height: 100%;">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img class="img-fluid" src="{{asset("imgs/zapatillas2.jpg")}}" style="width: 100%; height: 100%;">
                            </a>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#meu-carousel"
                        data-bs-slide="prev">

                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>

                    </button>

                    <button class="carousel-control-next" type="button" data-bs-target="#meu-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Següent</span>
                    </button>

                    <div class="carousel-indicators">

                        <button type="button" class="active" data-bs-target="#meu-carousel" data-bs-slide-to="0"
                            aria-label="Slide 1"></button>
                        <button type="button" class="" data-bs-target="#meu-carousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" class="" data-bs-target="#meu-carousel" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                </div>
            </div>
        </div>

        <!-- COMPONENT CARDS -->
        <div class="row mt-3" style="margin-top:60px;">
            <div class="col-12 col-lg-4 mb-4"> 
                <div class="card">
                    <!-- COMPONENT TOOLTIP -->
                    <a href="#"><img src="../imgs/Bunny.jpg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" data-bs-color="blue" title="Adidas Bad Bunny"></a>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <!-- COMPONENT CARDS -->
            <div class="col-12 col-lg-4 mb-4">
                <div class="card">
                    <!-- COMPONENT TOOLTIP -->
                    <a href="#"><img src="../imgs/dior.jpg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Nike x Dior"></a>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <!-- COMPONENT CARDS -->
            <div class="col-12 col-lg-4 mb-4">
                <div class="card">
                    <!-- COMPONENT TOOLTIP -->
                    <a href="#"><img src="../imgs/apple.jpg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Apple sneakers"></a>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <!-- COMPONENT CARDS -->
            <div class="col-12 col-lg-4 mb-4">
                <div class="card">
                    <!-- COMPONENT TOOLTIP -->
                    <a href="#"><img src="../imgs/Lust-sneakers.jpg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Happy Nike"></a>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <!-- COMPONENT CARDS -->
            <div class="col-12 col-lg-4 mb-4">
                <div class="card">
                    <!-- COMPONENT TOOLTIP -->
                    <a href="#"><img src="../imgs/nikeTop.jpg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Nike top"></a>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <!-- COMPONENT CARDS -->
            <div class="col-12 col-lg-4 mb-4">
                <div class="card">
                    <!-- COMPONENT TOOLTIP -->
                    <a href="#"><img src="../imgs/adidas.jpg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Adidas comfort"></a>
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
@endsection

