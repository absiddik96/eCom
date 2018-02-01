<?php

namespace App\Http\Controllers\PublicLocation;

use Illuminate\Http\Request;
use App\Models\Location\SysCity;
use App\Models\Location\SysWord;
use App\Models\Location\SysVillage;
use App\Http\Controllers\Controller;
use App\Models\Location\SysDivision;
use App\Models\Location\SysPoliceStation;

class SysLocationController extends Controller
{
    public function getDivision(Request $request)
    {
        $country_id = $request->id;
        $divisions = SysDivision::where('country_id',$country_id)->get()->toArray();
        return $divisions;
    }

    public function getCity(Request $request)
    {
        $division_id = $request->id;
        $cities = SysCity::where('division_id',$division_id)->get()->toArray();
        return $cities;
    }

    public function getPoliceStation(Request $request)
    {
        $city_id = $request->id;
        $policeStations = SysPoliceStation::where('city_id',$city_id)->get()->toArray();
        return $policeStations;
    }
    public function getWord(Request $request)
    {
        $police_station_id = $request->id;
        $words = SysWord::where('police_station_id',$police_station_id)->get()->toArray();
        return $words;
    }
    public function getVillage(Request $request)
    {
        $word_id = $request->id;
        $villages = SysVillage::where('word_id',$word_id)->get()->toArray();
        return $villages;
    }
}
