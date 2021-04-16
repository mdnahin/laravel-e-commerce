<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;
use App\Shiping;
use App\Sale;
use App\Bill;
use Carbon\Carbon;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
class PaymentController extends Controller
{
    function Payment(Request $request){
        $total= $request->session()->get('total');
        $discount= $request->session()->get('discount');

        $shiping_id=Shiping::insertGetId([
            'user_id' =>Auth::user()->id,
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'company_name' =>$request->company_name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'address' =>$request->address,
            'country_id' =>$request->country_id,
            'state_id' =>$request->state_id,
            'city_id' =>$request->city_id,
            'zipcode' =>$request->zipcode,
            'message' =>$request->message,
            'payment_type' =>$request->payment_type,
            'created_at' => Carbon::now()
        ]);
        
       $sale_id=Sale::insertGetId([
            'user_id' => Auth::user()->id,
            'shiping_id' => $shiping_id,
            'grand_total' => $total,
            'discount' => $discount,
            'created_at' =>Carbon::now()
        ]);
        
        
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $carts=Cart::with('product')->where('user_ip',$user_ip)->get();
        foreach($carts as $item){
            Bill::insert([
                'user_id' => Auth::user()->id,
                'sale_id' => $sale_id,
                'shiping_id' => $shiping_id,
                'product_id' => $item->product->id,
                'product_price' => $item->product->product_price,
                'product_quantity' => $item->product_quantity,
                'created_at' =>Carbon::now()
        
            ]);
            
            Product::findOrFail($item->product_id)->decrement('product_quantity',$item->product_quantity);
            $item->delete();
        }

        $stripe = new \Stripe\StripeClient(
            'sk_test_daZaO9cvMLJck9WUtJnjxqQg00otNhF3h2'
          );
          $stripe->charges->create([
            'amount' => $total*100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            
          ]);
          //paypal 
          // After Step 1
            $apiContext = new \PayPal\Rest\ApiContext(
                new \PayPal\Auth\OAuthTokenCredential(
                    'AYSq3RDGsmBLJE-otTkBtM-jBRd1TCQwFf9RGfwddNXWz0uFU9ztymylOhRS',     // ClientID
                    'EGnHDxD_qRPdaLdZz8iCr8N7_MzF-YHPTkjs6NKYQvQSBngp4PTTVWkPZRbL'      // ClientSecret
                )
            );

          $orderdata=Bill::where('shiping_id',$shiping_id)->get();
          Mail::to(Auth::user()->email)->send(new OrderShipped($orderdata));
    }
}
