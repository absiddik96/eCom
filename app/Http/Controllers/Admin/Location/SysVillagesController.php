<?php

namespace App\Http\Controllers\Admin\Location;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Location\SysCountry;
use App\Models\Location\SysVillage;
use App\Http\Controllers\Controller;

class SysVillagesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $villages = SysVillage::all();
        return view('admin.location.village.index',compact('villages'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $countries = SysCountry::pluck('name','id')->all();
        return view('admin.location.village.create',compact('countries'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request,[
            'country_id' => 'Required|numeric',
            'division_id' => 'Required|numeric',
            'city_id' => 'Required|numeric',
            'police_station_id' => 'Required|numeric',
            'word_id' => 'Required|numeric',
            'name' => 'required|min:2|max:150|unique:sys_villages',
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if (SysVillage::create($input)) {
            Session::flash('success','Village Added successfully');
        }
        return redirect()->route('sys-village.create');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        return view('admin.location.village.edit')
        ->with('countries', SysCountry::pluck('name','id')->all())
        ->with('village', SysVillage::find($id));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $village = SysVillage::find($id);

        $this->validate($request,[
            'country_id' => 'Required|numeric',
            'division_id' => 'Required|numeric',
            'city_id' => 'Required|numeric',
            'police_station_id' => 'Required|numeric',
            'word_id' => 'Required|numeric',
            'name' => 'required|min:2|max:150|unique:sys_villages,name,'.$village->id,
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if ($village->update($input)) {
            Session::flash('success','Village update successfully');
        }
        return redirect()->route('sys-village.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $village = SysVillage::find($id);

        if ($village->delete()) {
            Session::flash('success','Village delete successfully');
        }
        return redirect()->route('sys-village.index');
    }
}
