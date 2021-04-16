<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\SubCategory;
use App\ProductGallery;
use Carbon\Carbon;
use Image;
class ProductController extends Controller
{
    function product(){
        $cat=Category::all();
        $subcat=SubCategory::all();
        return view('backend.product.add_product',compact('cat','subcat'));
    }
    function AddProduct(Request $request){
        $request->validate([
            'product_name' =>['required'],
        ]);
        $slug=strtolower(str_ireplace(' ','-',$request->product_name));
        $slug_check=Product::where('slug',$slug)->count();

        if($slug_check > 0){
            $slug=$slug.'-'.time();
        }
        else{
            $slug;
        }
        //image
         if($request->hasFile('product_thumbnail')){
            $image= $request->file('product_thumbnail');
            $img_name=$slug.'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,622)->save(public_path('/img/thumbnail/'.$img_name));
            $product_id=Product::insertGetId([
                'product_name' => $request->product_name,
                'slug' => $slug,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'product_summery' => $request->product_summery,
                'product_description' => $request->product_description,
                'product_thumbnail' => $img_name,
                'created_at' => Carbon::now(),
            ]);
            if($request->hasFile('product_gallery')){
                $image_gallery= $request->file('product_gallery');
                foreach($image_gallery as $key => $item){
                    $image_name=time().$key.'.'.$item->getClientOriginalExtension();
                    Image::make($item)->resize(600,622)->save(public_path('/img/gallery/'.$image_name));
                   
                     ProductGallery::insert([
                         'product_id' => $product_id,
                         'product_gallery' => $image_name,
                         'created_at' => Carbon::now(),
                     ]);
                }     
            }
         }
        else{
            $product_id=Product::insertGetId([
                'product_name' => $request->product_name,
                'slug' => $slug,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'product_summery' => $request->product_summery,
                'product_description' => $request->product_description,
                'product_thumbnail' => $request->product_description,
                'created_at' => Carbon::now(),
            ]);

            if($request->hasFile('product_gallery')){
                $image_gallery= $request->file('product_gallery');
                foreach($image_gallery as $key => $item){
                    $image_name=time().$key.'.'.$item->getClientOriginalExtension();
                    Image::make($item)->resize(600,622)->save(public_path('/img/gallery/'.$image_name));
                   
                     ProductGallery::insert([
                         'product_id' => $product_id,
                         'product_gallery' => $image_name,
                         'created_at' => Carbon::now(),
                     ]);
                }     
            }

        }
        return back()->with('product_create','Product created successfully');
    }

    //view product
    function ViewProduct(){
        $product=Product::paginate(3);
        //return $product->product_name;
        return view('backend.product.view_product',compact('product'));
    }
    //edit product
    function EditProduct($id){
        $product=Product::findOrFail($id);
        $category=Category::all();
        $subcategory=SubCategory::all();
        session(['pro_id' => $id]);
        return view('backend.product.edit_product',compact('product','category','subcategory'));
    }
    //update product
    function UpdateProduct(Request $request){
        $request->validate([
            'product_name' =>['required'],
        ]);
        
        $pro_id=$request->session()->get('pro_id');

        $old_product=Product::findOrFail($pro_id);
        $slug=$old_product->slug;
        $old_img=$old_product->product_thumbnail;
        
        if($request->hasFile('product_thumbnail')){
            $image= $request->file('product_thumbnail');
            $img_name=$slug.'.'.$image->getClientOriginalExtension();
            if(file_exists(public_path('img/thumbnail/').$old_img)){
                unlink(public_path('img/thumbnail/').$old_img);
            }
            
            
            Image::make($image)->resize(600,622)->save(public_path('/img/thumbnail/'.$img_name));
            Product::findOrFail($pro_id)->update([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'product_summery' => $request->product_summery,
                'product_description' => $request->product_description,
                'product_thumbnail' => $img_name,
                'updated_at' => Carbon::now(),
            ]);
        }
        else{
            Product::findOrFail($pro_id)->update([
                'product_name' => $request->product_name,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'product_price' => $request->product_price,
                'product_quantity' => $request->product_quantity,
                'product_summery' => $request->product_summery,
                'product_description' => $request->product_description,
                'updated_at' => Carbon::now(),
            ]);
        }
        return redirect('/view-product')->with('update','Product update successfully');

    }
    //delete product
    function DeleteProduct($id){
        Product::findOrFail($id)->delete();

        return back()->with('delete','Product delete successfully');
    }


}
