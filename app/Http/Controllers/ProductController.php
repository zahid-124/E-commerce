<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    function index(){
        $categories= Category::all();
        $subcategories= Subcategory::all();
        $products= Product::all();
        return view('admin.product.index', compact('categories', 'subcategories', 'products'));
    }

    function insert(Request $request){
        $id=Product::insertGetId([
            'subcategory_id'=>$request->subcategory_id,
            'category_id'=>$request->category_id,
            'product_price'=>$request->product_price,
            'product_name'=>$request->product_name,
            'product_quantity'=>$request->product_quantity,
            'product_desc'=>$request->product_desc,
            'created_at'=>Carbon::now(),

        ]);

        $image=$request->product_image;
        $extension=$image->getClientOriginalExtension();
        $photo_name=$id.'.'.$extension;

        Image::make($image)->save(base_path('public/uploads/products/'.$photo_name));
        Product::find($id)->update([
            'product_image'=>$photo_name,
        ]);
        return back()->with('success','Product added successfully');
    }
}
