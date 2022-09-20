<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;
use App\Http\Requests\CategoryPost;
use Illuminate\Support\Facades\Auth;


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
        Category::insert([
            'category_name'=>$request->category_name,
            'added_by'=>Auth::id(),
            'created_at'=>Carbon::now(),
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
        return back()->with('forcedelsuccess', 'Category permanant delete successfull!');
    }
}
