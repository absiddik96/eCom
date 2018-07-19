<?php

namespace App\Http\Controllers\Admin\Product;

use Auth;
use Image;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\Product;
use App\Models\Admin\Product\ProductSize;
use App\Models\Admin\Product\ProductColor;
use App\Models\Admin\Product\ProductImage;
use App\Models\Admin\Product\ProductWeight;
use App\Models\Admin\ProductAccessories\Type\Type;
use App\Models\Admin\ProductAccessories\Size\Size;
use App\Models\Admin\ProductAccessories\Brand\Brand;
use App\Models\Admin\ProductAccessories\Color\Color;
use App\Models\Admin\ProductAccessories\Category\Category;

class ProductsController extends Controller
{
    
    public function index(Request $request)
    {
        $type_slug = $request->type;
        $type = Type::where('slug',$type_slug)->first();
        $products = [];
        
        if ($type) {
            $products = Product::where('type_id',$type->id)->get();
        }

        // print_r(isset($products));

        return view('admin.product.index')
                ->with('types', Type::pluck('type','slug')->all())
                ->with('products',$products);
    }

    // product create
    public function create(Request $request)
    {
        $type_slug = $request->type;
        $aditional_form = '';
        $categories = '';
        $brands = '';
        $type = Type::where('slug',$type_slug)->first();
        
        if ($type) {
            $type_slug = $type->slug;
            $categories = Category::where('type_id',$type->id)->get();
            $brands = Brand::where('type_id',$type->id)->get();
        }

        

        switch ($type_slug) {
            case 'fabrics':
                $aditional_form = 'includes.admin.aditional_form.fabrics';
                break;
            case 'food':
                $aditional_form = 'includes.admin.aditional_form.food';
                break;
        }

        return view('admin.product.create')
                ->with('aditional_form', $aditional_form)
                ->with('types', Type::pluck('type','slug')->all())
                ->with('categories', $categories)
                ->with('brands', $brands)
                ->with('type', $type)
                ->with('colors', Color::all())
                ->with('sizes', Size::all());
    }

    // product store
    public function store(Request $request)
    {
        if ($request->type_slug == "fabrics") {
            return $this->type_fabrics($request);
        } else if($request->type_slug == "food"){
            return $this->type_food($request);
        }
    }

    // fabrics product store
    public function type_fabrics($request)
    {
        if ($request['description'] == '<p><br></p>') {
            $request['description'] = null;
        }

        $this->validate($request,[
            'title' => 'required|min:2|max:191',
            'description' => 'required|min:2',
            'product_image' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'size' => 'required',
            'color' => 'required',
            'brand' => 'required',
            'barcode' => 'required',
            'price' => 'required',
        ]);

        $product = Product::create([
            'product_code' => Product::generateProductCode(),
            'title' => $request->title,
            'slug' => str_slug($request->title.' '.time()),
            'description' => $request->description,
            'key_features' => $request->key_features,
            'type_id' => $request->type_id,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'brand_id' => $request->brand,
            'barcode' => $request->barcode,
            'price' => $request->price,
        ]);

        // image upload & database store
        $p_images = $this->image_upload($request->product_image,$product);
        ProductImage::insert($p_images);

        // size database store
        $p_sizes = $this->product_size($request->size,$product);
        ProductSize::insert($p_sizes);

        // color database store
        $p_colors = $this->product_color($request->color,$product);
        ProductColor::insert($p_colors);

        if($product){
            Session::flash('success', 'Successfully created a new product');
        }

        return redirect()->back();
    }

    // food product store
    public function type_food($request)
    {
        if ($request['description'] == '<p><br></p>') {
            $request['description'] = null;
        }

        $this->validate($request,[
            'title' => 'required|min:2|max:191',
            'description' => 'required|min:2',
            'product_image' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'weight' => 'required',
            'brand' => 'required',
            'barcode' => 'required',
            'price' => 'required',
        ]);

        $product = Product::create([
            'product_code' => Product::generateProductCode(),
            'title' => $request->title,
            'slug' => str_slug($request->title.' '.time()),
            'description' => $request->description,
            'key_features' => $request->key_features,
            'type_id' => $request->type_id,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'brand_id' => $request->brand,
            'barcode' => $request->barcode,
            'price' => $request->price,
        ]);

        // image upload & database store
        $p_images = $this->image_upload($request->product_image,$product);
        ProductImage::insert($p_images);

        // weight database store
        $weight = new ProductWeight;
        $weight->product_id = $product->id;
        $weight->product_code = $product->product_code;
        $weight->weight = $request->weight;
        $weight->save();

        if($product){
            Session::flash('success', 'Successfully created a new product');
        }

        return redirect()->back();
    }

    // product image upload
    public function image_upload($product_images,$product)
    {
        if($product_images) {
            $i = 0;
            foreach ($product_images as $image) {
                $new_name = rand(1,99).time() . '.' .$image->getClientOriginalExtension();

                if (!file_exists(public_path('images/product/images/thumbnail'))) {
                    mkdir(public_path('images/product/images/thumbnail'), 0777, true);
                }

                //Upload File
                $image->move('public/images/product/images', $new_name);
                copy('public/images/product/images/'.$new_name, 'public/images/product/images/thumbnail/'.$new_name);
                

                //Resize image here
                $thumbnailpath = public_path('images/product/images/thumbnail/'.$new_name);
                $img = Image::make($thumbnailpath)->resize(400, 150, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);

                $p_images[$i]['product_id'] = $product->id;
                $p_images[$i]['product_code'] = $product->product_code;
                $p_images[$i]['image'] = $new_name;
                $i++;
            }
        }

        return $p_images;
    }

    public function product_size($product_sizes,$product)
    {
        if($product_sizes) {
            $i = 0;
            foreach ($product_sizes as $size) {

                $p_sizes[$i]['product_id'] = $product->id;
                $p_sizes[$i]['product_code'] = $product->product_code;
                $p_sizes[$i]['size_id'] = $size;
                $i++;
            }
        }

        return $p_sizes;
    }

    public function product_color($product_colors,$product)
    {
        if($product_colors) {
            $i = 0;
            foreach ($product_colors as $color) {

                $p_colors[$i]['product_id'] = $product->id;
                $p_colors[$i]['product_code'] = $product->product_code;
                $p_colors[$i]['color_id'] = $color;
                $i++;
            }
        }

        return $p_colors;
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();

        if ($product->type->slug=='fabrics') {
            $aditional_show = 'includes.admin.aditional_show.fabrics';
        }elseif($product->type->slug=='food'){
            $aditional_show = 'includes.admin.aditional_show.food';
        }

        return view('admin.product.show')
                ->with('product',$product)
                ->with('aditional_show',$aditional_show);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
