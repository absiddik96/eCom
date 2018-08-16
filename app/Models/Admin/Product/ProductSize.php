<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    public function size()
    {
    	return $this->belongsTo('App\Models\Admin\ProductAccessories\Size');
    }
}
