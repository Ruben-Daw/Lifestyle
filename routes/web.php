<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\adminController;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\contactController;
use App\Http\Controllers\favoritesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::view('/', 'home')->middleware('auth.user')->name('home');
Route::view('/contact', 'contact')->middleware('auth.user')->name('contact');
// Route::view('/shop', 'shop')->middleware('auth.user')->name('shop');

Route::get('/admin/users', [userController::class,'index'])->middleware('auth.admin')->name('users.index');
Route::get('/admin/users/{userId}', [userController::class,'destroy'])->middleware('auth.admin')->name('users.destroy');

Route::get('/shop',[shopController::class,'index'])->middleware('auth.user')->name('shop.index');
Route::get('/novetats',[shopController::class,'index'])->middleware('auth.user');
Route::get('/home',[shopController::class,'index'])->middleware('auth.user');
Route::get('/dona',[shopController::class,'index'])->middleware('auth.user');
Route::get('/nen',[shopController::class,'index'])->middleware('auth.user');
Route::get('/ofertes',[shopController::class,'index'])->middleware('auth.user');
Route::get('/shop/{id}',[shopController::class,'show'])->middleware('auth.user')->name('shop.show');
Route::get('/cart',[cartController::class,'index'])->middleware(['auth.user','verified'])->name('cart.index');
Route::get('/cart/{user_id}/{product_id}/{size}/{quantity}',[cartController::class,'store'])->middleware(['auth.user', 'verified'])->name('cart.store');
Route::delete('cart/{product_cart_id}', [cartController::class,'destroy'])->middleware(['auth.user','verified'])->name('cart.destroy');
Route::patch('cart/{product_cart_id}', [cartController::class,'update'])->middleware(['auth.user','verified'])->name('cart.update');
Route::get('/favorites', [favoritesController::class,'index'])->middleware(['auth.user','verified'])->name('favorites.index');
Route::get('/favorites/{user_id?}/{product_id?}}',[favoritesController::class,'store'])->middleware(['auth.user', 'verified'])->name('favorites.store');
Route::delete('favorites/{product_id}', [favoritesController::class,'destroy'])->middleware(['auth.user','verified'])->name('favorites.destroy');




Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/forgot-password', function () {
    return view('auth.passwords.email');
})->middleware('guest')->name('password.request');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::get('/admin', [adminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('contact',[contactController::class,'store'])->name('contact');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');


Auth::routes(['verify' => true]);
