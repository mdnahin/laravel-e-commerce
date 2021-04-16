<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
   //Auth::routes();
   Auth::routes(['verify' => true]);
   Route::group(['middleware' => ['auth']], function () {

//header
Route::get('/fav-icon','HeaderController@favicon');
Route::post('/add-favicon','HeaderController@add_favicon');
Route::post('/update-favicon','HeaderController@update_favicon');

Route::get('/logo','HeaderController@logo');
Route::post('/add-logo','HeaderController@add_logo');
Route::post('/update-logo','HeaderController@update_logo');

Route::get('/topbar','HeaderController@topbar');
Route::post('/topbar-post','HeaderController@topbarPost');
Route::post('/topbar-update','HeaderController@topbarUpdate');
//slider
Route::get('/slider','SliderController@slider');
Route::post('/slider-post','SliderController@sliderPost');
Route::get('/all-slide','SliderController@sliderAll');
Route::get('/delete-slide/{slide_id}','SliderController@sliderDelete');
Route::get('/edit-slide/{slide_id}','SliderController@sliderEdit');
Route::post('/update-slide/{slide_id}','SliderController@sliderUpdate');


Route::get('/add-category','CategoryController@category');
Route::post('/create-category','CategoryController@createcategory');
Route::get('/view-category','CategoryController@viewcategory');
Route::get('/delete-category/{cat_id}','CategoryController@deletecategory');
Route::get('/edit-category/{cat_id}','CategoryController@editcategory');
Route::post('/update-category/{cat_id}','CategoryController@updatecategory');

//sub category
Route::get('/add-subcategory','Helloworld@subCategory');
Route::post('/create-subcategory','Helloworld@AddsubCategory');
Route::get('/view-subcategory','Helloworld@ViewsubCategory');
Route::get('/delete-subcategory/{subcate_id}','Helloworld@DeletesubCategory');
Route::get('/edit-subcategory/{subcate_id}','Helloworld@EditsubCategory');
Route::post('/update-subcategory/{subcate_id}','Helloworld@UpdatesubCategory');
Route::get('/trash-subcategory','Helloworld@TrashsubCategory');
Route::get('/restore-subcategory/{del_id}','Helloworld@RestoresubCategory');
Route::get('/force-subcategory/{del_id}','Helloworld@ForcesubCategory');

//product
Route::get('/add-product','ProductController@product');
Route::post('/create-product','ProductController@AddProduct');
Route::get('/view-product','ProductController@ViewProduct');
Route::get('/delete-product/{pro_id}','ProductController@DeleteProduct');
Route::get('/edit-product/{pro_id}','ProductController@EditProduct');
Route::post('/update-product','ProductController@UpdateProduct')->name('UpdateProduct');
Route::get('/trash-product','ProductController@TrashsubCategory');
Route::get('/restore-product/{del_id}','ProductController@RestoresubCategory');
Route::get('/force-product/{del_id}','ProductController@ForcesubCategory');

//coupon
Route::get('/add-coupon','CouponController@add_coupon');
Route::post('/add-coupon-post','CouponController@add_coupon_post');
Route::get('/view-coupon','CouponController@view_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/edit-coupon/{coupon_id}','CouponController@edit_coupon');
Route::post('/update-coupon/{coupon_id}','CouponController@update_coupon');

//testiminial
Route::get('/testimonial','TestimonialController@testimonial');
Route::post('/testimonial-title','TestimonialController@testimonial_title');
Route::post('/testimonial-title-update','TestimonialController@testimonial_title_update');
Route::post('/add-testimonial','TestimonialController@add_testimonial');
Route::get('/all-testimonial','TestimonialController@all_testimonial');
Route::get('/delete-testimonial/{test_id}','TestimonialController@delete_testimonial');
Route::get('/edit-testimonial/{test_id}','TestimonialController@edit_testimonial');
Route::post('/update-testimonial/{test_id}','TestimonialController@update_testimonial');

//footer
Route::get('/footer-one','FooterController@footer_one');
Route::post('/create-social-link','FooterController@create_link');
Route::post('/update-social-link','FooterController@update_link');
Route::get('/footer-two','FooterController@footer_two');
Route::post('/create-footer-two','FooterController@create_footer_two');
Route::post('/update-footer-two','FooterController@update_footer_two');

//checkout
Route::get('/checkout','CheckoutController@Checkout')->name('Checkout');
Route::post('/payment','PaymentController@Payment')->name('Payment');
Route::get('/api/get-state-list/{country_id}','CheckoutController@GetState')->name('GetState');
Route::get('api/get-city-list/{state_id}','CheckoutController@GetCity')->name('GetCity');

Route::get('/home', 'HomeController@index')->name('home');


});

//frontend
Route::get('/','FrontendController@FrontPage');
Route::get('/shop','FrontendController@ShopPage');
Route::get('/item/{slug}','FrontendController@SingleProduct')->name('SingleProduct');
Route::get('/singlecart/{slug}','CartController@SingleCart')->name('SingleCart');
Route::get('/cart','CartController@CartPage')->name('CartPage');
Route::get('/cart/{coupon}','CartController@CartPage')->name('Coupon');
Route::get('/cart-delete/{id}','CartController@DeleteCart')->name('DeleteCart');
Route::post('/cart-update','CartController@UpdateCart')->name('UpdateCart');

Route::post('/product-review','ProductReviewController@product_review')->name('product_review');

Route::post('/newsletter','NewsletterController@store')->name('store');

//socialite
Route::get('login/github', 'SocialController@redirectToProvider')->name('redirectToProvider');
Route::get('login/github/callback', 'SocialController@handleProviderCallback')->name('handleProviderCallback');