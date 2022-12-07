<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::resource('user', UserController::class);

Route::resource('order', OrderController::class);

//Route::get('order/create', [OrderController::class, 'create'])
//    ->name('order.create');
//Route::post('order', [OrderController::class, 'store'])
//    ->name('order.store');
