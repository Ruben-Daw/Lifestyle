@extends('layout')

@section('content')
    <div style="background-color: rgb(196, 194, 194); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">
        
        <a class="ir-arriba">
            <span>
                <i class="bi bi-arrow-up-circle-fill" style="font-size:30px;"></i>
            </span>
        </a>

        <!-- COMPONENT CARDS -->
        @if ($nike != null)
            <h1 style="text-align:center; background-color:white;"><hr>Nike<hr></h1>
            <div class="row mt-3" style="margin-top:60px;">
                @foreach ($nike as $n)
                    <div class="col-12 col-lg-4 mb-4"> 
                        <div class="card">
                            <!-- COMPONENT TOOLTIP -->
                            @foreach ($images as $i)
                                @if ($n->product_id == $i->product_id)
                                    <a href="{{route('shop.show',$n->product_id)}}"><img src="{{asset('imgs/'.$i->url)}}" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" data-bs-color="blue" title="{{$n->name}}"></a>
                                @endif
                            @endforeach
                            
                            <div class="card-body">
                            <h5 class="card-title">{{$n->name}} <span style="color:red; float:right;">€{{$n->price}}</span></h5>
                            <div class="card-text" style="overflow:hidden; text-overflow:ellipsis; display: -webkit-box; -webkit-line-clamp:1; -webkit-box-orient:vertical;">{{$n->description}}</div>
                            </div>
                        </div>
                    </div> 
                @endforeach
                   
            </div>
        @endif
            <br>
        @if ($adidas != null)
            <h1 style="text-align:center; background-color:white;"><hr>Adidas<hr></h1>
            <div class="row mt-3" style="margin-top:60px;">
                @foreach ($adidas as $a)
                    <div class="col-12 col-lg-4 mb-4"> 
                        <div class="card">
                            <!-- COMPONENT TOOLTIP -->
                            @foreach ($images as $i)
                                @if ($a->product_id == $i->product_id)
                                    <a href="{{route('shop.show',$a->product_id)}}"><img src="{{asset('imgs/'.$i->url)}}" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" data-bs-color="blue" title="{{$a->name}}"></a>
                                @endif
                            @endforeach
                            
                            <div class="card-body">
                            <h5 class="card-title">{{$a->name}} <span style="color:red; float:right;">€{{$a->price}}</span></h5>
                            <p class="card-text" style="-webkit-line-clamp:4;">{{$a->description}}</p>
                            </div>
                        </div>
                    </div> 
                @endforeach
                
            </div>
        @endif
            <br>
        @if ($puma != null)
            <h1 style="text-align:center; background-color:white;"><hr>Puma<hr></h1>
            <div class="row mt-3" style="margin-top:60px;">
                @foreach ($puma as $p)
                    <div class="col-12 col-lg-4 mb-4"> 
                        <div class="card">
                            <!-- COMPONENT TOOLTIP -->
                            @foreach ($images as $i)
                                @if ($p->product_id == $i->product_id)
                                    <a href="{{route('shop.show',$p->product_id)}}"><img src="{{asset('imgs/'.$i->url)}}" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" data-bs-color="blue" title="{{$p->name}}"></a>
                                @endif
                            @endforeach
                            
                            <div class="card-body">
                            <h5 class="card-title">{{$p->name}} <span style="color:red; float:right;">€{{$p->price}}</span></h5>
                            <p class="card-text" style="-webkit-line-clamp:4;">{{$p->description}}</p>
                            </div>
                        </div>
                    </div> 
                @endforeach
                
            </div>
        @endif
        
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
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="{{ asset('js/shop.js')}}"></script>
@endsection

