<?php

namespace App\Models\Admin\ProductAccessories;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    function getNameAttribute($value='')
    {
    	return strtoupper($value);
    }
}
