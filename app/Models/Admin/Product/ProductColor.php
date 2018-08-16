<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    public function color()
    {
    	return $this->belongsTo('App\Models\Admin\ProductAccessories\Color');
    }
}
