<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\Product\Type');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Admin\Product\Category');
    }

    public function getNameAttribute($value = '')
    {
    	return strtoupper($value);
    }
}
