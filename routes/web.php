<?php

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
/* FrontEnd Location */
Route::get('/','IndexController@index');
Route::get('/list-products','IndexController@shop');
Route::get('/list-productsaz','IndexController@shopaz');
Route::get('/list-productsza','IndexController@shopza');
Route::get('/list-productsplh','IndexController@shopplh');
Route::get('/list-productsphl','IndexController@shopphl');
Route::get('/cat/{id}','IndexController@listByCat')->name('cats');
Route::get('/product-detail/{id}','IndexController@detialpro');

Route::get('/about','IndexController@about');
Route::get('/team','IndexController@team');
Route::get('/advantage','IndexController@advantage');
Route::get('/faq','IndexController@faq');
Route::get('/whyegate','IndexController@whyegate');
Route::get('/screen','IndexController@screen');
Route::get('/downloads','IndexController@downloads');
Route::get('/accessories','IndexController@accessories');
Route::get('/elearning','IndexController@elearning');
Route::get('/career','IndexController@career');
Route::get('/support','IndexController@support');
Route::get('/contact','IndexController@contact');
Route::get('/privacy','IndexController@privacy');
Route::get('/terms','IndexController@terms');
Route::get('/result', 'IndexController@indexsearch')->name('result');
Route::post('/contact_form','IndexController@contactform');

////// get Attribute ////////////
Route::get('/get-product-attr','IndexController@getAttrs');
///// Cart Area /////////
Route::post('/addToCart','CartController@addToCart')->name('addToCart');
Route::post('/comparison','CartController@comparison')->name('comparison');
Route::get('/viewcart','CartController@index');
Route::get('/viewcompare','CartController@viewcompare');
Route::get('/cart/deleteItem/{id}','CartController@deleteItem');
Route::get('/cart/update-quantity/{id}/{quantity}','CartController@updateQuantity');
Route::post('/reviews','CartController@reviews')->name('reviews');
Route::post('/wishList','CartController@wishList')->name('wishList');
Route::get('/wish/deleteItem/{id}','CartController@deleteWish');
/////////////////////////
/// Apply Coupon Code
Route::post('/apply-coupon','CouponController@applycoupon');
/// Simple User Login /////
Route::get('/login_page','UsersController@index');
Route::get('/register_page','UsersController@create');
Route::post('/register_user','UsersController@register');
Route::post('/user_login','UsersController@login');
Route::get('/logout','UsersController@logout');

////// User Authentications ///////////
Route::group(['middleware'=>'FrontLogin_middleware'],function (){
    Route::get('/myaccount','UsersController@account');
    Route::get('/wishcarts','UsersController@wishcarts');
    Route::get('/orderhistory','UsersController@orderhistory');
    Route::put('/update-profile/{id}','UsersController@updateprofile');
    Route::put('/update-password/{id}','UsersController@updatepassword');
    Route::get('/check-out','CheckOutController@index');
    Route::post('/submit-checkout','CheckOutController@submitcheckout');
    Route::get('/order-review','OrdersController@index');
    Route::post('/submit-order','OrdersController@order');
    Route::get('/cod','OrdersController@cod');
    Route::get('/paypal','OrdersController@paypal');

});
///




/* Admin Location */
Auth::routes(['register'=>false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', 'AdminController@index')->name('admin_home');
    /// Setting Area
    Route::get('/settings', 'AdminController@settings');
    Route::get('/check-pwd','AdminController@chkPassword');
    Route::post('/update-pwd','AdminController@updatAdminPwd');
    /// Category Area
    Route::resource('/category','CategoryController');
    Route::get('delete-category/{id}','CategoryController@destroy');
    Route::get('/check_category_name','CategoryController@checkCateName');
    Route::get('delete-catimage/{id}','CategoryController@deleteImage');
    Route::get('delete-catbanner/{id}','CategoryController@deleteBanner');
    /// Products Area
    Route::resource('/product','ProductsController');
    Route::get('delete-product/{id}','ProductsController@destroy');
    Route::get('delete-image/{id}','ProductsController@deleteImage');
    /// Product Attribute
    Route::resource('/product_attr','ProductAtrrController');
    Route::get('delete-attribute/{id}','ProductAtrrController@deleteAttr');
    /// Product Images Gallery
    Route::resource('/image-gallery','ImagesController');
    Route::get('delete-imageGallery/{id}','ImagesController@destroy');
    /// ///////// Coupons Area //////////
    Route::resource('/coupon','CouponController');
    Route::get('delete-coupon/{id}','CouponController@destroy');
    Route::get('/orders','CouponController@orderlist')->name('orderlist');
    Route::get('/users','AdminController@userlist')->name('userlist');

    Route::resource('/pages','PageController');
    Route::get('delete-pageimage/{id}','PageController@deleteImage');
///
});
