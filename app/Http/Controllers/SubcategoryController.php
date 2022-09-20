<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\Subcategory;
use App\Http\Requests\SubcategoryPost;

class SubcategoryController extends Controller
{
    function index(){
        $categories=Category::all();
        $subcategories=Subcategory::all();
        $deletedSubcategories=Subcategory::onlyTrashed()->get();
        return view('admin.subcategory.index', compact('categories','subcategories', 'deletedSubcategories'));
    }

    function insert(SubcategoryPost $request){
        if(Subcategory::withTrashed()->where('category_id', $request->category_id)->where('subcategory_name', $request->subcategory_name)->exists()){
            return back()->with('exist', 'Subcategory already exist under this category');
        }
        else{
            Subcategory::insert([
                'subcategory_name'=> $request->subcategory_name,
                'category_id'=> $request->category_id,
                'created_at'=>Carbon::now(),
            ]);
            return back()->with('success', 'Subcategory added successfull!');
        }

    }

    function delete($id){
        Subcategory::find($id)->delete();
        return back()->with('delsuccess', 'Subcategory deleted successfull');
    }

    function undo($id){
        Subcategory::withTrashed()->find($id)->restore();
        return back()->with('undosuccess', 'Subcategory restore successfull');
    }

    function forcedelete($id){
        Subcategory::withTrashed()->find($id)->forceDelete();
        return back()->with('forcedelsuccess', 'Subcategory permanant delete successfull');
    }

    function markdelete(Request $request){
        if($request->alldelete){
            foreach($request->alldelete as $id){
            Subcategory::find($id)->delete();
            }
            return back()->with('alldelsuccess', 'Marked Subcategory delete successfull');
        }
        else{
            return back()->with('alldelsuccess', 'No item selected');
        }

    }

    function forcemarkdelete(Request $request){
        if($request->name=="delete"){
            if($request->forcemarkdelete){
                foreach($request->forcemarkdelete as $id){
                Subcategory::withTrashed()->find($id)->forceDelete();
                }
                return back()->with('forcedelsuccess', 'Marked Subcategory delete successfull');
            }
            else{
                return back()->with('forcedelsuccess', 'No item selected');
            }
        }
        else{
            if($request->forcemarkdelete){
                foreach($request->forcemarkdelete as $id){
                Subcategory::withTrashed()->find($id)->restore();
                }
                return back()->with('forcedelsuccess', 'Marked Subcategory Undo successfull');
            }
            else{
                return back()->with('forcedelsuccess', 'No item selected');
            }
        }

    }
}
