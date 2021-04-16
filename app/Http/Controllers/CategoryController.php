<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
use Image;
class CategoryController extends Controller
{
    //
    
    public function category(){
        $data="This is category controller.";
        return view('backend.category',compact('data'));
    }

    function createcategory(Request $request){
        /*$cat=new Category;
        $cat->category_name=$request->category_name;
        $cat->save();*/
        $request->validate([
            'category_name' =>['required','min:2']
        ]);
        if($request->hasFile('category_image')){
            $image=$request->file('category_image');
            $img_name=time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,471)->save(public_path('/img/category_img/').$img_name);

            Category::insert([
                'category_name' => $request->category_name,
                'category_image' =>  $img_name,
                'created_at' => Carbon::now(),
            ]);
        }
        else{
            Category::insert([
                'category_name' => $request->category_name,
                'created_at' => Carbon::now(),
            ]);
        }
        
        return back()->with('success','Category Created successfully.');
        //return $request->category_name;
        //return "OK";
    }
    //view category
    function viewcategory(Request $request){
        $cat=Category::paginate(3);
        return view('backend.viewcategory',compact('cat'));
    }

    function deletecategory($id){
        Category::findOrFail($id)->delete();
        return back()->with('delete','Data deleted successfully.');
    }

    function editcategory($id){
         $cate=Category::findOrFail($id);
         return view('backend.edit',compact('cate'));
    }

    function updatecategory(Request $request,$id){
        $category=Category::findOrFail($id);
        $old_img=$category->category_image;

        if($request->hasFile('category_image')){
            $image=$request->file('category_image');
            $img_name=time().'.'.$image->getClientOriginalExtension();
            if(file_exists(public_path('img/category_img/').$old_img)){
                unlink(public_path('img/category_img/').$old_img);
            }
            Image::make($image)->resize(600,471)->save(public_path('/img/category_img/').$img_name);
            Category::where('id',$id)->update([
                'category_name' => $request->category_name,
                'category_image' => $img_name,
                'updated_at' => Carbon::now(),
            ]);
        }
        else{
            Category::where('id',$id)->update([
                'category_name' => $request->category_name,
                'updated_at' => Carbon::now(),
            ]);
        }
        
        return redirect('/view-category')->with('update','Hurrah!Data updated successfully.');
    }
}
