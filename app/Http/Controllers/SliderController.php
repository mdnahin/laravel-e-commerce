<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Slider;
use Image;
class SliderController extends Controller
{
    function slider(){
        return view('backend.slider.slider');
    }
    function sliderPost(Request $request){

        if($request->hasFile('slider_image')){
            $image=$request->file('slider_image');
            $img_name=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,1000)->save(public_path('/img/slider/'.$img_name));

            Slider::insert([
                'slider_title' =>$request->slider_title,
                'slider_content' =>$request->slider_content,
                'slider_image' =>$img_name,
                'created_at' =>Carbon::now()
            ]);
            return back()->with('slider','Slide created successfully');
        }
        else{
            Slider::insert([
                'slider_title' =>$request->slider_title,
                'slider_content' =>$request->slider_content,
                'created_at' =>Carbon::now()
            ]);
            return back()->with('slider','Slide created successfully');
        }
        
    }
    //all slide
    function sliderAll(){
        $slider=Slider::all();
        return view('backend.slider.slider_view',compact('slider'));
    }

    function sliderDelete($id){
        Slider::where('id',$id)->delete();
        return back()->with('delete','Delete successfully.');
    }
    //slider edit
    function sliderEdit($id){
        $slider=Slider::findOrFail($id);
        return view('backend.slider.slider_update',compact('slider'));
    }
    //update slider
    function sliderUpdate(Request $request,$id){
        $slider_img=Slider::findOrFail($id);
        $old_img=$slider_img->slider_image;
        
        if($request->hasFile('slider_image')){
            $image=$request->file('slider_image');
            $img_name=time().'.'.$image->getClientOriginalExtension();
            
            if(file_exists(public_path('img/slider/').$old_img)){
                unlink(public_path('img/slider/').$old_img);
            }

            Image::make($image)->resize(1920,1000)->save(public_path('/img/slider/'.$img_name));

            Slider::where('id',$id)->update([
                'slider_title' =>$request->slider_title,
                'slider_content' =>$request->slider_content,
                'slider_image' =>$img_name,
                'updated_at' =>Carbon::now()
            ]);
            return back()->with('slider','Slide updated successfully');
        }
        else{
            Slider::where('id',$id)->update([
                'slider_title' =>$request->slider_title,
                'slider_content' =>$request->slider_content,
                'updated_at' =>Carbon::now()
            ]);
            return back()->with('slider','Slide updated successfully');
        }
    }
}
