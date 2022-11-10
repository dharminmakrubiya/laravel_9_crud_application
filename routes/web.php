<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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






