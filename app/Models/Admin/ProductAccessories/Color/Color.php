<?php

namespace App\Models\Admin\ProductAccessories\Color;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    function getNameAttribute($value='')
    {
    	return strtoupper($value);
    }
}
