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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/register','admin\AdminController@register')->name('register');
// Route::post('/login','admin\AdminController@postLogin');

// backend

// Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');




// login logout admin
Route::get('/adminlogin','admin\AdminController@login')->name('adminLogin');
Route::post('/adminlogin','admin\AdminController@postLogin');

//admin route
Route::group(['prefix'=>'admin','as'=>'admin.'],function () {
	Route::get('/','admin\AdminController@index')->name('adminHome');
	Route::get('/order','admin\OrderController@index')->name('orderIndex');
	Route::get('/orderDetail/{id}','admin\OrderController@detail')->name('orderDetail');
	Route::post('/orderDetail/{id}','admin\OrderController@postDetail')->name('updateOrder');
    Route::resources([
    'category' => 'admin\CategoryController',
    'product' => 'admin\ProductController',
    'blog' => 'admin\BlogController',
    'banner' => 'admin\BannerController'
]);
});



// frondend
//product route
Route::get('/product/{slug}','client\ClientController@productDetail')->name('productDetail');
Route::post('/search','client\ClientController@search')->name('search');
Route::get('/category/{slug}','client\ClientController@productList')->name('product');
Route::get('/category/{slug}/sort','client\ClientController@productListSort')->name('productSort');

//cart route
Route::get('/add-cart/{id}','client\CartController@addCart')->name('add-cart');
Route::get('/view-cart','client\CartController@viewCart')->name('view-cart');
Route::get('/update-cart/{id?}/{quantity?}','client\CartController@updateCart')->name('update-cart');
Route::get('/delete/{id?}','client\CartController@deleteCart')->name('delete-cart');
// Route::get('/deletemini/{id?}','client\CartController@deleteMiniCart')->name('delete-minicart');
Route::get('/checkout','client\ClientController@checkout')->name('checkout');

//wishlist route
Route::get('/wishlist','client\WishlistController@index')->name('wishlist');
Route::get('/add-wishlist/{id}','client\WishlistController@add')->name('add-wishlist');
Route::post('/delete-wishlist/{id}','client\WishlistController@delete')->name('delete-wishlist');

//order route
Route::get('/checkout','client\CheckoutController@index')->name('checkout');
Route::post('/checkout','client\CheckoutController@postCheckout');

//comment route
Route::post('/add-comment/{id}','client\CommentController@add')->name('addComment');



// login logout client
Route::get('/dang-ky','client\ClientController@register')->name('clientRegister');
Route::post('/dang-ky','client\ClientController@postRegister');
Route::get('/dang-nhap','client\ClientController@login')->name('clientLogin');
Route::post('/dang-nhap','client\ClientController@postLogin');
Route::get('/logout','client\ClientController@logout')->name('logout');
Route::get('/account','client\ClientController@account')->name('account');
Route::post('/account','client\ClientController@updateAccount');



Route::get('/','client\ClientController@index')->name('clientHome');
Route::get('/blogdetail/{slug}','client\ClientController@blog_detail')->name('blogDetail');
Route::get('/blogdetail','client\ClientController@blog')->name('blog');
Route::get('/about','client\ClientController@about')->name('about');
Route::get('/contact','client\ClientController@contact')->name('contact');
// Route::get('/product/{slug}','client\ClientController@productDetail')->name('productDetail');

// Route::get('/product/{slug}','client\ClientController@productDetail')->name('productDetail');
// Route::get('/product/{slug}', function () {
//     return 'Hello World';
// })->name('productDetail');











