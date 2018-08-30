<?php

namespace App\Http\Controllers\Admin\Product;

use Auth;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use App\Models\Admin\ProductSection\Type;
use App\Models\Admin\ProductAccessories\Brand;

class ProductsController extends Controller
{
    public function index()
    {
        return view('admin.product.index')
                ->with('products', Product::all());
    }
    public function create($product_id = '')
    {
        $product = '';
        if ($product_id) {
            $product = Product::find($product_id);
        }
        return view('product.details.create')
                ->with('product', $product)
                ->with('brands', Brand::pluck('name','id')->all())
                ->with('types', Type::all());
    }

    public function store(Request $request)
    {
        if (Product::find($request->product_id)) {
            return $this->update($request,$request->product_id);
        }

        if ($request['description'] == '<p><br></p>') {
            $request['description'] = null;
        }

        $this->validate($request,[
            'title' => 'required|min:2|max:191',
            'description' => 'required|min:2',
            'type' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required',
            'barcode' => 'required',
        ]);

        $product = Product::create([
            'product_code' => Product::generateProductCode(),
            'title' => $request->title,
            'slug' => str_slug($request->title.' '.time()),
            'description' => $request->description,
            'key_features' => $request->key_features,
            'type_id' => $request->type,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'brand_id' => $request->brand,
            'barcode' => $request->barcode,
        ]);


        Session::flash('success','Product details add successfully');

        if ($request->next) {
            return redirect()->route('product-price.create', $product->id);
        }
        return redirect()->back();
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        if ($request['description'] == '<p><br></p>') {
            $request['description'] = null;
        }

        $this->validate($request,[
            'title' => 'required|min:2|max:191',
            'description' => 'required|min:2',
            'type' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'brand' => 'required',
            'barcode' => 'required',
        ]);

        $product = Product::find($id);
        $product->update([
            'title' => $request->title,
            'slug' => str_slug($request->title.' '.time()),
            'description' => $request->description,
            'key_features' => $request->key_features,
            'type_id' => $request->type,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'brand_id' => $request->brand,
            'barcode' => $request->barcode,
        ]);


        Session::flash('success','Product details update successfully');

        if ($request->next) {
            return redirect()->route('product-price.create', $product->id);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
