<?php

use App\Role;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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


Route::get('/', 'ProductController@welcome')->name('welcome');
// Products Route
Route::get('/shop_grid', 'ProductController@index')->name('products.index');
Route::get('/shop_list', 'ProductController@list')->name('products.list');
Route::get('boutique/{slug}', 'ProductController@show')->name('products.show');
Route::get('/search', 'ProductController@search')->name('products.search');


// cart Route/

Route::get('/panier', 'CartController@index')->name('cart.index');
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
Route::post('/panier/{rowId}', 'CartController@update')->name('cart.update');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::post('/coupon', 'CartController@storeCoupon')->name('cart.store.coupon');
Route::delete('/coupon', 'CartController@destroyCoupon')->name('cart.destroy.coupon');

Route::get('/videpanier', function(){
    Cart::destroy();

});

//  Checkout Route

Route::group(['middleware' => 'auth'], function () {
    Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');
    Route::post('/paiement', 'CheckoutController@store')->name('checkout.store');
    Route::get('/merci', 'CheckoutController@thankYou')->name('checkout.thankYou');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin



//LoginController
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin_login');
Route::get('/login/client', 'Auth\LoginController@showClientLoginForm')->name('client_login');

//RegisterController
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm')->name('admin_register');
Route::get('/register/client', 'Auth\RegisterController@showClientRegisterForm')->name('client_register');

//ClientController
Route::get('/client', 'ClientController@clientDashboard')->name('client_dashboard');

//AdminController
Route::get('/admin', 'AdminController@adminDashboard')->name('admin_dashboard');
// Route::get('/admin', 'CostumersController@costumers');


//HomeController


//********************************POST********************************
//LoginController
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin_login');
Route::post('/login/client', 'Auth\LoginController@clientLogin')->name('client_login');

//RegisterController
Route::post('/register/admin', 'Auth\RegisterController@createAdmin')->name('admin_register');
Route::post('/register/client', 'Auth\RegisterController@createClient')->name('client_register');


//Product CRUD
Route::get('admin/product', 'Admin\ProductController@index')->name('admin.product.index');
Route::get('admin/edit/product/{id}', 'Admin\ProductController@edit');
Route::post('admin/update/product/{id}', 'Admin\ProductController@update');
