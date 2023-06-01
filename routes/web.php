<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

        
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get(('admin'),function(){
    return view('layouts.admin');
});

Route::get('admin/product/create',function(){
    return view('admin.products.create');
});

Route::get('admin/products',function(){
    return view('admin.products.index');
});



Route::get('products',[ProductController::class,'index']);
Route::get('products/create',[ProductController::class,'create']);
Route::get('products/store',[ProductController::class,'store']);
Route::get('products/edit/id',[ProductController::class,'edit']);
Route::get('products/delete/id',[ProductController::class,'destroy']);
Route::get('products/update/id',[ProductController::class,'update']);


Route::get('categories',[CategoryController::class,'index']);
Route::get('categories/create',[CategoryController::class,'create']);
Route::get('categories/store',[CategoryController::class,'store']);
Route::get('categories/edit/id',[CategoryController::class,'edit']);
Route::get('categories/delete/id',[CategoryController::class,'destroy']);
Route::get('categories/update/id',[CategoryController::class,'update']);

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders/{$product_Id}/purchase', [OrderController::class, 'purchase']);
Route::get('/orders/create', [OrderController::class, 'create']);
Route::post('/orders/store', [OrderController::class, 'store']);
Route::get('/orders/edit/{id}', [OrderController::class, 'edit']);
Route::get('/orders/destroy/{id}', [OrderController::class, 'destroy']);
Route::post('/orders/update/{id}', [OrderController::class, 'update']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

