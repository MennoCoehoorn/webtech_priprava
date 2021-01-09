<?php

use Illuminate\Support\Facades\Route;
//use App\Controllers\ProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', function () {
    return view('landing');
});

/*Route::get('/register', function (){
    return view('register');
});

Route::get('/login', function (){
    return view('login');
});*/

Route::get('/allproducts', function (){
    return view('all_products');
});

Route::get('/productdetail', function (){
    return view('product_detail');
});

Route::get('/cart1', function (){
    return view('cart_1');
});

Route::get('/cart2', function (){
    return view('cart_2');
});

Route::get('/cart3', function (){
    return view('cart_3');
});

Route::get('/landing', function (){
    return view('landing');
});


Route::get('/allproducts/{gender}/{category}', [ProductController::class, 'index'])->name('allproducts');
Route::get('/allproducts/{gender}/{category}/{id}', [ProductController::class, 'show'])->name('productdetail');

Route::post('/addtocart',[CartController::class, 'add']);

Route::post('/search', [ProductController::class, 'search'])->name('search');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
