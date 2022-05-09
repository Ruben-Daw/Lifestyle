<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class shopController extends Controller
{

    //protected $search = "ocho";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = "";

        if($request->get('search') !== null)
        {
            $search = trim($request->get('search'));
        }
        else
        {
            $search = trim($request->get('searchOrder'));
        }

        $order = trim($request->get('order'));

        $products = DB::table('products as p')
            ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
            ->join('categories as c','p.category_id','=','c.category_id')
            ->where('p.name','LIKE','%'.$search.'%')
            ->orWhere('c.name','LIKE','%'.$search.'%')
            ->orWhere('p.brand','LIKE','%'.$search.'%')
            ->paginate(10);
        
        if($order == 'baix-alt')
        {
            $products = DB::table('products as p')
                ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                ->join('categories as c','p.category_id','=','c.category_id')
                ->where('p.name','LIKE','%'.$search.'%')
                ->orWhere('c.name','LIKE','%'.$search.'%')
                ->orWhere('p.brand','LIKE','%'.$search.'%')
                ->orderBy('p.price', 'asc')
                ->paginate(10);
        }

        else if($order == 'alt-baix')
        {
            $products = DB::table('products as p')
                ->select('p.product_id', 'p.name as name', 'p.description', 'p.price as price', 'p.brand', 'c.name as categoryName')
                ->join('categories as c','p.category_id','=','c.category_id')
                ->where('p.name','LIKE','%'.$search.'%')
                ->orWhere('c.name','LIKE','%'.$search.'%')
                ->orWhere('p.brand','LIKE','%'.$search.'%')
                ->orderBy('p.price', 'desc')
                ->paginate(10);
        }

        $imageProducts = DB::table('images_products')
            ->where('primary','=','True')
            ->get()
            ->toarray();


        return view('shop', compact('products','imageProducts','search','order'));

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
