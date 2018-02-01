<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class SysCity extends Model
{
    protected $fillable = ['country_id','division_id','name'];
    
    public function getNameAttribute($value='')
    {
        return strtoupper($value);
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Location\SysCountry');
    }
    public function division()
    {
        return $this->belongsTo('App\Models\Location\SysDivision');
    }
}
