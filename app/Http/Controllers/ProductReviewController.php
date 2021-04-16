<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProductReview;
use Carbon\Carbon;
class ProductReviewController extends Controller
{
    function __construct(){
        $this->middleware('auth');
    }
    function product_review(Request $request){
        $user_id=auth()->id();
        $user_name=Auth::user()->name;

        $review=ProductReview::where('user_id',$user_id)->where('product_id',$request->product_id)->count();
        
        if($review > 0){
            ProductReview::where('user_id',$user_id)
            ->where('product_id',$request->product_id)
            ->update([
                'stars' => $request->stars,
                'review' => $request->review,
                'updated_at' => Carbon::now()
            ]);
            return back()->with('review','Thanks for your review');
        }
        else{
            ProductReview::insert([
                'user_id' => $user_id,
                'user_name' => $user_name,
                'product_id' => $request->product_id,
                'stars' => $request->stars,
                'review' => $request->review,
                'created_at' => Carbon::now()
            ]);
            return back()->with('review','Thanks for your review');
        }
       
    }
}
