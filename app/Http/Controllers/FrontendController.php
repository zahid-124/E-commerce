<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    function main(){
        $categories = Category::all();
        $products = Product::all();
        return view('frontend.index', compact('categories', 'products'));
    }

    function product_details($product_id){
        $product_info = Product::find($product_id);
        $category_id = $product_info->category_id;
        $related_products = Product::where('category_id', $category_id)->where('id', '!=', $product_id)->get();
        return view('frontend.product_details', compact('product_info', 'related_products'));
    }

    function product_shop(){
        $categories = Category::all();
        $products = Product::all();
        return view('frontend.shop', compact('categories', 'products'));
    }

    function category_product($category_id){
        $category_name = Category::find($category_id)->category_name;
        $category_products = Product::where('category_id', $category_id)->get();
        return view('frontend.category_product', compact('category_products', 'category_name'));
    }

    function checkout(){
        return view('frontend.checkout');
    }

    function customer(){
        if(!Auth::check()){
            return redirect('/login');
        }
        $orders = Order::where('user_id', Auth::id())->get();
        return view('admin.parts.customer', compact('orders'));
    }
}
