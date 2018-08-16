<?php

namespace App\Http\Controllers\Front\ShoppingCart;

use Cart;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShoppingCartController extends Controller
{
    public function add_cart(Request $request)
    {
    	$options = [
            'product_code'         => $request->product_code,
    		'product_image'        => $request->product_image,
    		'product_slug'         => $request->product_slug,
    		'product_type'         => $request->product_type,
    		'product_category'     => $request->product_category,
    		'product_sub_category' => $request->product_sub_category,
    	];

    	$cart = Cart::add([
			'id'                   => $request->product_id,
			'name'                 => $request->product_title,
			'price'                => $request->product_price,
			'qty'                  => $request->product_qty,
			'options'              => $options,

    	]);

    	return Cart::content()->count();
    }

    public function index()
    {
    	return view('frontend.cart.index');
    }

    public function update(Request $request)
    {
    	$id = $request->cart_id;
    	$qty = $request->qty;
    	Cart::update($id,$qty);
    		
    	Session::flash('success', 'Quantity successfully updated');
    	return redirect()->back();
    }

    public function remove($cart_id)
    {
    	Cart::remove($cart_id);

    	Session::flash('success', 'This product successfully removed');
    	return redirect()->back();
    }
}
