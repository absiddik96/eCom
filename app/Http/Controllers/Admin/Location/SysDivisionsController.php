<?php

namespace App\Http\Controllers\Admin\Location;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Location\SysCountry;
use App\Models\Location\SysDivision;
use App\Http\Controllers\Controller;

class SysDivisionsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $divisions = SysDivision::all();
        return view('admin.location.division.index',compact('divisions'));
    }


    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $countries = SysCountry::pluck('name','id')->all();
        return view('admin.location.division.create',compact('countries'));
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
            'name' => 'required|min:2|max:150|unique:sys_divisions',
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if (SysDivision::create($input)) {
            Session::flash('success','Division Added successfully');
        }
        return redirect()->route('sys-division.create');
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
        return view('admin.location.division.edit')
        ->with('division', SysDivision::find($id))
        ->with('countries', SysCountry::pluck('name','id')->all());
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
        $division = SysDivision::find($id);
        $this->validate($request,[
            'country_id' => 'Required|numeric',
            'name' => 'required|min:2|max:150|unique:sys_divisions,name,'.$division->id,
        ]);


        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if ($division->update($input)) {
            Session::flash('success','Division update successfully');
        }
        return redirect()->route('sys-division.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $division = SysDivision::find($id);

        if ($division->delete()) {
            Session::flash('success','Division delete successfully');
        }
        return redirect()->route('sys-division.index');
    }
}
