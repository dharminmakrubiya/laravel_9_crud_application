<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SendEmailController;
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
    return view('welcome');
});


Route::get('/create',function() {
    return view('create');
});

Route::get('students/login',function() {
    return view('login');
});

Route::get('/admin',function() {
    return view('admin_welcome');
});

Route::resource('students', StudentController::class);


Route::get('login', [StudentController::class, 'login_auth'])->name('login');

Route::post('postlogin', [StudentController::class, 'login'])->name('postlogin'); 

Route::get('signout', [StudentController::class, 'signOut'])->name('signout');

Route::controller(App\Http\Controllers\ProductController::class)->group(function () {

    Route::get('/products','index_products');

    Route::get('/products/create','create_product');

    Route::get('/products/{row}/edit','edit');

    Route::get('products/{row}/show','show_product');

    Route::post('store', [ProductController::class, 'store'])->name('store'); 

    // Route::put('update', [ProductController::class, 'update'])->name('update'); 

    Route::put('products/update/{row}', [ProductController::class, 'update'])->name('update'); 

    Route::delete('products/destroy/{row}', [ProductController::class, 'destroy'])->name('destroy'); 


});

Route::controller(App\Http\Controllers\CategoriesController::class)->group(function () {

    
    //Product Categories Route
    Route::get('/categories','index');

    Route::get('/products/categories','create');

    Route::post('categories_store', [CategoriesController::class, 'categories_store'])->name('categories_store');

    Route::get('/products/categories/{row}/show','show');

    Route::get('/products/categories/{row}/edit','edit');

    Route::put('products/categories/update/{row}', [CategoriesController::class, 'update'])->name('update'); 

    Route::delete('products/categories/destroy/{row}', [CategoriesController::class, 'destroy'])->name('destroy'); 
});



Route::controller(App\Http\Controllers\TagsController::class)->group(function () {

    Route::get('/tags','index');

    Route::get('/products/tags','create');

    Route::post('tagstore', [TagsController::class, 'tagstore'])->name('tagstore');

    Route::get('/products/tags/{row}/show','show');

    Route::get('/products/tags/{row}/edit','edit');

    Route::put('products/tags/update/{row}', [TagsController::class, 'update'])->name('update'); 

    Route::delete('products/tags/destroy/{row}', [TagsController::class, 'destroy'])->name('destroy'); 
});

