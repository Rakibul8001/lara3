<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('status',1)->get();
        $brand = Brand::where('status',1)->get();
       return view('admin.product.product',[
           'categories'=>$category,
           'brands'=>$brand
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productName = $request->product_name;
        $productImage = $request->file('product_image');
        $ext = '.'.$request->product_image->getClientOriginalExtension();
        $imageName = str_replace($ext, $productName.date('d-m-Y-h-m').$ext,$request->product_image->getClientOriginalName());
        $directory = 'admin/product-images/main/';
        $imageUrl = $directory . $imageName;
        Image::make($productImage)->resize(300,300)->save($imageUrl);

        //multiple-image
        foreach ($request->file('multiple_image') as $image){
                $imageName =$image->getClientOriginalName();
                $directory ='admin/product-images/gallery/';
                $imgUrl = $directory.$imageName;
                Image::make($image)->resize(300,300)->save($imgUrl);
                $data[]=$imgUrl;
        }

        $product=new Product();
        $product->product_name=$request->product_name;
        foreach ($request->cat_id as $cat) {
            $data2[]=$cat;
        }
        $product->cat_id=json_encode($data2);
        $product->brand_id=$request->brand_id;
        $product->product_short_desc=$request->product_short_desc;
        $product->product_long_desc=$request->product_long_desc;
        $product->discount_price=$request->discount_price;
        $product->product_price=$request->product_price;
        $product->product_image=$imgUrl;
        $product->multiple_image=json_encode($data);
        $product->quantity=$request->quantity;
        $product->size=$request->size;
        $product->status=$request->status;
        $product->save();

        return 'Product added successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
