<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FooterOne;
use App\FooterTwo;
use Carbon\Carbon;
class FooterController extends Controller
{
    function footer_one(){
        $link=FooterOne::first();
        return view('backend.footer.footer_one',compact('link'));
    }

    //create social link
    function create_link(Request $request){
        FooterOne::insert([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkden' => $request->linkden,
            'instragram' => $request->instragram,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success','Data inserted successfully.');
    }
    //update link
    function update_link(Request $request){
        FooterOne::where('id',1)->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkden' => $request->linkden,
            'instragram' => $request->instragram,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success','Data updated successfully.');
    }
    //footer two
    function footer_two(){
        $footer_items=FooterTwo::first();
        return view('backend.footer.footer_two',compact('footer_items'));
    }
    //create
    function create_footer_two(Request $request){
        FooterTwo::insert([
            'footer_desc' => $request->footer_desc,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'copy_right' => $request->copy_right,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success','Data inserted successfully.');
    }
    //update footer two
    function update_footer_two(Request $request){
        FooterTwo::where('id',1)->update([
            'footer_desc' => $request->footer_desc,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'address' => $request->address,
            'copy_right' => $request->copy_right,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success','Data updated successfully.');
    }
}
