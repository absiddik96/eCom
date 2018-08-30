<?php

namespace App\Http\Controllers\Admin\Product\ProductImage;

use Image;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Product\ProductImage;

class ProductImagesController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {
        $image = '';
        if ($product_image = ProductImage::where('product_id',$product_id)->get()) {
            $image = $product_image;
        }

        return view('product.image.create')
                ->with('product_images', $image)
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
            'image' => 'required',
        ]);

        // image upload & database store
        $p_images = $this->image_upload($request->image,$request->product_id);

        if (ProductImage::insert($p_images)) {
            Session::flash('success','Product images add successfully');
        }
        if ($request->next) {
            return redirect()->route('product-price.create', $request->product_id);
        }
        return redirect()->back();
    }

    public function image_upload($product_images,$product_id)
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
                // $img = Image::make($thumbnailpath)->resize(450, 600, function($constraint) {
                //     $constraint->aspectRatio();
                // });
                // $img->save($thumbnailpath);
                $img = Image::make($thumbnailpath)->resize(450, 600)->save($thumbnailpath);

                $p_images[$i]['product_id'] = $product_id;
                $p_images[$i]['image'] = $new_name;
                $i++;
            }
        }

        return $p_images;
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
        $product_image = ProductImage::find($id);
        if ($product_image->delete()) {
            unlink('public/images/product/images/'.$product_image->getOriginal('image'));
            unlink('public/images/product/images/thumbnail/'.$product_image->getOriginal('image'));
            Session::flash('success', 'Successfully deleted this product image');
        }
        return redirect()->back();
    }
}
