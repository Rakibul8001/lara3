<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index(){
      $categories = Category::all();
      return view('admin.category.category',[
          'categories' => $categories
      ]);
  }
  public function categorySave(Request $request){
        $catImage = $request->file('cat_image');
        $imgName = $catImage->getClientOriginalName();
        $location = 'admin/cat-images/';
        $imgUrl = $location.$imgName;
        $catImage->move($location,$imgName);

        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->cat_image = $imgUrl;
        $category->status = $request->status;
        $category->save();
        return redirect()->back()->with('message','Category added successfully');
  }
  public function UnpublishedCategory($id){

      $category= Category::find($id);
      $category->status= 0;
      $category->save();

      return back();
  }

  public function publishedCategory($id){
      $category= Category::find($id);
      $category->status= 1;
      $category->save();

      return back();
  }
  public function categoryUpdate(Request $request){
      $category = Category::find($request->id);
      $catImage = $request->file('cat_image');

      if($catImage){
          unlink($category->cat_image);

          $imgName = $catImage->getClientOriginalName();
          $location = 'admin/cat-images/';
          $imgUrl = $location.$imgName;
          $catImage->move($location,$imgName);

          $category->cat_name = $request->cat_name;
          $category->cat_desc = $request->cat_desc;
          $category->cat_image = $imgUrl;
          $category->status = $request->status;
          $category->save();
      }
      else{
          $category->cat_name = $request->cat_name;
          $category->cat_desc = $request->cat_desc;
          $category->status = $request->status;

          $category->save();
      }

      return redirect()->back()->with('message','Category updated successfully');
  }
  public function deleteCategory($id){
      $category = Category::find($id);
      $category->delete();
      return redirect()->back()->with('message','Category deleted successfully');
  }
}
