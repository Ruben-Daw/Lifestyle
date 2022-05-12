@extends('layout')

@section('content')

    <div style="background-color: rgb(196, 194, 194); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">

        @if (!empty($cartProducts))

            <h2 style="color:white; margin-top:30px;">El meu carrito</h2>

            <div class="row mt-3" style="margin-top:60px;">
                @forelse ($cartProducts as $p)

                    <div class="col-12 col-lg-7 mb-4"> 
                        <div class="card mb-3">
                            <div class="row g-0">
                            <div class="col-md-4">
                                <a href="{{ route('shop.show', $p->product_id) }}" style="text-decoration: none;" >
                                    <img src="{{asset('imgs/'.$p->url)}}" class="img-fluid rounded-start" alt="...">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                <b><h3 class="card-title">{{$p->name}}</h3></b>
                                <p class="card-text">Preu: <span style="color:red;">€{{$p->price}}</span> IVA inclòs</p>
                                <form action="{{ route('cart.update', $p->product_cart_id) }}" method="post" id="shop-form{{$p->product_cart_id}}">

                                    @csrf
                                    @method('PATCH')
                                    <label for="talla">Talla:</label>
                                    <select class="form-select dropup" name="talla" id="talla" onchange="document.getElementById('shop-form{{$p->product_cart_id}}').submit()">
                                        
                                        @forelse ($sizes as $s)
                                            @if ($s->product_id == $p->product_id)
                                                @if ($s->size == $p->size)
                                                    <option value="{{$s->size}}" selected>{{$p->size}}</option>
                                                @else
                                                    <option value="{{$s->size}}">{{$s->size}}</option>
                                                @endif
                                            @endif
                                        @empty
                                            
                                        @endforelse
                                    </select>
    

                                    <label for="quantitat" style="margin-top:20px;">Quantitat:</label>
                                    <select class="form-select dropup" name="quantitat" id="quantitat" value="1" onchange="document.getElementById('shop-form{{$p->product_cart_id}}').submit()">
                                        
                                        @if ($p->quantity == 1)
                                            <option value="{{$p->quantity}}" selected>{{$p->quantity}}</option>
                                        @else
                                            <option value="1">1</option>
                                        @endif

                                        @if ($p->quantity == 2)
                                            <option value="{{$p->quantity}}" selected>{{$p->quantity}}</option>
                                        @else
                                            <option value="2">2</option>
                                        @endif

                                        @if ($p->quantity == 3)
                                            <option value="{{$p->quantity}}" selected>{{$p->quantity}}</option>
                                        @else
                                            <option value="3">3</option>
                                        @endif

                                        @if ($p->quantity == 4)
                                            <option value="{{$p->quantity}}" selected>{{$p->quantity}}</option>
                                        @else
                                            <option value="4">4</option>
                                        @endif

                                        @if ($p->quantity == 5)
                                            <option value="{{$p->quantity}}" selected>{{$p->quantity}}</option>
                                        @else
                                            <option value="5">5</option>
                                        @endif

                                    </select>
                                </form>
                                <hr>
                                <form action="{{route('cart.destroy',$p->product_cart_id)}}" method="post">

                                    @csrf
                                    @method('DELETE')
                                    <button style="border:0px; background-color:white;"><i class="bi bi-trash" style="color:red;"></i></button>
                                </form>
                                {{-- <a onclick="return confirm('Estas segur de esborrar el producte del carrito?')" href="/cart/{{$p->product_cart_id}}"><i class="bi bi-trash" style="color:red;"></i></a> --}}
                                </div>
                            </div>
                            </div>
                        </div>
                    </div> 

                    @if($loop->index == 0)

                        <div class="col-lg-1">

                        </div>
        
                        <div class="col-12 col-lg-4 mb-4 cart" style="height: 200px;">
                            <div class="card text-dark bg-light mb-3">
                                <div class="card-header">Resum de la comanda</div>
                                <div class="card-body">
                                    <b><p class="card-text">TOTAL: <span style="font-weight:normal;">€ {{getProductsCartTotalPrice()}} IVA inclòs</span></p></b>
                                    @if (getProductsCartNum()<=1)
                                        <p>{{getProductsCartNum()}} article</p>
                                    @else
                                        <p>{{getProductsCartNum()}} articles</p>
                                    @endif
        
                                </div>
                            </div>
                        </div> 

                    @endif

                @empty
                    
                @endforelse

            </div> 

        @else

            <h2 style="color:white; margin-top:30px;">El teu carret està buit</h2>
            <p style="color:white; margin-top:30px;">Quan hagis afegit alguna cosa al carret, apareixerà aquí. Vols començar?</p>
            <a class="btn btn-dark" href="/shop" role="button" style="text-align:center; line-height:20px;">Comença <i class="bi bi-arrow-right" style="font-size: 20px;"></i></a>

        @endif

    </div>

@endsection