<?php

namespace App\Http\Controllers\Admin\Product;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Admin\Product\Size;
use App\Http\Controllers\Controller;

class SizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.size.index')
                ->with('sizes', Size::all());   
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
            'size' => 'required|min:1|unique:sizes'
        ]);

        $size = new Size;

        $size->size = strtolower($request->size);

        if ($size->save()) {
            Session::flash('success', 'Successfully created a new product size');
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
    public function edit(Size $size)
    {
        return view('admin.product.size.edit')
                ->with('size', $size);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Size $size)
    {
        $this->validate($request,[
            'size' => 'required|min:1|unique:sizes,size,'.$size->id,
        ]);

        $size->size = strtolower($request->size);

        if ($size->save()) {
            Session::flash('success', 'Successfully updated this product size');
        }
        return redirect()->route('size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Size $size)
    {
        if ($size->delete()) {
            Session::flash('success', 'Successfully deleted this product size');
        }
        return redirect()->back();
    }
}
