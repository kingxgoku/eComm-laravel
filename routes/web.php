<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/');
});


Route::view('/login','login');
Route::post('/login',[UserController::class,'login']);
Route::get('/',[ProductController::class, 'index']);
Route::get('details/{id}',[ProductController::class, 'details']);
Route::get('search',[ProductController::class, 'search']);
Route::post('add-to-cart',[ProductController::class,'addToCart']);
