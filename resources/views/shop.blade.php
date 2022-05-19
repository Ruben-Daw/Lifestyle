@extends('layout')

@section('content')

    <div style="background-color: rgb(196, 194, 194); padding:20px; margin-top: 40px; margin-bottom:40px; border-radius: 7px;">

        <a class="ir-arriba">
                <span>
                    <i class="bi bi-arrow-up-circle-fill" style="font-size:30px;"></i>
                </span>
        </a>

        <div class="row mt-4 justify-content-center">
            <div class="col-2">
                <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasExample" style="background-color:black; color:white;">
                    Filtrar <i class="bi bi-funnel" style="font-size:17px;"></i>
                </a>
                
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filtrar</h5>
                        <button style="color: grey;" id="esborrarFiltres">Esborrar filtres</button>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <hr>
                    <div class="offcanvas-body">

                        <form action="{{route('shop.index', [$category, $type])}}" method="get" name="shopFilter" id="shopFilter">

                            @csrf

                            <input type="text" value="{{ $search }}" name="searchOrder" id="searchOrder" hidden="false">

                            <select style="" name="order" id="order">
                                <option value="" hidden="true" selected>Ordenar per: {{ $order }}</option>
                                <option value="baix-alt">Preu(baix-alt)</option>
                                <option value="alt-baix">Preu(alt-baix)</option>
                            </select>

                            <hr>

                            <div>
                                <h6>Talla</h6>
                                
                                @if ($sizes == null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="totes" id="todasTallas" checked 
                                            onclick="document.getElementById('talla34').checked=false
                                            document.getElementById('talla35').checked=false
                                            document.getElementById('talla36').checked=false
                                            document.getElementById('talla37').checked=false
                                            document.getElementById('talla38').checked=false
                                            document.getElementById('talla39').checked=false
                                            document.getElementById('talla40').checked=false
                                            document.getElementById('talla41').checked=false
                                            document.getElementById('talla42').checked=false
                                            document.getElementById('talla43').checked=false
                                            document.getElementById('talla44').checked=false
                                            document.getElementById('talla45').checked=false
                                            document.getElementById('talla46').checked=false
                                            document.getElementById('talla47').checked=false">
                                        <label class="form-check-label" for="todasTallas">
                                        totes
                                        </label>
                                    </div>
                                @elseif(sizeof($sizes) == 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="totes" id="todasTallas" checked 
                                            onclick="document.getElementById('talla34').checked=false
                                            document.getElementById('talla35').checked=false
                                            document.getElementById('talla36').checked=false
                                            document.getElementById('talla37').checked=false
                                            document.getElementById('talla38').checked=false
                                            document.getElementById('talla39').checked=false
                                            document.getElementById('talla40').checked=false
                                            document.getElementById('talla41').checked=false
                                            document.getElementById('talla42').checked=false
                                            document.getElementById('talla43').checked=false
                                            document.getElementById('talla44').checked=false
                                            document.getElementById('talla45').checked=false
                                            document.getElementById('talla46').checked=false
                                            document.getElementById('talla47').checked=false">
                                        <label class="form-check-label" for="todasTallas">
                                        totes
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="totes" id="todasTallas" 
                                            onclick="document.getElementById('talla34').checked=false
                                            document.getElementById('talla35').checked=false
                                            document.getElementById('talla36').checked=false
                                            document.getElementById('talla37').checked=false
                                            document.getElementById('talla38').checked=false
                                            document.getElementById('talla39').checked=false
                                            document.getElementById('talla40').checked=false
                                            document.getElementById('talla41').checked=false
                                            document.getElementById('talla42').checked=false
                                            document.getElementById('talla43').checked=false
                                            document.getElementById('talla44').checked=false
                                            document.getElementById('talla45').checked=false
                                            document.getElementById('talla46').checked=false
                                            document.getElementById('talla47').checked=false">
                                        <label class="form-check-label" for="todasTallas">
                                        totes
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('34',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="34" id="talla34" checked>
                                        <label class="form-check-label" for="talla34">
                                        34
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="34" id="talla34" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla34">
                                        34
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('35',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="35" id="talla35" checked>
                                        <label class="form-check-label" for="talla35">
                                        35
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="35" id="talla35" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla35">
                                        35
                                        </label>
                                    </div>
                                @endif
                                
                                @if($sizes!=null && in_array('36',$sizes) && sizeof($sizes) != 14)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="talla[]" value="36" id="talla36" checked>
                                    <label class="form-check-label" for="talla36">
                                    36
                                    </label>
                                </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="36" id="talla36" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla36">
                                        36
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('37',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="37" id="talla37" checked>
                                        <label class="form-check-label" for="talla37">
                                        37
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="37" id="talla37" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla37">
                                        37
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('38',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="38" id="talla38" checked>
                                        <label class="form-check-label" for="talla38">
                                        38
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="38" id="talla38" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla38">
                                        38
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('39',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="39" id="talla39" checked>
                                        <label class="form-check-label" for="talla39">
                                        39
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="39" id="talla39" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla39">
                                        39
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('40',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="40" id="talla40" checked>
                                        <label class="form-check-label" for="talla40">
                                        40
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="40" id="talla40" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla40">
                                        40
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('41',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="41" id="talla41" checked>
                                        <label class="form-check-label" for="talla41">
                                        41
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="41" id="talla41" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla41">
                                        41
                                        </label>
                                    </div>
                                @endif
                                
                                @if($sizes!=null && in_array('42',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="42" id="talla42" checked>
                                        <label class="form-check-label" for="talla42">
                                        42
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="42" id="talla42" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla42">
                                        42
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('43',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="43" id="talla43" checked>
                                        <label class="form-check-label" for="talla43">
                                        43
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="43" id="talla43" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla43">
                                        43
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('44',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="44" id="talla44" checked>
                                        <label class="form-check-label" for="talla44">
                                        44
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="44" id="talla44" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla44">
                                        44
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('45',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="45" id="talla45" checked>
                                        <label class="form-check-label" for="talla45">
                                        45
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="45" id="talla45" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla45">
                                        45
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('46',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="46" id="talla46" checked>
                                        <label class="form-check-label" for="talla46">
                                        46
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="46" id="talla46" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla46">
                                        46
                                        </label>
                                    </div>
                                @endif

                                @if($sizes!=null && in_array('47',$sizes) && sizeof($sizes) != 14)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="47" id="talla47" checked>
                                        <label class="form-check-label" for="talla47">
                                        47
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="talla[]" value="47" id="talla47" onclick="document.getElementById('todasTallas').checked=false">
                                        <label class="form-check-label" for="talla47">
                                        47
                                        </label>
                                    </div>
                                @endif

                            </div>

                            <hr>

                            <div>
                                <h6>Categories</h6>

                                @if ($categories == null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="totes" id="totesCategories" checked 
                                            onclick="document.getElementById('LifeStyle').checked=false
                                            document.getElementById('Futbol').checked=false
                                            document.getElementById('Basquet').checked=false
                                            document.getElementById('Padel').checked=false
                                            document.getElementById('Tenis').checked=false
                                            document.getElementById('Atletisme').checked=false
                                            document.getElementById('Skateboard').checked=false">
                                        <label class="form-check-label" for="totesCategories">
                                        totes
                                        </label>
                                    </div>
                                @elseif(sizeof($categories) == 5)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="totes" id="totesCategories" checked 
                                            onclick="document.getElementById('LifeStyle').checked=false
                                            document.getElementById('Futbol').checked=false
                                            document.getElementById('Basquet').checked=false
                                            document.getElementById('Padel').checked=false
                                            document.getElementById('Tenis').checked=false
                                            document.getElementById('Atletisme').checked=false
                                            document.getElementById('Skateboard').checked=false">
                                        <label class="form-check-label" for="totesCategories">
                                        totes
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="totes" id="totesCategories" 
                                            onclick="document.getElementById('LifeStyle').checked=false
                                            document.getElementById('Futbol').checked=false
                                            document.getElementById('Basquet').checked=false
                                            document.getElementById('Padel').checked=false
                                            document.getElementById('Tenis').checked=false
                                            document.getElementById('Atletisme').checked=false
                                            document.getElementById('Skateboard').checked=false">
                                        <label class="form-check-label" for="totesCategories">
                                        totes
                                        </label>
                                    </div>
                                @endif

                                @if($categories!=null && in_array('LifeStyle',$categories) && sizeof($categories) != 5)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="LifeStyle" id="LifeStyle" checked>
                                        <label class="form-check-label" for="LifeStyle">
                                            LifeStyle
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="LifeStyle" id="LifeStyle" onclick="document.getElementById('totesCategories').checked=false">
                                        <label class="form-check-label" for="LifeStyle">
                                            LifeStyle
                                        </label>
                                    </div>
                                @endif

                                @if($categories!=null && in_array('Futbol',$categories) && sizeof($categories) != 5)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="Futbol" id="Futbol" checked>
                                        <label class="form-check-label" for="Futbol">
                                            Fútbol
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="Futbol" id="Futbol" onclick="document.getElementById('totesCategories').checked=false">
                                        <label class="form-check-label" for="Futbol">
                                            Fútbol
                                        </label>
                                    </div>
                                @endif

                                @if($categories!=null && in_array('Basquet',$categories) && sizeof($categories) != 5)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="Basquet" id="Basquet" checked>
                                        <label class="form-check-label" for="Basquet">
                                            Basquet
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="Basquet" id="Basquet" onclick="document.getElementById('totesCategories').checked=false">
                                        <label class="form-check-label" for="Basquet">
                                            Basquet
                                        </label>
                                    </div>
                                @endif
                                
                                @if($categories!=null && in_array('Atletisme',$categories) && sizeof($categories) != 5)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="Atletisme" id="Atletisme" checked>
                                        <label class="form-check-label" for="Atletisme">
                                            Atletisme
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="Atletisme" id="Atletisme" onclick="document.getElementById('totesCategories').checked=false">
                                        <label class="form-check-label" for="Atletisme">
                                            Atletisme
                                        </label>
                                    </div>
                                @endif

                                @if($categories!=null && in_array('Skateboard',$categories) && sizeof($categories) != 5)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="Skateboard" id="Skateboard" checked>
                                        <label class="form-check-label" for="Skateboard">
                                            Skateboard
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]" value="Skateboard" id="Skateboard" onclick="document.getElementById('totesCategories').checked=false">
                                        <label class="form-check-label" for="Skateboard">
                                            Skateboard
                                        </label>
                                    </div>
                                @endif

                            </div>

                            <hr>

                            <div>

                                <h6>Marcas</h6>

                                @if ($brands == null && $search == "")
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="marcas[]" value="totes" id="totesMarcas" checked 
                                        onclick="document.getElementById('Nike').checked=false
                                        document.getElementById('Adidas').checked=false
                                        document.getElementById('Converse').checked=false
                                        document.getElementById('newBalance').checked=false
                                        document.getElementById('Puma').checked=false
                                        document.getElementById('ASICS').checked=false
                                        document.getElementById('FILA').checked=false
                                        document.getElementById('Lacoste').checked=false">
                                    <label class="form-check-label" for="totesMarcas">
                                    totes
                                    </label>
                                </div>

                                @elseif($brands != null && sizeof($brands) == 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="totes" id="totesMarcas" checked 
                                            onclick="document.getElementById('Nike').checked=false
                                            document.getElementById('Adidas').checked=false
                                            document.getElementById('Converse').checked=false
                                            document.getElementById('newBalance').checked=false
                                            document.getElementById('Puma').checked=false
                                            document.getElementById('ASICS').checked=false
                                            document.getElementById('FILA').checked=false
                                            document.getElementById('Lacoste').checked=false">
                                        <label class="form-check-label" for="totesMarcas">
                                        totes
                                        </label>
                                    </div>

                                @elseif(strtolower($search) == 'nike' || strtolower($search) == 'adidas' || strtolower($search) == 'converse' || 
                                    strtolower($search) == 'new balance' || strtolower($search) == 'newbalance' || strtolower($search) == 'puma' || 
                                    strtolower($search) == 'asics' || strtolower($search) == 'fila' || strtolower($search) == 'lacoste')

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="marcas[]" value="totes" id="totesMarcas" 
                                                onclick="document.getElementById('Nike').checked=false
                                                document.getElementById('Adidas').checked=false
                                                document.getElementById('Converse').checked=false
                                                document.getElementById('newBalance').checked=false
                                                document.getElementById('Puma').checked=false
                                                document.getElementById('ASICS').checked=false
                                                document.getElementById('FILA').checked=false
                                                document.getElementById('Lacoste').checked=false">
                                            <label class="form-check-label" for="totesMarcas">
                                            totes
                                            </label>
                                        </div>

                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="totes" id="totesMarcas" 
                                            onclick="document.getElementById('Nike').checked=false
                                            document.getElementById('Adidas').checked=false
                                            document.getElementById('Converse').checked=false
                                            document.getElementById('newBalance').checked=false
                                            document.getElementById('Puma').checked=false
                                            document.getElementById('ASICS').checked=false
                                            document.getElementById('FILA').checked=false
                                            document.getElementById('Lacoste').checked=false">
                                        <label class="form-check-label" for="totesMarcas">
                                        totes
                                        </label>
                                    </div>

                                @endif

                                @if($brands!=null && in_array('Nike',$brands) && sizeof($brands) != 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Nike" id="Nike" checked>
                                        <label class="form-check-label" for="Nike">
                                            Nike
                                        </label>
                                    </div>
                                @elseif(strtolower($search) == 'nike' && $brands==null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Nike" id="Nike" checked>
                                        <label class="form-check-label" for="Nike">
                                            Nike
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Nike" id="Nike" onclick="document.getElementById('totesMarcas').checked=false">
                                        <label class="form-check-label" for="Nike">
                                            Nike
                                        </label>
                                    </div>
                                @endif

                                @if($brands!=null && in_array('Adidas',$brands) && sizeof($brands) != 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Adidas" id="Adidas" checked>
                                        <label class="form-check-label" for="Adidas">
                                            Adidas
                                        </label>
                                    </div>
                                @elseif(strtolower($search) == 'adidas' && $brands==null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Adidas" id="Adidas" checked>
                                        <label class="form-check-label" for="Adidas">
                                            Adidas
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Adidas" id="Adidas" onclick="document.getElementById('totesMarcas').checked=false">
                                        <label class="form-check-label" for="Adidas">
                                            Adidas
                                        </label>
                                    </div>
                                @endif

                                @if($brands!=null && in_array('Converse',$brands) && sizeof($brands) != 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Converse" id="Converse" checked>
                                        <label class="form-check-label" for="Converse">
                                            Converse
                                        </label>
                                    </div>
                                @elseif(strtolower($search) == 'converse' && $brands==null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Converse" id="Converse" checked>
                                        <label class="form-check-label" for="Converse">
                                            Converse
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Converse" id="Converse" onclick="document.getElementById('totesMarcas').checked=false">
                                        <label class="form-check-label" for="Converse">
                                            Converse
                                        </label>
                                    </div>
                                @endif

                                @if($brands!=null && in_array('New Balance',$brands) && sizeof($brands) != 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="New Balance" id="newBalance" checked>
                                        <label class="form-check-label" for="newBalance">
                                            New Balance
                                        </label>
                                    </div>
                                @elseif(strtolower($search) == 'new balance' || strtolower($search) == 'newbalance' && $brands==null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="New Balance" id="newBalance" checked>
                                        <label class="form-check-label" for="newBalance">
                                            New Balance
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="New Balance" id="newBalance" onclick="document.getElementById('totesMarcas').checked=false">
                                        <label class="form-check-label" for="newBalance">
                                            New Balance
                                        </label>
                                    </div>
                                @endif

                                @if($brands!=null && in_array('Puma',$brands) && sizeof($brands) != 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Puma" id="Puma" checked>
                                        <label class="form-check-label" for="Puma">
                                            Puma
                                        </label>
                                    </div>
                                @elseif(strtolower($search) == 'puma' && $brands==null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Puma" id="Puma" checked>
                                        <label class="form-check-label" for="Puma">
                                            Puma
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Puma" id="Puma" onclick="document.getElementById('totesMarcas').checked=false">
                                        <label class="form-check-label" for="Puma">
                                            Puma
                                        </label>
                                    </div>
                                @endif

                                @if($brands!=null && in_array('ASICS',$brands) && sizeof($brands) != 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="ASICS" id="ASICS" checked>
                                        <label class="form-check-label" for="ASICS">
                                            ASICS
                                        </label>
                                    </div>
                                @elseif(strtolower($search) == 'asics' && $brands==null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="ASICS" id="ASICS" checked>
                                        <label class="form-check-label" for="ASICS">
                                            ASICS
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="ASICS" id="ASICS" onclick="document.getElementById('totesMarcas').checked=false">
                                        <label class="form-check-label" for="ASICS">
                                            ASICS
                                        </label>
                                    </div>
                                @endif

                                @if($brands!=null && in_array('FILA',$brands) && sizeof($brands) != 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="FILA" id="FILA" checked>
                                        <label class="form-check-label" for="FILA">
                                            FILA
                                        </label>
                                    </div>
                                @elseif(strtolower($search) == 'fila' && $brands==null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="FILA" id="FILA" checked>
                                        <label class="form-check-label" for="FILA">
                                            FILA
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="FILA" id="FILA" onclick="document.getElementById('totesMarcas').checked=false">
                                        <label class="form-check-label" for="FILA">
                                            FILA
                                        </label>
                                    </div>
                                @endif

                                @if($brands!=null && in_array('Lacoste',$brands) && sizeof($brands) != 8)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Lacoste" id="Lacoste" checked>
                                        <label class="form-check-label" for="Lacoste">
                                            Lacoste
                                        </label>
                                    </div>
                                @elseif(strtolower($search) == 'lacoste' && $brands==null)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Lacoste" id="Lacoste" checked>
                                        <label class="form-check-label" for="Lacoste">
                                            Lacoste
                                        </label>
                                    </div>
                                @else
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="marcas[]" value="Lacoste" id="Lacoste" onclick="document.getElementById('totesMarcas').checked=false">
                                        <label class="form-check-label" for="Lacoste">
                                            Lacoste
                                        </label>
                                    </div>
                                @endif

                            </div>

                            <hr>

                            <div>
                                <h6>Preu</h6>

                                @if($price == null)

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="preu" value="tots" id="totsPreus" checked>
                                    <label class="form-check-label" for="totsPreus">
                                    Tots els preus
                                    </label>
                                </div>

                                @elseif($price == 'tots')

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="tots" id="totsPreus" checked>
                                        <label class="form-check-label" for="totsPreus">
                                        Tots els preus
                                        </label>
                                    </div>

                                @else

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="tots" id="totsPreus">
                                        <label class="form-check-label" for="totsPreus">
                                        Tots els preus
                                        </label>
                                    </div>

                                @endif

                                @if($price == '20-50')

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="20-50" id="20-50" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            20€ - 50€
                                        </label>
                                    </div>

                                @else
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="20-50" id="20-50">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            20€ - 50€
                                        </label>
                                    </div>
                                @endif

                                @if($price == '50-70')

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="50-70" id="50-70" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            50€ - 70€
                                        </label>
                                    </div>

                                @else
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="50-70" id="50-70">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            50€ - 70€
                                        </label>
                                    </div>

                                @endif

                                @if($price == '70-90')

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="70-90" id="70-90" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            70€ - 90€
                                        </label>
                                    </div>

                                @else
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="70-90" id="70-90">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            70€ - 90€
                                        </label>
                                    </div>

                                @endif

                                @if($price == '90-100')

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="90-100" id="90-100" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            90€ - 110€
                                        </label>
                                    </div>

                                @else
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="90-100" id="90-100">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            90€ - 110€
                                        </label>
                                    </div>

                                @endif

                                @if($price == '110-140')

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="110-140" id="110-140" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            110€ - 140€
                                        </label>
                                    </div>

                                @else
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="110-140" id="110-140">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            110€ - 140€
                                        </label>
                                    </div>

                                @endif

                                @if($price == '140-200')

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="140-200" id="140-200" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            140€ - 200€
                                        </label>
                                    </div>

                                @else
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="140-200" id="140-200">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            140€ - 200€
                                        </label>
                                    </div>

                                @endif

                                @if($price == '+200')

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="+200" id="+200" checked>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            +200€
                                        </label>
                                    </div>

                                @else
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="preu" value="+200" id="+200">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            +200€
                                        </label>
                                    </div>

                                @endif

                            </div>

                        </form>
                    </div>
                    <div class="offcanvas-footer">
                        <button type="submit" class="btn btn-dark btn-block" style="border-radius:0px; text-align:center;" onclick="document.getElementById('shopFilter').submit()">Aplicar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3" style="margin-top:60px;">
            @forelse ($products as $product)
                
                <div class="col-12 col-lg-3 mb-4"> 

                    
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

                                        <img src={{asset("imgs/".$imgP->url)}} class="card-img-top" alt="...">
                                        
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
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="{{ asset('js/shop.js')}}"></script>
@endsection