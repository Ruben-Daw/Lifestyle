<?php

use Illuminate\Support\Facades\DB;


    function getProductsCartNum()
    {
        return DB::table('products_cart')
        ->where('user_id','=',auth()->id())
        ->sum('quantity');

    }

    function getProductsCartTotalPrice()
    {
        return DB::table('products_cart as pc')
            ->join('products as p','p.product_id','=','pc.product_id')
            ->where('pc.user_id','=',auth()->id())
            ->sum(DB::raw('p.price * pc.quantity'));
    }

    function favoriteProductExists($product_id)
    {
        $exists = DB::table('favorite_products')
            ->where('user_id','=',auth()->id())
            ->where('product_id','=',$product_id)
            ->get()
            ->toarray();

        if(sizeof($exists) == 0){
            return false;
        }

        return true;
    }

    function getFavoriteProductsNum()
    {
        return DB::table('favorite_products')
        ->where('user_id','=',auth()->id())
        ->count();
    }

?>