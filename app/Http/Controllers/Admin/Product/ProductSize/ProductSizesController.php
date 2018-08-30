<?php

namespace App\Http\Controllers\Admin\Product\ProductSize;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\ProductSize;
use App\Models\Admin\ProductAccessories\Size;

class ProductSizesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $size = '';
        if ($product_size = ProductSize::where('product_id',$product_id)->get()) {
            $size = $product_size;
        }

        return view('product.size.create')
                ->with('product_sizes', $size)
                ->with('sizes', Size::all())
                ->with('product_id', $product_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!is_numeric($request->product_id)) {
            Session::flash('info','Product Details Add First');
            return redirect()->route('product-details.create');
        }

        $this->validate($request,[
            'size' => 'required',
        ]);

        // size database store
        $p_sizes = $this->product_size($request->size,$request->product_id);
        
        if (ProductSize::insert($p_sizes)) {
            Session::flash('success','Product Price add successfully');
        }
        if ($request->next) {
            return redirect()->route('product-color.create', $request->product_id);
        }
        return redirect()->back();
    }

    public function product_size($product_sizes,$product_id)
    {
        if($product_sizes) {
            $i = 0;
            foreach ($product_sizes as $size) {
                $p_sizes[$i]['product_id'] = $product_id;
                $p_sizes[$i]['size_id'] = $size;
                $i++;
            }
        }
        return $p_sizes;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_size = ProductSize::find($id);
        if ($product_size->delete()) {
            Session::flash('success', 'Successfully deleted this product size');
        }
        return redirect()->back();
    }
}
