<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cart1Controller;
use App\Http\Controllers\Cart2Controller;

//use App\Controllers\ProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\StockController;


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

Route::get('/', [LandingController::class, 'show']);


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

/*Route::get('/cart1', function (){
    return view('cart_1');
});*/

Route::get('/cart1',[Cart1Controller::class, 'index']);
Route::delete('/cart1/{id}',[Cart1Controller::class, 'destroy_sub']);
Route::post('/quantupdate',[Cart1Controller::class, 'update_quant']);
/*Route::resource('/cart1',[Cart1Controller::class, 'index']);*/

Route::get('/cart2',[Cart2Controller::class, 'index']);
Route::post('/order',[Cart2Controller::class, 'order_sent']);

Route::get('/cart3', function (){
    return view('cart_3');
});

Route::get('/landing', [LandingController::class, 'show']);


Route::get('/allproducts/{gender}/{category}', [ProductController::class, 'index'])->name('allproducts');
Route::get('/allproducts/{gender}/{category}/{id}', [ProductController::class, 'show'])->name('productdetail');

Route::post('/addtocart',[CartController::class, 'add']);

Route::get('/search', [ProductController::class, 'search']);

Route::get('/products/list/{page}', [ProductController::class, 'list'])->middleware('cors');
Route::get('/products/list', [ProductController::class, 'listall'])->middleware('cors');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('cors');
Route::put('/products/{product}', [ProductController::class,'update'])->middleware('cors');
Route::post('/products', [ProductController::class,'store'])->middleware('cors');


Route::get('/pictures/list/{id}', [PictureController::class, 'list'])->middleware('cors');
Route::get('/pictures/{id}', [PictureController::class, 'show'])->middleware('cors');
Route::delete('/pictures/{id}', [PictureController::class, 'delete'])->middleware('cors');
Route::post('/upload/{id}',[PictureController::class, 'uploadId'])->middleware('cors');
Route::post('/upload',[PictureController::class, 'upload'])->middleware('cors');
Route::get('/sizes/list', [SizeController::class, 'listall'])->middleware('cors');
Route::get('/colors/list', [ColorController::class, 'listall'])->middleware('cors');
Route::post('/stock/add',[StockController::class, 'add'])->middleware('cors');
Route::get('/stock/list/{page}', [StockController::class, 'list'])->middleware('cors');
Route::get('/stock/{stock}/edit', [StockController::class, 'edit'])->middleware('cors');
Route::put('/stock/{stock}', [StockController::class,'update'])->middleware('cors');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
