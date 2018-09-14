<?php

namespace App\Http\Controllers\Admin\Product\ProductWeight;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\ProductWeight;

class ProductWeightsController extends Controller
{
    public function create($product_id)
    {
        $weight = '';
        if ($product_weight = ProductWeight::where('product_id',$product_id)->first()) {
            $weight = $product_weight;
        }

        return view('product.weight.create')
                ->with('weight', $weight)
                ->with('product_id', $product_id);
    }

    public function store(Request $request)
    {
        if (!is_numeric($request->product_id)) {
            Session::flash('info','Product Details Add First');
            return redirect()->route('product-details.create');
        }

        if (ProductWeight::find($request->weight_id)) {
            return $this->update($request,$request->weight_id);
        }
        $this->validate($request,[
            'weight' => 'required',
        ]);

        $weight = new ProductWeight;
        $weight->product_id = $request->product_id;
        $weight->weight = $request->weight;
        if ($weight->save()) {
            Session::flash('success','Product Weight add successfully');
        }

        if ($request->next) {
            return redirect()->route('product-image.create', $request->product_id);
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'weight' => 'required',
        ]);

        $weight = ProductWeight::find($id);
        $weight->product_id = $request->product_id;
        $weight->weight = $request->weight;

        if ($weight->save()) {
            Session::flash('success','Product Weight Update successfully');
        }

        if ($request->next) {
            return redirect()->route('product-image.create', $request->product_id);
        }
        return redirect()->back();
    }
}
