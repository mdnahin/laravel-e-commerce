<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
    function add_coupon(){
        return view('backend.coupon.add_coupon');
    }

    function add_coupon_post(Request $request){
        $request->validate([
            'coupon_code' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);
        
        Coupon::insert([
            'coupon_code' => $request->coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);

        return back()->with('coupon','Coupon Create Successfully');

    }
    //view coupon
    function view_coupon(){
        $coupons=Coupon::orderBy('id','desc')->get();

        return view('backend.coupon.view_coupon',compact('coupons'));
    }
    //delete coupon
    function delete_coupon($id){
        Coupon::findOrFail($id)->delete();

        return back()->with('delete','Coupon deleted successfully.');
    }
    //edit coupon
    function edit_coupon($id){
        $coupon=Coupon::findOrFail($id);
        return view('backend.coupon.edit_coupon',compact('coupon'));
    }
    //update coupon
    function update_coupon(Request $request,$id){
        $request->validate([
            'coupon_code' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);
        
        Coupon::where('id',$id)->update([
            'coupon_code' => $request->coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now()
        ]);

        return redirect('/view-coupon')->with('update','Coupon code updated successfully');
    }
}
