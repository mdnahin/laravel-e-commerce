<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ProductGallery;
use App\Cart;
use App\ProductReview;
use App\Coupon;
use App\Bill;
use Carbon\Carbon;
class FrontendController extends Controller
{
    public function FrontPage(){
        $product=Product::orderBy('id','desc')->get();
        $featured_product=Category::all();
        $coupon=Coupon::orderBy('id','desc')->first();

        $bestsales = Bill::
        leftJoin('products','products.id','=','bills.product_id')
        ->select('products.id','products.product_name','products.product_price','products.product_thumbnail',
            'products.slug','products.category_id','bills.product_id',
             Bill::raw('SUM(bills.product_quantity) as total'))
        ->groupBy('products.id','products.product_name','products.product_price','products.product_thumbnail',
        'products.category_id','products.slug','bills.product_id',)
        ->orderBy('total','desc')
        ->limit(8)
        ->get();

        return view('frontend.main',compact('product','featured_product','coupon','bestsales'));
    }
//single product
    function SingleProduct($slug){
        $product=Product::where('slug',$slug)->first();
        $product_gallery=ProductGallery::where('product_id',$product->id)->get();
        $related_product=Product::where('category_id',$product->category_id)->inRandomOrder(4)->get();
        $title= $product->product_name;

        
        $total=ProductReview::where('product_id',$product->id)->get()->sum('stars');
        $num_rows=ProductReview::where('product_id',$product->id)->count();
        
        if($num_rows > 0)
        {
            $total_rate=round($total/$num_rows);
        }
        else{
            $total_rate=round($total/1);
        }
        return view('frontend.single_product',compact('product','product_gallery','related_product','title','total_rate'));
    }
    //shop page
    function ShopPage(){
        $category=Category::all();
        $product=Product::all();
        return view('frontend.shop',compact('category','product'));
    }
    
    
} 
