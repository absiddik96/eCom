<?php

namespace App\Http\Controllers\Front\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use App\Models\Admin\ProductSection\Type;
use App\Models\Admin\ProductSection\Category;
use App\Models\Admin\ProductSection\SubCategory;

class HomeController extends Controller
{
    public function index()
    {
    	$top_five_products = Product::take(5)->get();
    	return view('frontend.home')
    			->with('top_five_products',$top_five_products);
    }

}
