<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Coupon;
use Carbon\Carbon;
class CartController extends Controller
{
    //cart
    function SingleCart($product_id){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        
        if(Cart::where('product_id',$product_id)->where('user_ip',$user_ip)->exists()){
            Cart::where('product_id',$product_id)->where('user_ip',$user_ip)->increment('product_quantity');
        }
        else{
            Cart::insert([
                'product_id' => $product_id,
                'user_ip' => $user_ip,
                'created_at' => Carbon::now(), 
            ]);
        }
        return back();
    }
    //cart page
    function CartPage(Request $request,$coupon=''){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $carts=Cart::with('product')->where('user_ip',$user_ip)->get();

        $subtotal=0;
        
        foreach($carts as $cart){
            $subtotal += $cart->product->product_price * $cart->product_quantity;
        }
        session(['subtotal' => $subtotal]);
        //return $subtotal;
        if($coupon==''){
            $user_ip=$_SERVER['REMOTE_ADDR'];
            $cart=Cart::where('user_ip',$user_ip)->get();
            $discount='';
            $intotal=$subtotal;
            //session(['total' => $intotal]);
            return view('frontend.cart',compact('cart','discount','intotal'));
        }
        else{
            if(Coupon::where('coupon_code',$coupon)->exists()){
                $validity=Coupon::where('coupon_code',$coupon)->first()->coupon_validity;
                if(Carbon::now()->format('Y-m-d') <= $validity){
                    $user_ip=$_SERVER['REMOTE_ADDR'];
                    $cart=Cart::with('product')->where('user_ip',$user_ip)->get();
                    $discount=Coupon::where('coupon_code',$coupon)->first()->coupon_discount;
                    session(['discount' => $discount]);
                    $div=($discount*$subtotal)/100;
                    $intotal=number_format($subtotal-$div,2);
                    session(['intotal' => $intotal]);
                    return view('frontend.cart',compact('cart','discount','intotal'));
                }
                else{
                    $user_ip=$_SERVER['REMOTE_ADDR'];
                    $cart=Cart::with('product')->where('user_ip',$user_ip)->get();
                    $discount= "Expired";
                    $intotal=$subtotal;
                  //  session(['total' => $intotal]);
                    return view('frontend.cart',compact('cart','discount','intotal'));
                }
            }
            else{
                $user_ip=$_SERVER['REMOTE_ADDR'];
                $cart=Cart::with('product')->where('user_ip',$user_ip)->get();
                $discount= "Invalid";
                $intotal=$subtotal;
               // session(['total' => $intotal]);
                return view('frontend.cart',compact('cart','discount','intotal'));
            }
        }
    }
    //delete cart
    function DeleteCart($id){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        Cart::where('id',$id)->where('user_ip',$user_ip)->delete();
        return back()->with('delete_cart','Cart delete successfully');
    }
    //update cart
    function UpdateCart(Request $request){
        foreach($request->cart_id as $key=>$item){
            Cart::findOrFail($item)->update([
                'product_quantity' =>$request->product_quantity[$key],
                'updated_at' => Carbon::now(),
            ]);
        }
        return back()->with('Updated','Cart Updated Successfully');
        
    }
    
}
