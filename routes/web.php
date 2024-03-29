<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

// Route::get('/', function () {
//     return view('welcome');
// });

//Frontend
Route::get('/', [FrontendController::class, 'main']);
Route::get('/product/details/{product_id}', [FrontendController::class, 'product_details']);
Route::get('/product/shop', [FrontendController::class, 'product_shop']);
Route::get('/category/product/{id}', [FrontendController::class, 'category_product']);
Route::get('/checkout', [FrontendController::class, 'checkout']);
Route::get('/customer', [FrontendController::class, 'customer']);

Route::get('/contact', function(){
    return view('contact');
});


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

//Carts
Route::post('/addtocart', [CartController::class, 'addtocart']);
Route::get('/deletefromcart/{id}', [CartController::class, 'deletefromcart']);
Route::get('/cart', [CartController::class, 'cart']);
Route::post('/cart/update', [CartController::class, 'cartupdate']);
Route::post('/order', [CartController::class, 'order']);

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/payment/online', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
