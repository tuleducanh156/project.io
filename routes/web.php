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

Route::get('demo', 'DemoController@index');
//login
// Route::get('dangnhap','UserController@Login');
// //Register
// Route::get('dangki','UserController@getRegister');
// Route::post('dangki','UserController@postRegister');
//index 
Route::get('/',function(){
    return view('welcome');
});
Route::get('test',function(){
    return view('test');
});
////////frondend

///register frontend
Route::get('/signup_member', 'frontend\MemberController@create');
Route::post('/signup_member','frontend\MemberController@store');
Route::get('/login_member', 'frontend\MemberController@getLogin');
Route::post('/login_member','frontend\MemberController@postLogin');


//checklogin
Route::group(['middleware' => 'member'],function(){

Route::get('/index', function () {
    return view('/frontend/index/index');
});
//account
Route::get('/account','frontend\AccountController@index');
Route::post('/account', 'frontend\AccountController@update');
//product
Route::get('/account/product','frontend\ProductController@index');
Route::get('/account/product/add', 'frontend\ProductController@create');
Route::post('/account/product/add', 'frontend\ProductController@store');
Route::get('/account/product/edit/{id}', 'frontend\ProductController@edit');
Route::post('/account/product/edit/{id}', 'frontend\ProductController@update');
Route::DELETE('/account/product/delete/{id}', 'frontend\ProductController@destroy');
Route::get('/home_product','frontend\ProductController@home');
//logout
Route::get('/logout_member','frontend\MemberController@logout');
});
//blogs
Route::get('/blogs_index', 'frontend\BlogsIndexController@index');
Route::get('/blogs_single/{id}', 'frontend\BlogsIndexController@show');
Route::post('/rate_blogs','frontend\BlogsIndexController@PostRate');
Route::post('/comment_blogs','frontend\BlogsIndexController@PostComment');
//Add Cart
Route::get('/addcart','frontend\CartController@index');
Route::post('/addcart','frontend\CartController@addToCart');
Route::post('/addcartUp','frontend\CartController@UpToCart');
//checkout
Route::get('/checkout','frontend\ProductController@checkout');
Route::post('/checkout','frontend\ProductController@signup');
Route::post('/checkoutUp','frontend\ProductController@UpToCheckout');
Route::get('/checkoutMail','frontend\ProductController@MailCheckout');
//search
Route::get('/search','frontend\ProductController@Search');
Route::get('/search_advanced','frontend\SearchController@index');
Route::get('/search_product','frontend\SearchController@SearchProduct');
Route::post('/search_advanced','frontend\SearchController@SearchProduct');
// backend
Auth::routes();

Route::get('/home', 'Admin\HomeController@index')->name('home');
Route::get('/ck_test', function () {
    return view('ckfinder_test');
});
//check admin
Route::group([
    // 'prefix' => 'admin', //tien to vao sau link
    'namespace' => 'Admin',
    'middleware' => ['admin']
], function () {
//Admin
Route::get('/profile', 'UserController@index')->name('profile');
Route::post('/profile', 'UserController@update');

// Route::get('/profile',function(){
//     return view('Admin\profile\page-profile');
// });
//Country
Route::get('/country','Admin\CountryController@listCountry')->name('country');
Route::get('/country/add','Admin\CountryController@create');
Route::post('/country/add','Admin\CountryController@store');
Route::DELETE('/Admin/country/delete/{id}', 'Admin\CountryController@destroy');
//category
Route::get('/category','Admin\CategoryController@index');
Route::get('/category/add','Admin\CategoryController@create');
Route::post('/category/add','Admin\CategoryController@store');
Route::DELETE('/Admin/category/delete/{id}', 'Admin\CategoryController@destroy');
//brand
Route::get('/brand','Admin\BrandController@index');
Route::get('/brand/add','Admin\BrandController@create');
Route::post('/brand/add','Admin\BrandController@store');
Route::DELETE('/Admin/brand/delete/{id}', 'Admin\BrandController@destroy');
//Blog
Route::get('/blog','Admin\BlogController@index');
Route::get('/blog/add','Admin\BlogController@create');
Route::post('/blog/add','Admin\BlogController@store');
Route::DELETE('/Admin/blog/delete/{id}', 'Admin\BlogController@destroy');
Route::get('/Admin/blog/edit/{id}','Admin\BlogController@edit');
Route::post('/Admin/blog/edit/{id}','Admin\BlogController@update');

Route::get('/dashboard',function(){
    return view('Admin/dashboard/dashboard');
});
Route::get('/form',function(){
    return view('Admin/form/form-basic');
});
Route::get('/table',function(){
    return view('Admin/table/table-basic');
});
Route::get('/icon-material',function(){
    return view('Admin/icon-material/icon-material');
});
Route::get('/blank',function(){
    return view('Admin/blank/starter-kit');
});
Route::get('/404',function(){
    return view('Admin/404/error-404');
});
});