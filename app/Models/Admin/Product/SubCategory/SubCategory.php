<?php

namespace App\Models\Admin\Product\SubCategory;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\Product\Type\Type');
    }

    public function category()
    {
    	return $this->belongsTo('App\Models\Admin\Product\Category\Category');
    }

    public function getNameAttribute($value = '')
    {
    	return strtoupper($value);
    }
}
