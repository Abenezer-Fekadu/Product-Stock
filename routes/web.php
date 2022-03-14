<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FeedbackController;
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


// Auth Routes
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Product Routes
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/products', [ProductController::class, 'store'])->name('product.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::get('products/switch-status/{id}', [ProductController::class, 'change'])->name('product.status');
Route::put('products/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('product.destroy');



Route::post('/feedback', [FeedbackController::class, 'email'])->name('feedback');
