<?php

namespace App\Http\Controllers\Admin\Product\ProductPrice;

use Session;
use Illuminate\Http\Request;
use App\Models\Product\ProductPrice;
use App\Http\Controllers\Controller;

class ProductPricesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $price = '';
        if ($product_price = ProductPrice::where('product_id',$product_id)->first()) {
            $price = $product_price;
        }

        return view('product.price.create')
                ->with('price', $price)
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

        if (ProductPrice::find($request->price_id)) {
            return $this->update($request,$request->price_id);
        }
        $this->validate($request,[
            'buying_price' => 'required|min:2|numeric',
            'travel_cost' => 'required|min:2|numeric',
            'storage_cost' => 'required|min:2|numeric',
        ]);

        $price = new ProductPrice;
        $price->product_id = $request->product_id;
        $price->buying_price = $request->buying_price;
        $price->travel_cost = $request->travel_cost;
        $price->storage_cost = $request->storage_cost;

        if ($price->save()) {
            Session::flash('success','Product Price add successfully');
        }

        if ($request->next) {
            return redirect()->route('product-size.create', $request->product_id);
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
        $this->validate($request,[
            'buying_price' => 'required|min:2|numeric',
            'travel_cost' => 'required|min:2|numeric',
            'storage_cost' => 'required|min:2|numeric',
        ]);

        $price = ProductPrice::find($id);
        $price->product_id = $request->product_id;
        $price->buying_price = $request->buying_price;
        $price->travel_cost = $request->travel_cost;
        $price->storage_cost = $request->storage_cost;

        if ($price->save()) {
            Session::flash('success','Product Price add successfully');
        }

        if ($request->next) {
            return redirect()->route('product-size.create', $request->product_id);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
