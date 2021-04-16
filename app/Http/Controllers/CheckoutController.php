<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Checkout;
use App\Cart;
use App\Tbl_country;
use App\Tbl_states;
use App\Tbl_city;
class CheckoutController extends Controller
{
    function __construct(){
        return $this->middleware('auth');
    }
    function Checkout(Request $request){
        $auth_user=Auth::user();
        $country=Tbl_country::all();
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $carts=Cart::with('product')->where('user_ip',$user_ip)->get();

        $subtotal= $request->session()->get('subtotal');
        $intotal= $request->session()->get('intotal');
        
        if($intotal == ''){
            $total= $subtotal;
        }
        else{
            $total= $intotal;
        }
        
        session(['total' => $total]);
        return view('frontend.checkout',compact('auth_user','country','subtotal','total','carts'));
    }
    //get state
    function GetState($country_id){
        $states=Tbl_states::where('country_id',$country_id)->get();
        return response()->json($states);
    }
    //get city
    
    function GetCity($state_id){
        $cities=Tbl_city::where('state_id',$state_id)->get();
        return response()->json($cities);
    }
}
