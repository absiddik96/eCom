<?php

namespace App\Http\Controllers\Admin\Product\ProductColor;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\ProductColor;
use App\Models\Admin\ProductAccessories\Color;

class ProductColorsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $color = '';
        if ($product_color = ProductColor::where('product_id',$product_id)->get()) {
            $color = $product_color;
        }

        return view('product.color.create')
                ->with('product_colors', $color)
                ->with('colors', Color::all())
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
            'color' => 'required',
        ]);

        // color database store
        $p_colors = $this->product_color($request->color,$request->product_id);
        if(ProductColor::insert($p_colors)){
            Session::flash('success','Product color add successfully');
        }
        if ($request->next) {
            return redirect()->route('product-weight.create', $request->product_id);
        }
        return redirect()->back();
    }

    public function product_color($product_colors,$product_id)
    {
        if($product_colors) {
            $i = 0;
            foreach ($product_colors as $color) {
                $p_colors[$i]['product_id'] = $product_id;
                $p_colors[$i]['color_id'] = $color;
                $i++;
            }
        }
        return $p_colors;
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
        $product_color = ProductColor::find($id);
        if ($product_color->delete()) {
            Session::flash('success', 'Successfully deleted this product color');
        }
        return redirect()->back();
    }
}
