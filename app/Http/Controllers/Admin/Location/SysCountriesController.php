<?php

namespace App\Http\Controllers\Admin\Location;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location\SysCountry;

class SysCountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = SysCountry::all();
        return view('admin.location.country.index',compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.country.create');
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
            'name' => 'required|min:2|max:150|unique:sys_countries',
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if (SysCountry::create($input)) {
            Session::flash('success','Country Added successfully');
        }
        return redirect()->route('sys-country.create');
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
        $country = SysCountry::find($id);
        return view('admin.location.country.edit',compact('country'));
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
        $country = SysCountry::find($id);
        $this->validate($request,[
            'name' => 'required|min:2|max:150|unique:sys_countries,name,'.$country->id,
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if ($country->update($input)) {
            Session::flash('success','Country update successfully');
        }
        return redirect()->route('sys-country.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = SysCountry::find($id);

        if ($country->delete()) {
            Session::flash('success','Country delete successfully');
        }
        return redirect()->route('sys-country.index');
    }
}
