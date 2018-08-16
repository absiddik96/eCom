<?php

namespace App\Models\Admin\ProductAccessories;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\ProductSection\Type');
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
