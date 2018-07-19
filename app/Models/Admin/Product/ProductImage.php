<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function getImageAttribute($value = '')
    {
    	return asset('images/product/images/thumbnail/'.$value);
    }
}
