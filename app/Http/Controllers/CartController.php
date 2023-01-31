<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderProductDetails;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        foreach($request->product_quantity as $id=>$quantity){
            Cart::find($id)->update([
                'product_quantity' => $quantity,
            ]);
        }
        return back();
    }

    function order(Request $request){
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'total' => $request->amount,
            'discount' => '0',
            'subtotal' => session('totalBill'),
            'payment_method' => $request->payment,
            'created_at' => Carbon::now(),
        ]);

        OrderDetails::insert([
            'order_id' => $order_id,
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'notes' => $request->notes,
            'created_at' => Carbon::now(),
        ]);

        $cart_products = Cart::where('generated_cart_id', Cookie::get('random_id'))->get();
        foreach($cart_products as $product){
            $product_name = Product::find($product->product_id)->product_name;
            $product_price = Product::find($product->product_id)->product_price;

            OrderProductDetails::insert([
                'product_name' => $product_name,
                'product_price' => $product_price,
                'order_id' => $order_id,
                'product_quantity' => $product->product_quantity,
                'created_at' => Carbon::now(),
            ]);
        }

        if($request->payment == 2){
            Cart::where('generated_cart_id', Cookie::get('random_id'))->delete();
        }
        else{
            Cart::where('generated_cart_id', Cookie::get('random_id'))->delete();
            session(['total' => $request->amount]);
            return redirect('/payment/online');
        }

        return redirect('/cart')->with('order', 'Your Order successfully Placed');
    }
}
