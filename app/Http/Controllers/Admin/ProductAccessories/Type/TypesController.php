<?php

namespace App\Http\Controllers\Admin\ProductAccessories\Type;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductAccessories\Type\Type;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_accessories.type.index')
                ->with('types', Type::all());   
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
            'type' => 'required|min:2|unique:types'
        ]);

        $type = new Type;

        $type->type = strtolower($request->type);
        $type->slug = str_slug($request->type);

        if ($type->save()) {
            Session::flash('success', 'Successfully created a new product type');
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
    public function edit(Type $type)
    {
        return view('admin.product_accessories.type.edit')
                ->with('type', $type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $this->validate($request,[
            'type' => 'required|min:2|unique:types,type,'.$type->id,
        ]);

        $type->type = strtolower($request->type);
        $type->slug = str_slug($request->type);
        

        if ($type->save()) {
            Session::flash('success', 'Successfully updated this product type');
        }
        return redirect()->route('type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        if ($type->delete()) {
            Session::flash('success', 'Successfully deleted this product type');
        }
        return redirect()->back();
    }
}
