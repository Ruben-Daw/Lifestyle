@extends('admin.layout')

@section('content')
    <div class="page-wrapper bg-gra-03 p-t-100 p-b-50" style="margin-top:30px; margin-bottom:30px;">
        <div class="wrapper wrapper--w900">
            <div class="card card-6" style="border:none;">
                <div class="card-heading">
                    <h2 class="title">Editar producte</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('products.update', $product->product_id)}} "method="POST">

                        @csrf
                        @method('PATCH')

                        <div class="form-row">
                            <div class="name">Nom</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="name" id="name" value="{{$product->name}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Descripció</div>
                            <div class="value">
                                <textarea class="input--style-6" name="description" id="description" required>{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Preu(€)</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="price" id="price" value="{{$product->price}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Marca</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="brand" id="brand" value="{{$product->brand}}" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Categoria</div>
                            <div class="value">
                                <select class="input--style-6 form-select" name="category" id="category">
                                    @foreach ($categories as $category)
                                        @if ($category->category_id == $product->category_id)
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
                                <select class="input--style-6 form-select" name="type" id="type">
                                    @foreach ($types as $type)
                                        @if ($type->type_id == $product->type_id)
                                            <option value="{{$type->name}}" selected>{{$type->name}}</option>
                                        @else
                                            <option value="{{$type->name}}" >{{$type->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                        <div class="card-footer">
                            <button class="btn btn--radius-2 btn--blue-2" type="submit">Modificar</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection