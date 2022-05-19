<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\images_products;
use App\Models\products_size;
use Illuminate\Support\Facades\DB;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = trim($request->get('search'));

        $products = DB::table('products as p')
            ->select('p.product_id', 'p.name as productName', 'p.description', 'p.price', 'p.brand', 'c.category_id', 'c.name as categoryName', 't.type_id', 't.name as typeName')
            ->join('categories as c', 'c.category_id', '=', 'p.category_id')
            ->join('types as t', 't.type_id', '=', 'p.type_id')
            ->where('p.name','LIKE','%'.$search.'%')
            ->orWhere('p.description','LIKE','%'.$search.'%')
            ->orWhere('p.brand','LIKE','%'.$search.'%')
            ->orWhere('c.name','LIKE','%'.$search.'%')
            ->orWhere('t.name','LIKE','%'.$search.'%')
            ->orderBy('p.name','asc')
            ->paginate(10);

        return view('admin.products', compact('products','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')
        ->get()
        ->toarray();

        $types = DB::table('types')
        ->get()
        ->toarray();

        return view('admin.addProduct', compact('categories', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category_id = DB::table('categories')
        ->select('category_id')
        ->where('name','=',$request->get('category'))
        ->get()
        ->toarray()[0];

        $type_id = DB::table('types')
        ->select('type_id')
        ->where('name','=',$request->get('type'))
        ->get()
        ->toarray()[0];
        
        if($request->get('name') !== null && $request->get('description') !== null && $request->get('price') !== null &&
        $request->get('brand') !== null && $request->get('category') !== null && $request->get('type') !== null && 
        $request->hasFile('image') && $request->get('talla') !== null)
        {
            if(is_numeric($request->get('price'))){
                $image = $request->file('image');
                if($image->getClientMimeType() == 'image/jpg' || $image->getClientMimeType() == 'image/png' || $image->getClientMimeType() == 'image/jpeg')
                {
                    $resolution = getimagesize($image->getRealPath());
                    if($resolution[0]==520 && $resolution[1]==520)
                    {

                        Product::create([
                            'name' => $request->get('name'),
                            'description' => $request->get('description'),
                            'price' => $request->get('price'),
                            'brand' => $request->get('brand'),
                            'category_id' => $category_id->category_id,
                            'type_id' => $type_id->type_id
                        ]);

                        $lastProductId = DB::table('products')
                        ->select('product_id')
                        ->orderBy('product_id','desc')
                        ->get()
                        ->toarray()[0];

                        for ($i=0; $i < sizeof($request->get('talla')); $i++) { 
                            products_size::create([
                                'product_id'=>$lastProductId->product_id,
                                'size'=>$request->get('talla')[$i],
                                'stock'=>$request->get('stockTalla'.$request->get('talla')[$i])
                            ]);
                        }

                        $originalName = $image->getClientOriginalName();
                        $route = public_path('/imgs');
                        $image->move($route, $originalName);

                        images_products::create([
                            'product_id'=> $lastProductId->product_id,
                            'url'=> $originalName,
                            'primary'=> 'True'
                        ]);

                        return redirect()->route('products.index')->withSuccess('Producte afegit correctament');

                    }else{
                        return redirect()->back()->with('message', "La imatge ha de tenir una resolució de 520x520")
                        ->with('name',$request->get('name'))->with('description',$request->get('description'))->with('price',$request->get('price'))
                        ->with('brand',$request->get('brand'))->with('category',$request->get('category'))->with('type',$request->get('type'));
                    }
                }
                else{
                    return redirect()->back()->with('message', "El archiu a pujar ha de ser una imatge amb les extensions jpg o png") 
                    ->with('name',$request->get('name'))->with('description',$request->get('description'))->with('price',$request->get('price'))
                    ->with('brand',$request->get('brand'))->with('category',$request->get('category'))->with('type',$request->get('type'));
                }
            
            }
            else{
                return redirect()->back()->with('message', "El preu ha de ser numeric")
                ->with('name',$request->get('name'))->with('description',$request->get('description'))->with('brand',$request->get('brand'))
                ->with('category',$request->get('category'))->with('type',$request->get('type'));
            }
        }
        else
        {
            return redirect()->back()->with('message', "Has de omplenar tots els camps i agafar com a mimin, una talla amb el seu stock per poder crear un nou producte")
                ->with('name',$request->get('name'))->with('description',$request->get('description'))->with('price',$request->get('price'))
                ->with('brand',$request->get('brand'))->with('category',$request->get('category'))->with('type',$request->get('type'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = DB::table('products')
            ->where('product_id', '=', $id)
            ->get()
            ->toarray()[0];
        
        $categories = DB::table('categories')
            ->get()
            ->toarray();

        $types = DB::table('types')
        ->get()
        ->toarray();
        
        return view('admin.editProduct', compact('product','categories','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->get('name') !== null && $request->get('description') !== null && ($request->get('price') !== null && 
        is_numeric($request->get('price'))) && $request->get('brand') !== null && $request->get('category') !== null &&
         $request->get('type') !== null)
        {

            $category_id = DB::table('categories')
                ->select('category_id')
                ->where('name','=',$request->get('category'))
                ->get()
                ->toarray()[0];

            $type_id = DB::table('types')
            ->select('type_id')
            ->where('name','=',$request->get('type'))
            ->get()
            ->toarray()[0];

            Product::find($id)->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'price' => $request->get('price'),
                'brand' => $request->get('brand'),
                'category_id' => $category_id->category_id,
                'type_id' => $type_id->type_id,
            ]);

            return redirect()->route('products.index')->withSuccess('Producte modificat amb èxit');
        }
        else
        {
            return redirect()->back()->with('message', "Els valors a modificar no són correctes, asseguri's que el preu sigui un valor numèric i que hagi completat tots els camps");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect()->route('products.index');
    }
}
