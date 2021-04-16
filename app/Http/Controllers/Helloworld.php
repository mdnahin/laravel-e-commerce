<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Helloworld;
use App\SubCategory;
use App\Category;
use Carbon\Carbon;
class Helloworld extends Controller
{
    //
    function __construct(){
        $this->middleware('verified');
    }
    function subCategory(){
        $category=Category::all();
        return view('backend.subcategory.add_subcategory',compact('category'));
    }

    function AddsubCategory(Request $request){
        
        $request->validate([
            'category_id' =>['required'],
            'subcategory_name' => ['required','min:2']
        ]);
        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('create','SubCategory Create Successfully');
    }
    //view subcategory
    function ViewsubCategory(){
        $subcategory=SubCategory::with('get_category')->get();
        
        return view('backend.subcategory.view_subcategory',compact('subcategory'));
    }
    function EditsubCategory($id){
        $subcategory=SubCategory::findOrFail($id);
        //return $subcategory->id;
        $category=Category::all();
        return view('backend.subcategory.edit_subcategory',compact('subcategory','category'));
    }
    //delete
     function DeletesubCategory($id){
         SubCategory::where('id',$id)->delete();
         return back()->with('trash','Data trashed successfully');
     }
     //trash
     function TrashsubCategory(){
         $deleted=SubCategory::onlyTrashed()->get();
         $count=SubCategory::onlyTrashed()->count();
         return view('backend.subcategory.deleted_subcategory',compact('deleted','count'));

     }
     //restore
     function RestoresubCategory($id){
         SubCategory::withTrashed()->where('id',$id)->restore();
         return back();
     }
     //force delete
     function ForcesubCategory($id){
         SubCategory::withTrashed()->where('id',$id)->forceDelete();
         return back()->with('drop','Your data permanently delete');
        //return $id;
     }

     function UpdatesubCategory(Request $request,$id){
        SubCategory::where('id',$id)->update([
            'subcategory_name' => $request->subcategory_name,
            'category_id' => $request->category_id,
            
        ]);
        return redirect('/view-subcategory')->with('update','SubCategory update successfully.');
     }
}

