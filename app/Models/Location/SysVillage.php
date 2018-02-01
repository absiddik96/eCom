<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Model;

class SysVillage extends Model
{
    protected $fillable = ['country_id','division_id','city_id','police_station_id','word_id','name'];

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
    public function city()
    {
        return $this->belongsTo('App\Models\Location\SysCity');
    }
    public function policeStation()
    {
        return $this->belongsTo('App\Models\Location\SysPoliceStation');
    }
    public function word()
    {
        return $this->belongsTo('App\Models\Location\SysWord');
    }
}
