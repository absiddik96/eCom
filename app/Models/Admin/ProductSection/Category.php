<?php

namespace App\Models\Admin\ProductSection;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function type()
    {
    	return $this->belongsTo('App\Models\Admin\ProductSection\Type');
    }

    public function getNameAttribute($value = '')
    {
    	return strtoupper($value);
    }

    public function subCategories()
    {
    	return $this->hasMany('App\Models\Admin\ProductSection\SubCategory');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Admin\Product\Product');
    }
}
