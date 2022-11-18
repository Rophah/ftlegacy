<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ftlegacyportalAuthController;

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

Route::get('/login', [ftlegacyportalAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/registration', [ftlegacyportalAuthController::class, 'registration'])->middleware('alreadyLoggedIn');
Route::post('/register-user', [ftlegacyportalAuthController::class, 'registerUser'])->name('register-user');
Route::post('/login-user', [ftlegacyportalAuthController::class, 'loginUser'])->name('login-user'); 
Route::get('/dashboard', [ftlegacyportalAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout', [ftlegacyportalAuthController::class,'logout']);


Route::get('/forgot', [ftlegacyportalAuthController::class, 'showForgotForm'])->name('forgot.password.form');
Route::post('/forgot', [ftlegacyportalAuthController::class, 'sendResetLink'])->name('forgot.password.link');
Route::get('/reset/{token}', [ftlegacyportalAuthController::class,'showResetForm'])->name('reset.password.form');