<?php

namespace App\Http\Controllers\Admin\Location;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Location\SysCity;
use App\Models\Location\SysCountry;
use App\Models\Location\SysDivision;
use App\Http\Controllers\Controller;

class SysCitiesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $cities = SysCity::all();
        return view('admin.location.city.index',compact('cities'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $countries = SysCountry::pluck('name','id')->all();
        return view('admin.location.city.create',compact('countries'));
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
            'name' => 'required|min:2|max:150|unique:sys_cities',
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if (SysCity::create($input)) {
            Session::flash('success','City Added successfully');
        }
        return redirect()->route('sys-city.create');
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
        return view('admin.location.city.edit')
        ->with('countries', SysCountry::pluck('name','id')->all())
        ->with('city', SysCity::find($id));
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
        $city = SysCity::find($id);
        $this->validate($request,[
            'country_id' => 'Required|numeric',
            'division_id' => 'Required|numeric',
            'name' => 'required|min:2|max:150|unique:sys_cities,name,'.$city->id,
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if ($city->update($input)) {
            Session::flash('success','City update successfully');
        }
        return redirect()->route('sys-city.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $city = SysCity::find($id);

        if ($city->delete()) {
            Session::flash('success','City delete successfully');
        }
        return redirect()->route('sys-city.index');
    }
}
