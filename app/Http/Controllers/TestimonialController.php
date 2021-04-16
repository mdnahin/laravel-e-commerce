<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use Carbon\Carbon;
use Image;
class TestimonialController extends Controller
{
    public function testimonial(){
        $count=Testimonial::count();
        $title=Testimonial::first();
        return view('backend.testimonial.testimonial',compact('count','title'));
    }
    //itle
    function testimonial_title(Request $request){
        Testimonial::insert([
            'title' => $request->title,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success','Title created successfully');
        
    }
    //update title
    function testimonial_title_update(Request $request){
        Testimonial::where('id',$request->id)->update([
            'title' => $request->title,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success','Title updated successfully');
    }
    //client details
    function add_testimonial(Request $request){

        if($request->hasFile('client_img')){
            $image=$request->file('client_img');
            $img_name=time().'.'.$image->getClientOriginalExtension();

            Image::make($image)->save(public_path('/img/testimonial/'.$img_name));
            
            Testimonial::insert([
                'client_name' =>$request->client_name,
                'client_designation' =>$request->client_designation,
                'desc' =>$request->desc,
                'client_img' =>$img_name,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success','Testimonial created successfully');
        }
        else{
            Testimonial::insert([
                'client_name' =>$request->client_name,
                'client_designation' =>$request->client_designation,
                'desc' =>$request->desc,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success','Testimonial created successfully');
        }
    }
    //show testimonial
    function all_testimonial(){
        $testimonial=Testimonial::offset(1)->limit(5)->get();
        
        return view('backend.testimonial.all_testimonial',compact('testimonial'));
    }
    //delete testimonial
    function delete_testimonial($id){
        Testimonial::findOrFail($id)->delete();
        return back()->with('success','Testimonial delete successfully');
    }
    //edit testimonial
    function edit_testimonial($id){
        $testimonial=Testimonial::where('id',$id)->first();
        return view('backend.testimonial.edit_testimonial',compact('testimonial'));
    }
    //update testimonial
    function update_testimonial(Request $request,$id){

        $item=Testimonial::findOrFail($id);
        $old_img=$item->client_img;
        
        if($request->hasFile('client_img')){
            $image=$request->file('client_img');
            $img_name=time().'.'.$image->getClientOriginalExtension();

            if(file_exists(public_path('img/testimonial/').$old_img)){
                unlink(public_path('img/testimonial/').$old_img);
            }
            Image::make($image)->save(public_path('/img/testimonial/'.$img_name));
            
            Testimonial::where('id',$id)->update([
                'client_name' =>$request->client_name,
                'client_designation' =>$request->client_designation,
                'desc' =>$request->desc,
                'client_img' =>$img_name,
                'created_at' => Carbon::now()
            ]);
            return redirect('/all-testimonial')->with('success','Testimonial updated successfully');
        }
        else{
            Testimonial::where('id',$id)->update([
                'client_name' =>$request->client_name,
                'client_designation' =>$request->client_designation,
                'desc' =>$request->desc,
                'created_at' => Carbon::now()
            ]);
            return redirect('/all-testimonial')->with('success','Testimonial updated successfully');
        }
    }
    
}
