<?php

namespace App\Http\Controllers\Front\Product;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use App\Models\Admin\ProductSection\Type;
use App\Models\Admin\ProductSection\Category;
use App\Models\Admin\ProductSection\SubCategory;

class ProductsController extends Controller
{
    public function sub_cat_product_list($type_slug,$cat_slug,$sub_cat_slug)
    {
    	$type = Type::where('slug',$type_slug)->first();

    	$category = Category::where('type_id',$type->id)
    							->where('slug',$cat_slug)
    							->first();

    	$sub_category = SubCategory::where('type_id',$type->id)
    									->where('category_id',$category->id)
    									->where('slug',$sub_cat_slug)
    									->first();

    	$products = Product::where('type_id',$type->id)->where('category_id',$category->id)->where('sub_category_id',$sub_category->id)->paginate(15);

    	return view('frontend.sub_cat_product_list')
    			->with('type',$type)
    			->with('category',$category)
    			->with('sub_category',$sub_category)
    			->with('products',$products);
    }

    public function cat_product_list($type_slug,$cat_slug)
    {
    	$type = Type::where('slug',$type_slug)->first();

    	$category = Category::where('type_id',$type->id)
    							->where('slug',$cat_slug)
    							->first();

    	$products = Product::where('category_id',$category->id)->where('type_id',$type->id)->paginate(15);

    	return view('frontend.cat_product_list')
    			->with('type',$type)
    			->with('category',$category)
    			->with('products',$products);
    }

    public function type_product_list($type_slug)
    {
    	$type = Type::where('slug',$type_slug)->first();
    	$products = Product::where('type_id',$type->id)->paginate(15);

    	return view('frontend.type_product_list')
    			->with('type',$type)
    			->with('products',$products);
    }

    public function product_details($product_slug)
    {
        $product = Product::where('slug',$product_slug)->first();



        $type = Type::find($product->type_id);
        $category = Category::find($product->category_id);
        $sub_category = SubCategory::find($product->sub_category_id);

        return view('frontend.product_details')
                ->with('type',$type)
                ->with('category',$category)
                ->with('sub_category',$sub_category)
                ->with('product',$product);
    }
}
