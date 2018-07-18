<?php

namespace App\Models\Admin\Product\Category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\Product\Type\Type');
    }

    public function getNameAttribute($value = '')
    {
    	return strtoupper($value);
    }
}
