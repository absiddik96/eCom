<?php

namespace App\Http\Controllers\Admin\Location;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Location\SysWord;
use App\Models\Location\SysCountry;
use App\Http\Controllers\Controller;

class SysWordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = SysWord::all();
        return view('admin.location.word.index',compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = SysCountry::pluck('name','id')->all();
        return view('admin.location.word.create',compact('countries'));
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
            'police_station_id' => 'required|numeric',
            'name' => 'required|min:2|max:150|unique:sys_words',
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if (SysWord::create($input)) {
            Session::flash('success','Word Added successfully');
        }
        return redirect()->route('sys-word.create');
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
        return view('admin.location.word.edit')
        ->with('countries', SysCountry::pluck('name','id')->all())
        ->with('word', SysWord::find($id));
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
        $word = SysWord::find($id);

        $this->validate($request,[
            'country_id' => 'required|numeric',
            'division_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'police_station_id' => 'required|numeric',
            'name' => 'required|min:2|max:150|unique:sys_words,name,'.$word->id,
        ]);

        $input = $request->all();
        $input['name'] = strtolower($request->name);

        if ($word->update($input)) {
            Session::flash('success','Word update successfully');
        }
        return redirect()->route('sys-word.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = SysWord::find($id);

        if ($word->delete()) {
            Session::flash('success','Word delete successfully');
        }
        return redirect()->route('sys-word.index');
    }
}
