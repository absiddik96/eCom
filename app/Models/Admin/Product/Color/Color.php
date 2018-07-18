<?php

namespace App\Models\Admin\Product\Color;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    function getNameAttribute($value='')
    {
    	return strtoupper($value);
    }
}
