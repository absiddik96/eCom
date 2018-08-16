<?php

namespace App\Models\Admin\ProductAccessories;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    function getSizeAttribute($value='')
    {
    	return strtoupper($value);
    }
}
