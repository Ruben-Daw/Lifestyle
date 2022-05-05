<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorite_products';

    protected $primaryKey = 'favorite_product_id';

    protected $fillable = ['user_id', 'product_id'];
}
