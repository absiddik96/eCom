<?php

namespace App\Models\Admin\ProductAccessories\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\ProductAccessories\Type\Type');
    }

    public function getNameAttribute($value = '')
    {
    	return strtoupper($value);
    }
}
