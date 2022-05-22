<?php

use Illuminate\Support\Facades\DB;


/**
 * It returns the sum of the quantity of all products in the cart for the current user.
 * 
 * @return The number of products in the cart.
 */
    function getProductsCartNum()
    {
        return DB::table('products_cart')
        ->where('user_id','=',auth()->id())
        ->sum('quantity');

    }

/**
 * It gets the total price of all products in the cart by joining the products table with the
 * products_cart table, filtering by the user_id, and summing the price of each product multiplied by
 * the quantity of each product.
 * 
 * @return The total price of all products in the cart.
 */
    function getProductsCartTotalPrice()
    {
        return DB::table('products_cart as pc')
            ->join('products as p','p.product_id','=','pc.product_id')
            ->where('pc.user_id','=',auth()->id())
            ->sum(DB::raw('p.price * pc.quantity'));
    }

/**
 * It checks if the user has already favorited the product
 * 
 * @param product_id The id of the product you want to check if it's in the user's favorites.
 * 
 * @return a boolean value.
 */
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

/**
 * It returns the number of rows in the favorite_products table where the user_id column is equal to
 * the id of the currently logged in user.
 * 
 * @return The number of rows in the favorite_products table where the user_id column is equal to the
 * id of the currently logged in user.
 */
    function getFavoriteProductsNum()
    {
        return DB::table('favorite_products')
        ->where('user_id','=',auth()->id())
        ->count();
    }

?>