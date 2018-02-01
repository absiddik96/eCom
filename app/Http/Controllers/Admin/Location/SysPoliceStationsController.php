<?php

namespace App\Http\Controllers\Admin\Location;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Location\SysCountry;
use App\Http\Controllers\Controller;
use App\Models\Location\SysPoliceStation;

class SysPoliceStationsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $policeStations = SysPoliceStation::all();
        return view('admin.location.policeStation.index',compact('policeStations'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $countries = SysCountry::pluck('name','id')->all();
        return view('admin.location.policeStation.create',compact('countries'));
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
            'country_id' => 'required|numeric',
            'division_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'name' => 'required|min:2|max:150|unique:sys_police_stations',
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if (SysPoliceStation::create($input)) {
            Session::flash('success','Police Station Added successfully');
        }
        return redirect()->route('sys-police-station.create');
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
        return view('admin.location.policeStation.edit')
        ->with('countries', SysCountry::pluck('name','id')->all())
        ->with('policeStation', SysPoliceStation::find($id));
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
        $policeStation = SysPoliceStation::find($id);

        $this->validate($request,[
            'country_id' => 'required|numeric',
            'division_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'name' => 'required|min:2|max:150|unique:sys_police_stations,name,'.$policeStation->id,
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if ($policeStation->update($request->all())) {
            Session::flash('success','Police Station update successfully');
        }
        return redirect()->route('sys-police-station.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $policeStation = SysPoliceStation::find($id);

        if ($policeStation->delete()) {
            Session::flash('success','Police Station delete successfully');
        }
        return redirect()->route('sys-police-station.index');
    }
}
