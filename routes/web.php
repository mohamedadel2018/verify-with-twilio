<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\loginController;
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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', ], function () {
Route::resource('users', 'App\Http\Controllers\Admin\usersController');
});


Route::group(['prefix' => 'admin', ], function () {
    Route::post('/', [loginController::class, 'login'])->name('admin.login');
    Route::get('/dashboard',[loginController::class, 'dashboard'])->middleware('auth:admin')->name('dashboard');
    Route::get('/loginadmin',function (){ return view('admin.adminlogin');})->name('admin.adminlogin');
});

