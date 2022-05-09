@extends('layout')

@section('content')

    <div style="background-color: rgb(196, 194, 194); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">

        <div class="row mt-4 justify-content-center">
            <div class="col-2">
                <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" style="background-color:black; color:white;">
                    Filtrar <i class="bi bi-funnel" style="font-size:17px;"></i>
                </a>
                
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filtrar</h5>
                    <a href="#eliminarFiltres" style="color: grey; ">Esborrar filtres</a>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            <hr>
                            <h6>Filtres aplicats</h6>
                            <span class="badge bg-secondary" style="font-size: 15px;"><i class="bi bi-x"></i>39</span>
                        </div>

                        <hr>

                        <div>
                            <h6>Talla</h6>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                39
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                40
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                41
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                42
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                43
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                44
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                45
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                46
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                47
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                48
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                49
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div>
                            <h6>Color</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                vermell
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                blanc
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                negre
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                taronja
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                blau
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                verd
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                rosa
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                lila
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                gris
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                groc
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                marró
                                </label>
                            </div>
                        </div>

                        <hr>

                        <div>
                            <h6>Esports</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    LifeStyle
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Fútbol
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Basquet
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Padel
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Tenis
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Atletisme
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Skateboard
                                </label>
                            </div>

                        </div>

                        <hr>

                        <div>
                            <h6>Marca</h6>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Nike
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Adidas
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Converse
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    New Balance
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Puma
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    ASICS
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    FILA
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Lacoste
                                </label>
                            </div>

                        </div>

                        <hr>

                        <div>
                            <h6>Preu</h6>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preu" value="" id="20-50">
                                <label class="form-check-label" for="flexCheckDefault">
                                    20€ - 50€
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preu" value="" id="50-70">
                                <label class="form-check-label" for="flexCheckDefault">
                                    50€ - 70€
                                </label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preu" value="" id="70-90">
                                <label class="form-check-label" for="flexCheckDefault">
                                    70€ - 90€
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preu" value="" id="90-100">
                                <label class="form-check-label" for="flexCheckDefault">
                                    90€ - 110€
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preu" value="" id="110-140">
                                <label class="form-check-label" for="flexCheckDefault">
                                    110€ - 140€
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preu" value="" id="140-200">
                                <label class="form-check-label" for="flexCheckDefault">
                                    140€ - 200€
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="preu" value="" id="+200">
                                <label class="form-check-label" for="flexCheckDefault">
                                    +200€
                                </label>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-2">
                <form action="{{ route('shop.index') }}" method="get" class="d-flex" id="shop-form">
                    @csrf

                    <input type="text" value="{{ $search }}" name="searchOrder" id="searchOrder" hidden="false">

                    <select class="btn" style="background-color:black; color:white; border-radius:6px;" name="order" id="order" onchange="document.getElementById('shop-form').submit()">
                        <option value="default" hidden="true" selected>Ordenar per: {{ $order }}</option>
                        <option value="baix-alt">Preu(baix-alt)</option>
                        <option value="alt-baix">Preu(alt-baix)</option>
                    </select>

                </form>
                
            </div>

        </div>

        <div class="row mt-3" style="margin-top:60px;">
            @forelse ($products as $product)
                
                <div class="col-6 col-lg-3 mb-4"> 

                    
                        <div class="card card2">
                            <form action="{{ route('favorites.store', [auth()->id(),$product->product_id]) }}" method="get" class="d-flex" id="fav-auth{{$product->product_id}}">
                                @csrf
                            </form>

                            <form action="{{ route('favorites.store', [0,$product->product_id]) }}" method="get" class="d-flex" id="fav-noAuth{{$product->product_id}}">
                                @csrf
                            </form>

                            <form action="{{ route('favorites.destroy', $product->product_id) }}" method="post" class="d-flex" id="fav-delete{{$product->product_id}}">
                                @csrf
                                @method('DELETE')
                            </form>

                            @if (!favoriteProductExists($product->product_id))
                                
                                @auth()
                                    <i class="bi bi-heart fav" style="color:red; display:flex; justify-content:end; margin-top:20px; margin-right:20px;" onclick="document.getElementById('fav-auth{{$product->product_id}}').submit()"></i>
                                @else
                                    <i class="bi bi-heart fav" style="color:red; display:flex; justify-content:end; margin-top:20px; margin-right:20px;" onclick="document.getElementById('fav-noAuth{{$product->product_id}}').submit()"></i>
                                @endauth

                            @else
                                <i class="bi bi-heart-fill" style="color:red; display:flex; justify-content:end; margin-top:20px; margin-right:20px;" onclick="document.getElementById('fav-delete{{$product->product_id}}').submit()"></i>

                            @endif
                            <a href="{{ route('shop.show', $product->product_id) }}" style="text-decoration: none; color:black;" >
                                @foreach ($imageProducts as $imgP)

                                    @if ($product->product_id == $imgP->product_id)

                                        <img src="imgs/{{ $imgP->url }}" class="card-img-top" alt="...">
                                        
                                    @endif
                                    
                                @endforeach
                                <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->categoryName }}</p>
                                <p>{{ $product->price }}€</p>
                                </div>

                            </a>
                        </div>
                    
                </div>
                
            @empty
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>
                    <b>No hi ha cap producte amb els detalls de la teva recerca</b>
                </div>
            </div>
            @endforelse
        </div> 
        <div style="display:flex; justify-content:center;">{{ $products->links() }}</div> 
    </div>
@endsection