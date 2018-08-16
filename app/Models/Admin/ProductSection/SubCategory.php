<?php

namespace App\Models\Admin\ProductSection;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\ProductSection\Type');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Admin\ProductSection\Category');
    }

    public function getNameAttribute($value = '')
    {
    	return strtoupper($value);
    }
}
