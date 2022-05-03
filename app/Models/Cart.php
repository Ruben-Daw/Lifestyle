<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'products_cart';

    protected $primaryKey = 'product_cart_id';

    protected $fillable = ['user_id', 'product_id', 'size', 'quantity'];
}
