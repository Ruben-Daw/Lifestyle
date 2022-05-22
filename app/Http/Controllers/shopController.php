<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{

/**
 * It gets the products from the database and returns them to the view.
 * 
 * @param Request request The request object.
 * @param category the category of the product
 * @param type null
 */
    public function index(Request $request, $category = null, $type = null)
    {

        // dd($request->get('price'));

        $search = "";
        $products = "";
        $sizes = [];
        $categories = [];
        $brands = [];
        $minPrice = null;
        $maxPrice = null;
        $price = null;

        if($request->get('talla')!==null )
        {

            if($request->get('talla')[0] === "totes")
            {

                for ($i=34; $i <= 47 ; $i++) { 
                    array_push($sizes, $i);
                }

            }
            else
            {
                $sizes = $request->get('talla');
            }

            

        }
        else
        {
            $sizes = null;
        }

        if($request->get('categories')!==null )
        {

            if($request->get('categories')[0] == 'totes')
            {
                $catBd = DB::table('categories')
                    ->get()
                    ->toarray();

                foreach($catBd as $cat)
                {
                    array_push($categories, $cat->name);
                }
            }
            else
            {
                $categories = $request->get('categories');
            }

        }
        else
        {
            $categories = null;
        }

        if($request->get('marcas')!==null )
        {

            if($request->get('marcas')[0] === "totes")
            {

                $brands[0]='Nike';
                $brands[1]='Adidas';
                $brands[2]='Converse';
                $brands[3]='New Balance';
                $brands[4]='Puma';
                $brands[5]='ASICS';
                $brands[6]='FILA';
                $brands[7]='Lacoste';

            }
            else
            {
                $brands = $request->get('marcas');
            }

            

        }
        else
        {   
            $brands = null;
        }

        if($request->get('preu')!==null )
        {

            $price = $request->get('preu');

            if($request->get('preu') !== "+200" && $request->get('preu') !== 'tots')
            {

                $priceArray = explode('-',$request->get('preu'));
                $minPrice = $priceArray[0];
                $maxPrice = $priceArray[1];

            }

        }

        if($request->get('search') !== null)
        {
            $search = trim($request->get('search'));
        } 
        else
        {
            $search = trim($request->get('searchOrder'));
        }

        $order = trim($request->get('order'));

        if($category == null && $type == null)
        {
            if($sizes!==null && $categories!==null && $brands!==null )
            {
                
                if($request->get('preu') !== "+200" && $request->get('preu') !== "tots")
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->whereBetween('p.price',[$minPrice, $maxPrice])
                        ->distinct()
                        ->get();
                }
                else if($request->get('preu') == "tots")
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->where('p.price','>',0)
                        ->distinct()
                        ->get();
                }
                else
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->where('p.price','>',200)
                        ->distinct()
                        ->get();
                }

            }
            else
            {
                $products = DB::table('products as p')
                    ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                    ->join('categories as c','p.category_id','=','c.category_id')
                    ->where('p.name','LIKE','%'.$search.'%')
                    ->orWhere('c.name','LIKE','%'.$search.'%')
                    ->orWhere('p.brand','LIKE','%'.$search.'%')
                    ->get();
                
                
            }
        }
        else
        {
            if($sizes!==null && $categories!==null && $brands!==null )
            {
                
                if($request->get('preu') !== "+200" && $request->get('preu') !== "tots")
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->whereBetween('p.price',[$minPrice, $maxPrice])
                        ->distinct()
                        ->get();
                }
                else if($request->get('preu') == "tots")
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->where('p.price','>',0)
                        ->distinct()
                        ->get();
                }
                else
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->where('p.price','>',200)
                        ->distinct()
                        ->get();
                }

            }
            else
            {
                $products = DB::table('products as p')
                    ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                    ->join('categories as c','p.category_id','=','c.category_id')
                    ->join('types as t','p.type_id','=','t.type_id')
                    ->where('c.name','=',$category)
                    ->where('t.name','=',$type)
                    ->get();
            }

        }
        
        if($order == 'baix-alt')
        {
            if($category == null && $type == null)
            {
                if($sizes!==null && $categories!==null && $brands!==null )
                {
                    
                    if($request->get('preu') !== "+200" && $request->get('preu') !== "tots")
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->whereBetween('p.price',[$minPrice, $maxPrice])
                            ->orderBy('p.price', 'asc')
                            ->distinct()
                            ->get();
                    }
                    else if($request->get('preu') == "tots")
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->where('p.price','>',0)
                            ->orderBy('p.price', 'asc')
                            ->distinct()
                            ->get();
                    }
                    else
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->where('p.price','>',200)
                            ->orderBy('p.price', 'asc')
                            ->distinct()
                            ->get();
                    }
    
                }
                else
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->where('p.name','LIKE','%'.$search.'%')
                        ->orWhere('c.name','LIKE','%'.$search.'%')
                        ->orWhere('p.brand','LIKE','%'.$search.'%')
                        ->orderBy('p.price', 'asc')
                        ->get();
                }

            }
            else
            {
                if($sizes!==null && $categories!==null && $brands!==null )
                {
                
                if($request->get('preu') !== "+200" && $request->get('preu') !== "tots")
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->whereBetween('p.price',[$minPrice, $maxPrice])
                        ->orderBy('p.price', 'asc')
                        ->distinct()
                        ->get();
                }
                else if($request->get('preu') == "tots")
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->where('p.price','>',0)
                        ->orderBy('p.price', 'asc')
                        ->distinct()
                        ->get();
                }
                else
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('products_size as ps','p.product_id','=','ps.product_id')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->whereIn('ps.size',$sizes)
                        ->whereIn('c.name',$categories)
                        ->whereIn('p.brand',$brands)
                        ->where('p.price','>',200)
                        ->orderBy('p.price', 'asc')
                        ->distinct()
                        ->get();
                }

                }
                else
                {
                    $products = DB::table('products as p')
                        ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                        ->join('categories as c','p.category_id','=','c.category_id')
                        ->join('types as t','p.type_id','=','t.type_id')
                        ->where('c.name','=',$category)
                        ->where('t.name','=',$type)
                        ->orderBy('p.price', 'asc')
                        ->get();
                }
            }
        }

        else if($order == 'alt-baix')
        {
            if($category == null && $type == null)
            {
                if($sizes!==null && $categories!==null && $brands!==null )
                {
                    
                    if($request->get('preu') !== "+200" && $request->get('preu') !== "tots")
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->whereBetween('p.price',[$minPrice, $maxPrice])
                            ->orderBy('p.price', 'desc')
                            ->distinct()
                            ->get();
                    }
                    else if($request->get('preu') == "tots")
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->where('p.price','>',0)
                            ->orderBy('p.price', 'desc')
                            ->distinct()
                            ->get();
                    }
                    else
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->where('p.price','>',200)
                            ->orderBy('p.price', 'desc')
                            ->distinct()
                            ->get();
                    }
    
                }
                else
                {
                    $products = DB::table('products as p')
                    ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                    ->join('categories as c','p.category_id','=','c.category_id')
                    ->where('p.name','LIKE','%'.$search.'%')
                    ->orWhere('c.name','LIKE','%'.$search.'%')
                    ->orWhere('p.brand','LIKE','%'.$search.'%')
                    ->orderBy('p.price', 'desc')
                    ->get();
                }
                
            }
            else
            {
                if($sizes!==null && $categories!==null && $brands!==null )
                {
                    
                    if($request->get('preu') !== "+200" && $request->get('preu') !== "tots")
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->whereBetween('p.price',[$minPrice, $maxPrice])
                            ->orderBy('p.price', 'desc')
                            ->distinct()
                            ->get();
                    }
                    else if($request->get('preu') == "tots")
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->where('p.price','>',0)
                            ->orderBy('p.price', 'desc')
                            ->distinct()
                            ->get();
                    }
                    else
                    {
                        $products = DB::table('products as p')
                            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                            ->join('products_size as ps','p.product_id','=','ps.product_id')
                            ->join('categories as c','p.category_id','=','c.category_id')
                            ->whereIn('ps.size',$sizes)
                            ->whereIn('c.name',$categories)
                            ->whereIn('p.brand',$brands)
                            ->where('p.price','>',200)
                            ->orderBy('p.price', 'desc')
                            ->distinct()
                            ->get();
                    }
    
                }
                else
                {
                    $products = DB::table('products as p')
                    ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                    ->join('categories as c','p.category_id','=','c.category_id')
                    ->join('types as t','p.type_id','=','t.type_id')
                    ->where('c.name','=',$category)
                    ->where('t.name','=',$type)
                    ->orderBy('p.price', 'desc')
                    ->get();
                }
            }
        }

        $imageProducts = DB::table('images_products')
            ->where('primary','=','True')
            ->get()
            ->toarray();

        return view('shop', compact('products','imageProducts','search','order', 'category', 'type','sizes','categories','brands','price'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        //
    }

    /**
     * It gets the product information, the images of the product, the sizes of the product and the
     * stock of the product
     * 
     * @param id the id of the product
     * @param Request request The request object.
     * 
     * @return The product, images, sizes and stock of the product.
     */
    public function show($id, Request $request)
    {

        $size=0;

        if($request->get('sizes') !== null)
        {
            $size = $request->get('sizes');
        }else{
            $size = intval(DB::table('products_size')
            ->where('product_id','=',$id)
            ->limit(1)
            ->orderBy('size', 'ASC')
            ->get()
            ->toarray()[0]->size);
        }

        $product = DB::table('products as p')
            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'i.url as url','c.name as categoryName')
            ->join('images_products as i','p.product_id','=','i.product_id')
            ->join('categories as c','p.category_id','=','c.category_id')
            ->where('p.product_id','=',$id)
            ->get()
            ->toarray()[0];
        
        $imagesProduct = DB::table('images_products')
        ->where('product_id','=',$id)
        ->get()
        ->toarray();

        $sizesProduct = DB::table('products_size')
        ->where('product_id','=',$id)
        ->where('stock','>',0)
        ->orderBy('size', 'ASC')
        ->get()
        ->toarray();

        $stockSizeProduct = DB::table('products_size')
        ->select('stock')
        ->where('product_id','=',$id)
        ->where('size', '=', $size)
        ->get()
        ->toarray()[0];

        return view('product', compact('product','imagesProduct','sizesProduct','stockSizeProduct','size'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
