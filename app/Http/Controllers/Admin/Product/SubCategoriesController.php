<?php

namespace App\Http\Controllers\Admin\Product;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Models\Admin\Product\Type;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Category;
use App\Models\Admin\Product\SubCategory;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.sub_category.index')
                ->with('sub_categories', SubCategory::all());       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.sub_category.create')
                ->with('types', Type::pluck('type','id')->all());
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
            'type_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|min:2|unique:sub_categories',
        ]);

        $sub_cat = new SubCategory;

        $sub_cat->type_id = $request->type_id;
        $sub_cat->category_id = $request->category_id;
        $sub_cat->name = strtolower($request->name);

        if ($sub_cat->save()) {
            Session::flash('success', 'Successfully created a new sub category');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $sub_category)
    {
        return view('admin.product.sub_category.edit')
                ->with('sub_category', $sub_category)
                ->with('types', Type::pluck('type','id')->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $sub_category)
    {
        $this->validate($request,[
            'type_id' => 'required',
            'category_id' => 'required',
            'name' => 'required|min:2|unique:sub_categories,name,'.$sub_category->id,
        ]);

        $sub_category->type_id = $request->type_id;
        $sub_category->category_id = $request->category_id;
        $sub_category->name = strtolower($request->name);

        if ($sub_category->save()) {
            Session::flash('success', 'Successfully updated this sub category');
        }

        return redirect()->route('sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $sub_category)
    {
        if ($sub_category->delete()) {
            Session::flash('success', 'Successfully deleted this sub category');
        }

        return redirect()->route('sub-category.index');
    }
}
