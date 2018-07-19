<?php

namespace App\Http\Controllers\Admin\ProductAccessories\Brand;

use Auth;
use Image;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductAccessories\Type\Type;
use App\Models\Admin\ProductAccessories\Brand\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_accessories.brand.index')
                ->with('brands', Brand::orderBy('name')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_accessories.brand.create')
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
            'name' => 'required|min:1|max:191|unique:brands',
            'icon' => 'required|image|mimes:jpeg,jpg,png,gif|max:1000',
        ]);

        $brand = new Brand;

        $brand->type_id = $request->type_id;
        $brand->name = strtolower($request->name);
        $brand->slug = str_slug($request->name);

        if($request->hasFile('icon')) {
            // store in variable
            $icon = $request->file('icon');

            $new_name = str_slug($request->name) .'-' . time() . '.' .$icon->getClientOriginalExtension();

            if (!file_exists(public_path('images/brand/icons/thumbnail'))) {
                mkdir(public_path('images/brand/icons/thumbnail'), 0777, true);
            }

            //Upload File
            $icon->move('public/images/brand/icons', $new_name);
            copy('public/images/brand/icons/'.$new_name, 'public/images/brand/icons/thumbnail/'.$new_name);
            

            //Resize image here
            $thumbnailpath = public_path('images/brand/icons/thumbnail/'.$new_name);
            $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);


            $brand->icon = $new_name;
        }

        if ($brand->save()) {
            Session::flash('success', 'Successfully created a new brand');
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
    public function edit(Brand $brand)
    {
        return view('admin.product_accessories.brand.edit')
                ->with('brand', $brand)
                ->with('types', Type::pluck('type','id')->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request,[
            'type_id' => 'required',
            'name' => 'required|min:1|max:191|unique:brands,name,'.$brand->id,
            'icon' => 'image|mimes:jpeg,jpg,png,gif|max:1000',
        ]);

        $brand->type_id = $request->type_id;
        $brand->name = strtolower($request->name);
        $brand->slug = str_slug($request->name);

        if($request->hasFile('icon')) {
            // store in variable
            $icon = $request->file('icon');

            $brand_icon = $brand->getOriginal('icon');
            $brand_icon_ext = substr($brand_icon, strpos($brand_icon,'.')+strlen('.'));

            $icon_name = substr($brand_icon, 0, strpos($brand_icon, '.'));

            if ($brand_icon_ext != $icon->getClientOriginalExtension()) {
                unlink('public/images/brand/icons/'.$brand_icon);
                unlink('public/images/brand/icons/thumbnail/'.$brand_icon);
            }

            $icon_name = $icon_name .'.' .$icon->getClientOriginalExtension();

            if (!file_exists(public_path('images/brand/icons/thumbnail'))) {
                mkdir(public_path('images/brand/icons/thumbnail'), 0777, true);
            }

            //Upload File
            $icon->move('public/images/brand/icons', $icon_name);
            copy('public/images/brand/icons/'.$icon_name, 'public/images/brand/icons/thumbnail/'.$icon_name);
            

            //Resize image here
            $thumbnailpath = public_path('images/brand/icons/thumbnail/'.$icon_name);
            $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);


            $brand->icon = $icon_name;
        }

        if ($brand->save()) {
            Session::flash('success', 'Successfully updated this brand');
        }

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if ($brand->delete()) {
            $brand_icon = $brand->getOriginal('icon');
            unlink('public/images/brand/icons/'.$brand_icon);
            unlink('public/images/brand/icons/thumbnail/'.$brand_icon);
            Session::flash('success', 'Successfully deleted this brand');
        }

        return redirect()->route('brand.index');
    }
}
