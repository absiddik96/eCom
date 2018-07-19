<?php

namespace App\Models\Admin\ProductAccessories\Brand;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\ProductAccessories\Type\Type');
    }

    public function getNameAttribute($value = '')
    {
    	return strtoupper($value);
    }

    public function getIconAttribute($value = '')
    {
    	return asset('images/brand/icons/thumbnail/'.$value);
    }
}
