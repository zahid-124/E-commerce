<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function(){
    return view('contact');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', [MyController::class, 'about']);

//Category
Route::get('/addcategory', [CategoryController::class, 'index']);
Route::post('/category/insert', [CategoryController::class, 'insert']);
Route::get('/category/delete/{category_id}', [CategoryController::class, 'delete']);
Route::get('/category/undo/{category_id}', [CategoryController::class, 'undo']);
Route::get('/category/forcedelete/{category_id}', [CategoryController::class, 'forcedelete']);

//SubCategory
Route::get('/subcategory', [SubcategoryController::class, 'index']);
Route::post('/subcategory/insert', [SubcategoryController::class, 'insert']);
Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'delete']);
Route::get('/subcategory/undo/{id}', [SubcategoryController::class, 'undo']);
Route::get('/subcategory/forcedelete/{id}', [SubcategoryController::class, 'forcedelete']);
Route::post('/subcategory/markdelete', [SubcategoryController::class, 'markdelete']);
Route::post('/subcategory/forcemarkdelete', [SubcategoryController::class, 'forcemarkdelete']);

//Profile
Route::get('profile',[ProfileController::class, 'view']);
Route::post('profile/edit',[ProfileController::class, 'edit']);

//Products
Route::get('/products',[ProductController::class, 'index']);
Route::post('/product/insert',[ProductController::class, 'insert']);
