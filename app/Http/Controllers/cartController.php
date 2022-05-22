<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cartController extends Controller
{

    /**
     * I'm trying to get the sizes of the products and the products in the cart.
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
 * If the product doesn't exist in the cart, add it. If it does, redirect back to the shop with a
 * message
 * 
 * @param user_id 1
 * @param product_id The id of the product
 * @param size is the size of the product
 * @param quantity 1
 * 
 * @return The productCartExists variable is being returned.
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
     * I get the product_id from the product_cart table, then I get the stock from the products_size
     * table, then I check if the stock is greater than the quantity, if it is, I update the cart, if
     * not, I redirect back with a message.
     * </code>
     * 
     * @param Request request The request object.
     * @param id The id of the cart item
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
     * It destroys the cart.
     * 
     * @param id The ID of the item in the cart.
     * 
     * @return The cart is being destroyed.
     */
    public function destroy($id)
    {
        Cart::destroy($id);

        return redirect()->route('cart.index');
    }
}
