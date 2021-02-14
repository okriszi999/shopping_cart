<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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
})->name('welcome');

Route::get('/items',
    [ItemController::class, 'index']
)->name('items');

Route::post('/items/store',
    [ItemController::class, 'session_store']
)->name('items.session_store');

Route::get('/cart', function (){
    return view('cart');
})->name('cart');

Route::get('/buy',
[ItemController::class, 'buy']
)->name('buy');
