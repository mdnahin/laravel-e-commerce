<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FavIcon;
use App\Logo;
use App\Topbar;
use Image;
use Carbon\Carbon;
class HeaderController extends Controller
{
    function favicon(){
        $fav_icon=FavIcon::all();
        
        return view('backend.header.favicon',compact('fav_icon'));
    }
    function add_favicon(Request $request){
        $request->validate([
            'favicon_image' =>['required'],
        ]);
        if($request->hasFile('favicon_image')){
            $image=$request->file('favicon_image');
            $img_name='fav-icon'.'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(32,32)->save(public_path('/img/logo/'.$img_name));
            
            
            FavIcon::insert([
                'favicon_image' =>$img_name,
                'created_at' =>Carbon::now()
            ]);
            return back()->with('fav-icon','Fav-Icon upload successfully');
        }
    }
      function update_favicon(Request $request){
          $id=$request->fav_id;
          $fav_image=FavIcon::findOrFail($id);
          $old_img=$fav_image->favicon_image;

          if($request->hasFile('favicon_image')){

            $image=$request->file('favicon_image');
            $img_name='fav-icon'.'.'.$image->getClientOriginalExtension();

            if($old_img){
                if(file_exists(public_path('img/logo/').$old_img)){
                    unlink(public_path('img/logo/').$old_img);
                }
            }
            Image::make($image)->resize(32,32)->save(public_path('/img/logo/'.$img_name));
            
            
            FavIcon::findOrFail($id)->update([
                'favicon_image' =>$img_name,
                'updated_at' =>Carbon::now()
            ]);
            return back()->with('fav-icon','Fav-Icon updated successfully');
        }
        else{
            if(file_exists(public_path('img/logo/').$old_img)){
                unlink(public_path('img/logo/').$old_img);
            }
            FavIcon::findOrFail($id)->update([
                'favicon_image' =>'',
                'updated_at' =>Carbon::now()
            ]);
            return back()->with('fav-icon','Fav-Icon updated successfully');
        }
      }
    //logo
    function logo(){
        $logo=Logo::all();
        return view('backend.header.logo',compact('logo'));
    }

    function add_logo(Request $request){
        $request->validate([
            'logo_image' =>['required'],
        ]);
        if($request->hasFile('logo_image')){
            $image=$request->file('logo_image');
            $img_name='logo'.'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/img/logo/'.$img_name));
            
            
            Logo::insert([
                'logo_image' =>$img_name,
                'created_at' =>Carbon::now()
            ]);
            return back()->with('logo','Logo upload successfully');
        }
    }

    function update_logo(Request $request){
        $id=$request->logo_id;
        $logo_image=Logo::findOrFail($id);
        $old_img=$logo_image->logo_image;

        if($request->hasFile('logo_image')){

          $image=$request->file('logo_image');
          $img_name='logo'.'.'.$image->getClientOriginalExtension();

          if($old_img){
              if(file_exists(public_path('img/logo/').$old_img)){
                  unlink(public_path('img/logo/').$old_img);
              }
          }
          Image::make($image)->save(public_path('/img/logo/'.$img_name));
          
          
          Logo::findOrFail($id)->update([
              'logo_image' =>$img_name,
              'updated_at' =>Carbon::now()
          ]);
          return back()->with('logo','Logo updated successfully');
      }
      else{
          if(file_exists(public_path('img/logo/').$old_img)){
              unlink(public_path('img/logo/').$old_img);
          }
          Logo::findOrFail($id)->update([
              'logo_image' =>'',
              'updated_at' =>Carbon::now()
          ]);
          return back()->with('logo','Fav-Icon updated successfully');
      }
      
    }
    //topbar
    function topbar(){
        return view('backend.header.topbar');
    }
    function topbarPost(Request $request){
        Topbar::insert([
            'title_one' =>$request->title_one,
            'title_two' =>$request->title_two,
            'created_at'=>Carbon::now()
        ]);
        return back()->with('topbar','Title added successfully');
    }
    function topbarUpdate(Request $request){
        Topbar::findOrFail($request->topbar_id)->update([
            'title_one' =>$request->title_one,
            'title_two' =>$request->title_two,
            'updated_at'=>Carbon::now()
        ]);
        return back()->with('topbar','Title updated successfully');
    }
}
