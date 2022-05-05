<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class favoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favoriteProducts = DB::table('favorite_products as fp')
        ->select('fp.favorite_product_id','fp.user_id','fp.product_id','p.name','p.price', 'p.description', 'p.brand', 'i.image_product_id', 'i.url')
        ->join('products as p','p.product_id','=','fp.product_id')
        ->join('images_products as i','i.product_id','=','fp.product_id')
        ->whereRaw('i.primary = True')
        ->where('fp.user_id','=',auth()->id())
        ->get()
        ->toarray();

        $sizes = DB::table('favorite_products as fp')
            ->select('fp.favorite_product_id','fp.user_id','fp.product_id', 's.size')
            ->join('products_size as s','s.product_id','=','fp.product_id')
            ->where('fp.user_id','=',auth()->id())
            ->orderBy('s.size','asc')
            ->get()
            ->toarray();

        return view('favorites', compact('favoriteProducts', 'sizes'));

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
    public function store($user_id, $product_id)
    {
        $productFavsExists = DB::table('favorite_products')
            ->where('product_id','=',$product_id)
            ->get()
            ->toarray();


        if(sizeof($productFavsExists) == 0)
        {
            Favorite::create([
                'user_id' => $user_id,
                'product_id' => $product_id
            ]);
        }
        else
        {
            return redirect()->route('shop.index')->withSuccess('Ja tens aquest producte a la teva llista de favorits.');
        }

        return redirect()->back();
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
    public function destroy($product_id)
    {

        $id = DB::table('favorite_products')
            ->select('favorite_product_id')
            ->where('product_id', '=', $product_id)
            ->where('user_id','=',auth()->id())
            ->get()
            ->toarray()[0]->favorite_product_id;

        Favorite::destroy($id);

        return redirect()->back();
    }
}
