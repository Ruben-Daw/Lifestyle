<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cartProducts = DB::table('products_cart as pc')
        ->select('pc.product_cart_id','pc.user_id','pc.product_id','pc.size','pc.quantity', 'p.name','p.price','p.brand', 'i.image_product_id', 'i.url')
        ->join('products as p','p.product_id','=','pc.product_id')
        ->join('images_products as i','i.product_id','=','pc.product_id')
        ->whereRaw('i.primary = True')
        ->where('pc.user_id','=',auth()->id())
        ->get()
        ->toarray();

        $sizes = DB::table('products_cart as pc')
            ->select('pc.product_cart_id','pc.user_id','pc.product_id', 's.size')
            ->join('products_size as s','s.product_id','=','pc.product_id')
            ->where('pc.user_id','=',auth()->id())
            ->orderBy('s.size','asc')
            ->get()
            ->toarray();

        return view('cart', compact('cartProducts','sizes'));
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
    public function store($user_id, $product_id, $size, $quantity)
    {

        $productCartExists = DB::table('products_cart')
            ->where('product_id','=',$product_id)
            ->where('size','=',$size)
            ->get()
            ->toarray();

        if(sizeof($productCartExists) == 0)
        {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'size' => $size,
                'quantity' => $quantity
            ]);
        }
        else
        {
            return redirect()->route('shop.index')->withSuccess('Ja tens aquest producte amb aquesta talla al teu carrito.');
        }

        return redirect()->route('cart.index');
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

        $product_id = DB::table('products_cart')
            ->select('product_id')
            ->where('product_cart_id', '=', $id)
            ->get()
            ->toarray()[0]->product_id;

        $stock = DB::table('products_size')
            ->select('stock')
            ->where('product_id', '=', $product_id)
            ->where('size', '=', $request->get('talla'))
            ->get()
            ->toarray()[0]->stock;

        if($stock >=  $request->get('quantitat'))
        {
            Cart::find($id)->update([
                'size' => $request->get('talla'),
                'quantity' => $request->get('quantitat')
            ]);
        }
        else{
            redirect()->back()->withSuccess('La quantitat a escollir no pot ser major que el stock del producte');
        }

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy($id);

        return redirect()->route('cart.index');
    }
}
