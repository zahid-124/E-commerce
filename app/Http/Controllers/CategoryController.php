<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\CategoryPost;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Auth;
use Image;


class CategoryController extends Controller
{
    function index(){
        $categories= Category::latest()->get();
        $softcategories= Category::onlyTrashed()->latest()->get();
        return view('admin.category.index', compact('categories', 'softcategories'));
    }

    function insert(CategoryPost $request){
        //validate
        // $request->validate(
        //     //for validation
        //     [
        //         'category_name'=>'required|unique:categories',
        //         // Password::min(8)
        //         // ->letters()
        //         // ->mixedCase()
        //         // ->numbers()
        //         // ->symbols()
        //         // ->uncompromised(),
        //     ],
        //     //for custom message
        //     [
        //         'category_name.required'=>'name plzz',
        //     ]
        // );

        $id = Category::insertGetId([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now(),
        ]);

        $image=$request->category_image;
        $extension=$image->getClientOriginalExtension();
        $photo_name=$id.'.'.$extension;

        Image::make($image)->save(base_path('public/uploads/category/'.$photo_name));
        Category::find($id)->update([
            'category_image'=>$photo_name,
        ]);

        return back()->with('success', 'Category added successful');
    }

    function delete($category_id){
        Category::find($category_id)->delete();
        return back()->with('delsuccess', 'Category delete successfull!');
    }

    function undo($category_id){
        Category::withTrashed()->find($category_id)->restore();
        return back()->with('undosuccess', 'Category restore successfull!');
    }

    function forcedelete($category_id){
        Category::withTrashed()->find($category_id)->forceDelete();
        Subcategory::where('category_id', $category_id)->forcedelete();
        return back()->with('forcedelsuccess', 'Category permanant delete successfull!');
    }
}
