@extends('layout')

@section('content')

    <div style="background-color: rgb(196, 194, 194); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">
                
        <div class="row mt-2">
            <div class="col-12 col-lg-8" style="border-right: 3px solid ;">
                <!-- COMPONENT CAROUSEL -->
                <div class="carousel slide carousel-fade" id="meu-carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @forelse ($imagesProduct as $image)
                            @if($loop->index == 0)

                                <div class="carousel-item active d-flex justify-content-center">
                                        <img class="img-fluid" src="{{ asset('imgs/'.$image->url)}}">
                                </div>

                            @else

                                <div class="carousel-item d-flex justify-content-center" data-bs-interval="5000">
                                    <a href="#">
                                        <img class="img-fluid" src="{{ asset('imgs/'.$image->url)}}">
                                    </a>
                                </div>

                            @endif
                        @empty
                            
                        @endforelse
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

                        @forelse ($imagesProduct as $image)
                            
                        <button type="button" class="active" data-bs-target="#meu-carousel" data-bs-slide-to="0"
                        aria-label="Slide{{$loop->index}}"></button>

                        @empty
                            
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-3 ml-lg-5 mt-3 mt-lg-0">
                <h3>{{$product->name}}</h3>
                <p><b>€ {{$product->price}}</b></p>
                <div>
                    <h6>Selecciona una talla: <span></h6>
                    <form action="{{ route('shop.show', $product->product_id) }}" method="get" class="d-flex" id="shop-form">

                        @csrf
 
                        <select name="sizes" id="sizes" onchange="document.getElementById('shop-form').submit()">

                            <option value="default" hidden="true" selected>{{ $size }}</option>

                            @forelse ($sizesProduct as $sizeProduct)
                            
                                <option value="{{ $sizeProduct->size }}">{{ $sizeProduct->size }}</option>

                            @empty
                                
                            @endforelse
                        </select>

                    </form>

                    @if (isset($stockSizeProduct) && $stockSizeProduct->stock >1 && $stockSizeProduct->stock <=5)
                        <p style="color:red;">Quedan {{ $stockSizeProduct->stock }} en stock</p>

                    @elseif (isset($stockSizeProduct) && $stockSizeProduct->stock ==1)
                        <p style="color:red;">Queda {{ $stockSizeProduct->stock }} en stock</p>

                    @endif

                </div>
                
                <button class="btn btn-dark w-75 mt-4">Afegir al carrito</button>
                <button class="btn w-15 mt-4" style="border: 1px solid"><i class="bi bi-heart" style="font-size: 15px; color: red;"></i></button>
            </div>

            <div class="col-lg-8" style="border-right: 3px solid ;">

            </div>

            <div class="col-12 col-lg-8" style="border-right: 3px solid ;"> 
                <div class="card mb-3 mt-4">
                    <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('imgs/'.$image->url)}}" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <b><h3 class="card-title">{{$product->name}}</h3></b>
                            <p>{{$product->description}}</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection