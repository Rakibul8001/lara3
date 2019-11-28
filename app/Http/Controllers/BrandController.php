<?php

namespace App\Http\Controllers;

use DemeterChain\B;
use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.brand',[
            'brands' => $brands
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
        $validatedData = $request->validate([
            'brand_name' => 'required|max:50',
            'brand_desc' => 'required',
            'brand_image'=>'required',
        ]);
        $brandImage = $request->file('brand_image');
        $imgName = '.'.$request->brand_image->getClientOriginalName();
        $location = 'admin/brand-images/';
        $imgUrl = $location.$imgName;
        $brandImage->move($location,$imgName);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_image = $imgUrl;
        $brand->status = $request->status;
        $brand->save();
        return redirect()->back()->with('message','Brand added successfully');
    }

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $brand = Brand::find($id);
        $brandImage = $request->file('brand_image');
        if($brandImage){
            unlink($brand->brand_image);

            $imgName = '.'.$request->brand_image->getClientOriginalName();
            $location = 'admin/brand-images/';
            $imgUrl = $location.$imgName;
            $brandImage->move($location,$imgName);


            $brand->brand_name = $request->brand_name;
            $brand->brand_desc = $request->brand_desc;
            $brand->brand_image = $imgUrl;
            $brand->status = $request->status;
            $brand->save();
        }
        else{

            $brand->brand_name = $request->brand_name;
            $brand->brand_desc = $request->brand_desc;
            $brand->status = $request->status;
            $brand->save();
        }

        return redirect()->back()->with('message', 'Brand Updated Successfully');
    }
    public function UnpublishedBrand($id){
        $brand= Brand::find($id);
        $brand->status= 0;
        $brand->save();
        return back();
    }
    public function publishedBrand($id){
        $brand= Brand::find($id);
        $brand->status= 1;
        $brand->save();
        return back();
    }
    public function destroy($id)
    {

        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect()->back()->with('message', 'Brand Deleted Successfully');
    }
}
