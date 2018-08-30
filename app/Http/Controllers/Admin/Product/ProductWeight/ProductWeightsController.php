<?php

namespace App\Http\Controllers\Admin\Product\ProductWeight;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\ProductWeight;

class ProductWeightsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $weight = '';
        if ($product_weight = ProductWeight::where('product_id',$product_id)->get()) {
            $weight = $product_weight;
        }

        return view('product.weight.create')
                ->with('product_weights', $weight)
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
            'weight' => 'required',
        ]);

        // weight database store
        $p_weights = $this->product_weight($request->weight,$request->product_id);
        ProductWeight::insert($p_weights);
        if ($request->next) {
            return redirect()->route('product-price.create', $request->product_id);
        }
        return redirect()->back();
    }

    public function product_weight($product_weights,$product_id)
    {
        if($product_weights) {
            $i = 0;
            foreach ($product_weights as $weight) {
                $p_weights[$i]['product_id'] = $product_id;
                $p_weights[$i]['weight_id'] = $weight;
                $i++;
            }
        }
        return $p_weights;
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
        $product_weight = ProductWeight::find($id);
        if ($product_weight->delete()) {
            Session::flash('success', 'Successfully deleted this product weight');
        }
        return redirect()->back();
    }
}
