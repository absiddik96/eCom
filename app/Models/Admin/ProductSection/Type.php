<?php

namespace App\Models\Admin\ProductSection;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    function getTypeAttribute($value='')
    {
    	return strtoupper($value);
    }

    public function categories()
    {
    	return $this->hasMany('App\Models\Admin\ProductSection\Category');
    }
}
