<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


//item
Route::get('/item/{itemId}', [ItemController::class, 'show'])->name('items.show');
Route::put('/item/{itemId}', [ItemController::class, 'update'])->name('item.update');
Route::delete('/item/{timeId}', [ItemController::class, 'destroy'])->name('item.destroy');
Route::get('/itemsDB', [ItemController::class, 'index'])->name('itemsDB');
Route::post('/items/store', [ItemController::class, 'store'])->name('items.store');
///
Route::post('/add-to-cart/{itemId}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.page');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/order/{orderId}', [OrderController::class, 'index1'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');



Route::get('/userData', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('userData');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/userData/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/userToAdmin/{id}', [UserController::class, 'update'])->name('user.update');
Route::get('/adminToUser/{id}', [UserController::class, 'update1'])->name('user.update1');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/test', function () {
    return view('layouts.app');
});
require __DIR__ . '/auth.php';
