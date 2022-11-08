<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

// Route::get('/adminregister',function() {
//     return view('admin.register');
// });

// Route::get('/adminlogin',function() {
//     return view('admin.login');
// });


Route::resource('students', StudentController::class);

Route::get('login', [StudentController::class, 'login_auth'])->name('login');

Route::post('postlogin', [StudentController::class, 'login'])->name('postlogin'); 


Route::get('admin', [StudentController::class, 'admin_view']); 

Route::get('signout', [StudentController::class, 'signOut'])->name('signout');

