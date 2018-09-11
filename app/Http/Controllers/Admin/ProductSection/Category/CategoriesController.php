<?php

namespace App\Http\Controllers\Admin\ProductSection\Category;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductSection\Type;
use App\Models\Admin\ProductSection\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_section.category.index')
                ->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_section.category.create')
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
            'name' => 'required|min:2|unique:categories',
        ]);

        $cat = new Category;

        $cat->type_id = $request->type_id;
        $cat->name = strtolower($request->name);
        $cat->slug = str_slug($request->name);

        if ($cat->save()) {
            Session::flash('success', 'Successfully created a new category');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.product_section.category.edit')
                ->with('category', $category)
                ->with('types', Type::pluck('type','id')->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'type_id' => 'required',
            'name' => 'required|min:2|unique:categories,name,'.$category->id,
        ]);

        $category->type_id = $request->type_id;
        $category->name = strtolower($request->name);
        $category->slug = str_slug($request->name);

        if ($category->save()) {
            Session::flash('success', 'Successfully updated this category');
        }

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            Session::flash('success', 'Successfully deleted this category');
        }

        return redirect()->route('category.index');
    }


    public function getCategory(Request $request)
    {
        $type_id = $request->id;
        $Categories = Category::where('type_id',$type_id)->get()->toArray();
        return $Categories;
    }
}
