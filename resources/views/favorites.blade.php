@extends('layout')

@section('content')

    <div style="background-color: rgb(196, 194, 194); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">
        @if (!empty($favoriteProducts))
            <h2 style="color:white; margin-top:30px;">Favorits</h2>
            <b><p style="color:white; margin-top:-5px;">{{ getFavoriteProductsNum() }} articles</p></b>

            <div class="row mt-3" style="margin-top:60px;">
                @forelse ($favoriteProducts as $fp)
                    <div class="col-12 col-lg-3 mb-4"> 
                        <div class="card">
                            <form action="{{ route('favorites.destroy', $fp->product_id) }}" method="post" class="d-flex" id="fav-delete{{$fp->product_id}}">
                                @csrf
                                @method('DELETE')
                            </form>
                            <i class="bi bi-trash" style="color:red; display:flex; justify-content:end; margin-top:20px; margin-right:20px;" onclick="document.getElementById('fav-delete{{$fp->product_id}}').submit()"></i>
                            <a href="{{ route('shop.show', $fp->product_id) }}" style="text-decoration: none;" >
                                <img src="{{ asset('imgs/'.$fp->url) }}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                            <h5 class="card-title">{{$fp->name}}</h5>
                            <p class="card-text">€{{$fp->price}}</p>
                            </div>
                        </div>
                    </div> 
                @empty
                    
                @endforelse
            </div> 
        @else

            <h2 style="color:white; margin-top:30px;">La teva llista de favorits aquesta buida</h2>
            <p style="color:white; margin-top:30px;">Quan hagis afegit alguna cosa a la teva llista, apareixerà aquí. Vols començar?</p>
            <a class="btn btn-dark" href="{{route('shop.index')}}" role="button" style="text-align:center; line-height:20px;">Comença <i class="bi bi-arrow-right" style="font-size: 20px;"></i></a>
    
        @endif
    </div>

@endsection