<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class SysCountry extends Model
{
    protected $fillable = ['name'];

    public function getNameAttribute($value='')
    {
        return strtoupper($value);
    }
}
