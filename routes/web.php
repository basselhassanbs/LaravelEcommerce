<?php

use App\Http\Controllers\ProductController;
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

Route::get('/about', function () {
    return view('about');
});

Auth::routes();


Route::get('/', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->middleware('auth');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit']);
Route::put('/products/{product}', [App\Http\Controllers\ProductController::class, 'update']);
Route::delete('/products/{product}', [App\Http\Controllers\ProductController::class, 'destroy']);

Route::get('/myproducts', [App\Http\Controllers\HomeController::class, 'index']);