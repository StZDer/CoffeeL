<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsAddController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PickupsController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/category/all', [HomeController::class, 'all'])->name('all');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/category/{cat}', [HomeController::class, 'showCategory'])->name('showCategory');
Route::get('/products/{id}/instock', [HomeController::class, 'instock'])->middleware('auth')->name('products-instock');

Route::get('/products/add', [ProductsAddController::class, 'index'])->middleware('auth')->name('products');
Route::get('/products/{id}', [ProductsAddController::class, 'edit'])->middleware('auth')->name('products-edit');
Route::get('/products/{id}/delete', [ProductsAddController::class, 'delete'])->middleware('auth')->name('products-delete');
Route::get('/products/{id}/more', [ProductsAddController::class, 'more'])->name('products-more');

Route::get('/users', [UsersController::class, 'index'])->middleware('auth')->name('users');
Route::get('/users/bartenders', [UsersController::class, 'bartenders'])->middleware('auth')->name('users-bartenders');
Route::get('/users/clients', [UsersController::class, 'clients'])->middleware('auth')->name('users-clients');
Route::get('/users/{id}', [UsersController::class, 'edit'])->middleware('auth')->name('user-edit');

Route::get('/cart', [CartsController::class, 'index'])->name('cart');
Route::get('/cart/delete-one-to-cart', [CartsController::class, 'deleteOneToCart'])->name('deleteOneToCart');
Route::get('/cart/delete-to-cart', [CartsController::class, 'deleteToCart'])->name('deleteToCart');
Route::get('/cart/clear', [CartsController::class, 'clearCart'])->name('clearCart');
Route::get('/cart/add-one-to-cart', [CartsController::class, 'addOneToCart'])->name('addOneToCart');

Route::post('/cart/add-to-cart', [CartsController::class, 'addToCart'])->name('addToCart');

Auth::routes();

Route::post('/products/add', [ProductsAddController::class, 'submit'])->middleware('auth')->name('products-add');
Route::post('/products/{id}', [ProductsAddController::class, 'update'])->middleware('auth')->name('products-edit');

Route::get('/cart/delivery', [DeliveryController::class, 'cartDelivery'])->middleware('auth')->name('cartDelivery');
Route::post('/cart/delivery/addDelivery', [DeliveryController::class, 'addDelivery'])->middleware('auth')->name('addDelivery');
Route::post('/cart/delivery/addPickups', [DeliveryController::class, 'addPickups'])->middleware('auth')->name('addPickups');

Route::get('/orders/all', [OrdersController::class, 'index'])->middleware('auth')->middleware('admin')->name('orders');
Route::get('/orders/work', [OrdersController::class, 'work'])->middleware('auth')->middleware('admin')->name('ordersWork');
Route::get('/orders/done', [OrdersController::class, 'done'])->middleware('auth')->middleware('admin')->name('ordersDone');
Route::get('/orders/{id}/more', [OrdersController::class, 'more'])->middleware('auth')->middleware('admin')->name('ordersMore');
Route::get('/orders/{id}/addDone', [OrdersController::class, 'addDone'])->middleware('auth')->middleware('admin')->name('ordersAddDone');
Route::get('/orders/{id}/addWork', [OrdersController::class, 'addWork'])->middleware('auth')->middleware('admin')->name('ordersAddWork');

Route::get('/pickup/all', [PickupsController::class, 'index'])->middleware('auth')->middleware('admin')->name('pickups');
Route::get('/pickup/work', [PickupsController::class, 'work'])->middleware('auth')->middleware('admin')->name('pickupsWork');
Route::get('/pickup/done', [PickupsController::class, 'done'])->middleware('auth')->middleware('admin')->name('pickupsDone');
Route::get('/pickup/{id}/more', [PickupsController::class, 'more'])->middleware('auth')->middleware('admin')->name('pickupsMore');
Route::get('/pickup/{id}/addDone', [PickupsController::class, 'addDone'])->middleware('auth')->middleware('admin')->name('pickupsAddDone');
Route::get('/pickup/{id}/addWork', [PickupsController::class, 'addWork'])->middleware('auth')->middleware('admin')->name('pickupsAddWork');

Route::post('/users/{id}', [UsersController::class, 'update'])->middleware('auth')->middleware('admin')->name('user-edit');
