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


Route::get('/', 'HomeController@start');
/* 
Route::get('/', function () {return view('wel');});
Route::get('/#','AdminController@index'); 
Route::get('/dashbord','AdminController@show_dashboard');
Route::post('/admin-Dashboard','AdminController@dashboard');
Route::get('/admin-register','AdminController@registerIndex');
Route::get('/register-admin-Dashboard','AdminController@registerDashboard');
Route::post('/admin-logout','AdminController@doLogout'); */
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories', 'HomeController@category');
Route::get('/Showcategory/{id}', 'HomeController@show');
Route::get('/ShowPro/{id}', 'HomeController@showPro');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/customer', 'Auth\LoginController@showCustomerLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/customer', 'Auth\RegisterController@showCustomerRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/customer', 'Auth\LoginController@customerLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/customer', 'Auth\RegisterController@createCustomer');
Route::post('/logoutCustomer', 'Auth\LoginController@CustomerLogout')->name('logoutCustomer');

Route::group(['middleware' => 'auth:customer'], function () {
    Auth::routes();
    Route::view('/customer', 'customer');
    Route::get('/shop', 'CartController@shop')->name('shop');
    Route::get('/cart', 'CartController@cart')->name('cart.index');
    Route::post('/add', 'CartController@add')->name('cart.store');
    Route::post('/update', 'CartController@update')->name('cart.update');
    Route::post('/remove', 'CartController@remove')->name('cart.remove');
    Route::post('/clear', 'CartController@clear')->name('cart.clear');
    Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');
    Route::resource('/order', 'OrderController');
    Route::get('paypal/checkout/{order}','PayPalController@getExpressCheckout')->name('paypal.checkout');
    Route::get('paypal/checkout-success/{order}','PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
    Route::get('paypal/checkout-cancel','PayPalController@CancelPage')->name('paypal.cancel');
    /* Route::get('/cart', array('before'=>'auth.basic','as'=>'cart','uses'=>'CartController@getIndex'));
    Route::post('/cart/add', array('before'=>'auth.basic','uses'=>'CartController@postAddToCart'));
    Route::get('/cart/delete/{id}', array('before'=>'auth.basic','as'=>'delete_book_from_cart','uses'=>'CartController@getDelete'));
    Route::post('/order', array('before'=>'auth.basic','uses'=>'OrderController@postOrder'));
    Route::get('/user/orders', array('before'=>'auth.basic','uses'=>'OrderController@getIndex')); */
});
Route::group(['middleware' => 'auth:admin'], function () {
    Auth::routes();
    Route::view('/admin', 'admin');
    Route::resource('/admin/categories', 'CategoriesController');
    Route::resource('/admin/manufacture', 'ManufactureController');
    Route::resource('/admin/produits', 'ProductController');
    Route::resource('/admin/slider', 'SliderController');
    Route::get('/admin/order','HomeController@orderClient')->name('orderClient');
});