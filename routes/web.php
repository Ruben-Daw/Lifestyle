<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\contactController;

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

Route::view('/', 'home')->name('home');
Route::view('/contact', 'contact')->name('contact');
Route::view('/shop', 'shop')->name('shop');

Route::get('/users', [userController::class,'index'])->name('users.index');
Route::get('/users/{userId}', [userController::class,'destroy'])->name('users.destroy');

Route::post('contact',[contactController::class,'store'])->name('contact');



Auth::routes();
