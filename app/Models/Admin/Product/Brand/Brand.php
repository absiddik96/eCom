<?php

namespace App\Models\Admin\Product\Brand;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\Product\Type\Type');
    }

    public function getIconAttribute($value = '')
    {
    	return asset('icons/thumbnail/'.$value);
    }
}
