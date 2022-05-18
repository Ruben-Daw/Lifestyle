<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images_products extends Model
{
    use HasFactory;

    protected $table = 'images_products';

    protected $primaryKey = 'image_product_id';

    protected $fillable = ['product_id', 'url', 'primary'];
}
