<?php

use Illuminate\Support\Facades\DB;


    function getProductsCartNum()
    {
        return DB::table('products_cart')
            ->where('user_id','=',auth()->id())
            ->count();
    }

    function getProductsCartTotalPrice()
    {
        return DB::table('products_cart as pc')
            ->join('products as p','p.product_id','=','pc.product_id')
            ->where('pc.user_id','=',auth()->id())
            ->sum(DB::raw('p.price * pc.quantity'));
    }

?>