<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use Carbon\Carbon;

class CartController extends Controller
{
    function addtocart(Request $request){
        if(Cookie::get('random_id')){
            $random_num = Cookie::get('random_id');
        }
        else{
            $random_num = rand(100000, 99999).time();
            Cookie::queue('random_id', $random_num, 500);
        }

        if(Cart::where('generated_cart_id', $random_num)->where('product_id', $request->product_id)->increment('product_quantity', $request->product_quantity)){

        }
        else{
            Cart::insert([
                'generated_cart_id'=>$random_num,
                'product_id' => $request->product_id,
                'product_quantity' => $request->product_quantity,
                'created_at' => Carbon::now(),
            ]);
        }

        return back();
    }

    function deletefromcart($cart_id){
        Cart::find($cart_id)->delete();
        return back();
    }

    function cart(){
        $cart_products = Cart::where('generated_cart_id', Cookie::get('random_id'))->get();
        return view('frontend.cart', compact('cart_products'));
    }

    function cartupdate(Request $request){
        print_r($request->all());
    }
}
