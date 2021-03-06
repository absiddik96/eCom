<?php

namespace App\Http\Controllers\Admin\ProductAccessories\Color;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductAccessories\Color;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_accessories.color.index')
                ->with('colors', Color::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|min:1|unique:colors',
            'color' => 'required|min:1|unique:colors',
        ]);

        $color = new Color;

        $color->name = strtolower($request->name);
        $color->slug = str_slug($request->name);
        $color->color = strtolower($request->color);

        if ($color->save()) {
            Session::flash('success', 'Successfully created a new product color');
        }
        return redirect()->back();
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
    public function edit(Color $color)
    {
        return view('admin.product_accessories.color.edit')
                ->with('color', $color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $this->validate($request,[
            'name' => 'required|min:1|unique:colors,name,'.$color->id,
            'color' => 'required|min:1|unique:colors,color,'.$color->id,
        ]);

        $color->name = strtolower($request->name);
        $color->slug = str_slug($request->name);
        $color->color = strtolower($request->color);

        if ($color->save()) {
            Session::flash('success', 'Successfully updated this product color');
        }
        return redirect()->route('color.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        if ($color->delete()) {
            Session::flash('success', 'Successfully deleted this product color');
        }
        return redirect()->back();
    }
}
