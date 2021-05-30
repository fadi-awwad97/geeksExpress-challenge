<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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
    return view('auth.login');
});
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('register', [CustomAuthController::class, 'register']);
Route::post('create', [CustomAuthController::class, 'create'])->name('auth.create');
Route::post('check', [CustomAuthController::class, 'check'])->name('auth.check');
Route::post('sumbitNumber', [CustomAuthController::class, 'submitNumber'])->name('auth.submit');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
