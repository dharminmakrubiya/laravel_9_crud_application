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




// Route::get('login', [StudentController::class, 'login'])->name('login');

// Route::post('post-login', [StudentController::class, 'postLogin'])->name('login.post'); 

// Route::get('dashboard', [StudentController::class, 'dashboard']); 

// Route::get('logout', [StudentController::class, 'logout'])->name('logout');

Route::resource('students', StudentController::class);



Route::get('login', [StudentController::class, 'login_auth'])->name('login');

Route::post('postlogin', [StudentController::class, 'login'])->name('postlogin'); 


Route::get('dashboard', [StudentController::class, 'index']); 

Route::get('signout', [StudentController::class, 'signOut'])->name('signout');

