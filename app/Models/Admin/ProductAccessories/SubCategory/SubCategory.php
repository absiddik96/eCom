<?php

namespace App\Models\Admin\ProductAccessories\SubCategory;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\ProductAccessories\Type\Type');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Admin\ProductAccessories\Category\Category');
    }

    public function getNameAttribute($value = '')
    {
    	return strtoupper($value);
    }
}
