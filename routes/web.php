<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\DashboardController::class, 'dashboard']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Admin/Category/{id}', [App\Http\Controllers\HomeController::class, 'categoryOne']);
Route::get('/search',[App\Http\Controllers\DashboardController::class, 'search']);
Route::get('/show/allCart',[App\Http\Controllers\DashboardController::class, 'allCart']);
Route::post('/add-to-cart',[App\Http\Controllers\DashboardController::class, 'addProductCart']);

//Category
Route::get('/Category', [App\Http\Controllers\CategoryController::class, 'allCategory'])->name('intel');
Route::get('/Category/{id}', [CategoryController::class, 'oneCategory']);
//end Category

Route::get('/Product/{id}', [CategoryController::class, 'singleProduct']);

Route::post('/add-category', [CategoryController::class, 'storeCategory'])->name('add.category');
Route::post('/edit-category', [CategoryController::class, 'editCategory'])->name('edit.category');
Route::delete('/delete-category', [CategoryController::class, 'deleteCategory'])->name('delete.category');

Route::post('/products/store', [CategoryController::class, 'storeProduct'])->name('products.store');
Route::post('/products/edit', [CategoryController::class, 'editProduct'])->name('products.edit');
Route::delete('/delete-product', [CategoryController::class, 'deleteProduct']);
//End Category

