<?php

namespace App\Models\Admin\Product;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    function getTypeAttribute($value='')
    {
    	return strtoupper($value);
    }
}
