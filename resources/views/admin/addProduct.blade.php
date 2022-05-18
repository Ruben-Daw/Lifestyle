@extends('admin.layout')

@section('content')
    <div class="page-wrapper bg-gra-03 p-t-100 p-b-50" style="margin-top:30px; margin-bottom:30px;">
        <div class="wrapper wrapper--w900">
            <div class="card card-6" style="border:none;">
                <div class="card-heading">
                    <h2 class="title">Afegir producte</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('products.store')}} "method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="form-row">
                            <div class="name">Nom</div>
                            <div class="value">
                                @if(session()->has('name'))
                                    <input class="input--style-6" type="text" name="name" id="name" value="{{session('name')}}" required>
                                @else
                                    <input class="input--style-6" type="text" name="name" id="name" required>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Descripció</div>
                            <div class="value">
                                @if(session()->has('description'))
                                    <textarea class="textarea--style-6" name="description" id="description" aria-required="true" required>{{session('description')}}</textarea>
                                @else
                                    <textarea class="textarea--style-6" name="description" id="description" aria-required="true" required></textarea>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Preu(€)</div>
                            <div class="value">
                                @if(session()->has('price'))
                                    <input class="input--style-6" type="text" name="price" id="price" aria-required="true" value="{{session('price')}}" required>
                                @else
                                    <input class="input--style-6" type="text" name="price" id="price" aria-required="true" required>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Marca</div>
                            <div class="value">
                                @if(session()->has('brand'))
                                    <input class="input--style-6" type="text" name="brand" id="brand" value="{{session('brand')}}" required>
                                @else
                                    <input class="input--style-6" type="text" name="brand" id="brand" required>
                                @endif
                                
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Categoria</div>
                            <div class="value">
                                <select class="input--style-6 form-select" name="category" id="category" required>
                                    @foreach ($categories as $category)

                                    @if(session()->has('category') && $category->name == session('category'))
                                        <option value="{{$category->name}}" selected>{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->name}}" >{{$category->name}}</option>
                                    @endif

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Genere</div>
                            <div class="value">
                                <select class="input--style-6 form-select" name="type" id="type" required>
                                    @foreach ($types as $type)

                                    @if(session()->has('type') && $type->name == session('type'))
                                        <option value="{{$type->name}}" selected>{{$type->name}}</option>
                                    @else
                                        <option value="{{$type->name}}" >{{$type->name}}</option>
                                    @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Imatge primaria</div>
                            <div class="value">
                                <div class="input-group js-input-file">
                                    <input type="file" name="image" id="image" required>
                                </div>
                                <div class="label--desc">La imatge ha de tenir una resolució de 520x520 i la extensió ha de ser jpg o png. </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Tallas disponibles</div>
                            <div class="value">
                                    <input class="form-check-input" type="checkbox" name="talla[]" value="34" id="talla34">
                                    <label class="form-check-label" for="talla34">
                                    34
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla34" for="stockTalla34" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla34" id="stockTalla34" min="1" style="border:1px solid #999;" hidden> 

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="35" id="talla35">
                                    <label class="form-check-label" for="talla35">
                                    35
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla35" for="stockTalla35" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla35" id="stockTalla35" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="36" id="talla36">
                                    <label class="form-check-label" for="talla36">
                                    36
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla36" for="stockTalla36" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla36" id="stockTalla36" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="37" id="talla37">
                                    <label class="form-check-label" for="talla37">
                                    37
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla37" for="stockTalla37" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla37" id="stockTalla37" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="38" id="talla38">
                                    <label class="form-check-label" for="talla38">
                                    38
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla38" for="stockTalla38" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla38" id="stockTalla38" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="39" id="talla39">
                                    <label class="form-check-label" for="talla39">
                                    39
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla39" for="stockTalla39" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla39" id="stockTalla39" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="40" id="talla40">
                                    <label class="form-check-label" for="talla40">
                                    40
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla40" for="stockTalla40" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla40" id="stockTalla40" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="41" id="talla41">
                                    <label class="form-check-label" for="talla41">
                                    41
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla41" for="stockTalla41" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla41" id="stockTalla41" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="42" id="talla42">
                                    <label class="form-check-label" for="talla42">
                                    42
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla42" for="stockTalla42" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla42" id="stockTalla42" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="43" id="talla43">
                                    <label class="form-check-label" for="talla43">
                                    43
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla43" for="stockTalla43" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla43" id="stockTalla43" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="44" id="talla44">
                                    <label class="form-check-label" for="talla44">
                                    44
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla44" for="stockTalla44" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla44" id="stockTalla44" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="45" id="talla45">
                                    <label class="form-check-label" for="talla45">
                                    45
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla45" for="stockTalla45" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla45" id="stockTalla45" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="46" id="talla46">
                                    <label class="form-check-label" for="talla46">
                                    46
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla46" for="stockTalla46" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla46" id="stockTalla46" min="1" style="border:1px solid #999;" hidden>

                                    <br>

                                    <input class="form-check-input" type="checkbox" name="talla[]" value="47" id="talla47">
                                    <label class="form-check-label" for="talla47">
                                    47
                                    </label>
                                    <label class="form-check-label offset-1" id="labelStockTalla47" for="stockTalla47" hidden>
                                        stock: 
                                    </label>
                                    <input class="w-50" type="number" name="stockTalla47" id="stockTalla47" min="1" style="border:1px solid #999;" hidden>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Afegir</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/addProduct.js')}}"></script>
@endsection