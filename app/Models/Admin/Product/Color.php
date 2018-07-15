<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    function getColorAttribute($value='')
    {
    	return strtoupper($value);
    }
}
