<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductGalleriesController;
use App\Http\Controllers\TransactionController;
use App\Models\Product;
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


Route::get('/', [App\Http\Controllers\LandingPageController::class, 'index'])->name('landingpage');
Route::get('/detail/{id}', [App\Http\Controllers\LandingPageController::class, 'detail'])->name('detail');
Route::post('/detail/{id}', [App\Http\Controllers\LandingPageController::class, 'add'])->name('detail-add')->middleware('auth');

Route::get('/categories', [App\Http\Controllers\LandingPageController::class, 'categories'])->name('categories');
Route::get('/help-center', [App\Http\Controllers\LandingPageController::class, 'faq'])->name('help-center');

Route::get('/categories-igasapi', [App\Http\Controllers\CategoriesController::class, 'ctigasapi'])->name('ctigasapi');
Route::get('/categories-has', [App\Http\Controllers\CategoriesController::class, 'cthas'])->name('cthas');
Route::get('/categories-ayam', [App\Http\Controllers\CategoriesController::class, 'ctayam'])->name('ctayam');

Route::post('/addreview/{id}',[App\Http\Controllers\LandingPageController::class, 'addreview'])->name('addreview');
Route::get('/order-history',[App\Http\Controllers\LandingPageController::class, 'orderhistory'])->name('orderhistory');
// Route::post('/show-order/{id}',[App\Http\Controllers\LandingPageController::class, 'ordershow'])->name('ordershow');
Route::get('/show-order/{id}',[App\Http\Controllers\LandingPageController::class, 'ordershow'])->name('ordershow');

Route::post('/checkout/callback',[App\Http\Controllers\CheckoutController::class, 'callback'])->name('midtrans-callback');
Route::get('/about-me',[App\Http\Controllers\LandingPageController::class, 'aboutme'])->name('aboutme');
Route::get('sign-in-google',[LoginController::class,'google'])->name('user.login.google');
Route::get('auth/google/callback',[LoginController::class,'handleCallback'])->name('google-callback');

Route::post('/ongkir', [CartController::class,'check_ongkir']);
Route::get('/cities/{province_id}', [CartController::class,'getCities']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('product', ProductController::class);
        Route::resource('transaction', TransactionController::class);
        Route::resource('product-galleries', ProductGalleriesController::class);
        Route::resource('category', CategoryController::class);
    });

Route::resource('cart', CartController::class);
Route::get('/edit/profile/{id}',[LandingPageController::class,'editProfile'])->name('editProfile');
Route::put('/update/profile/{id}',[LandingPageController::class,'updateProfile'])->name('updateProfile');

Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'process'])->name('checkout');
Route::post('/checkout/callback', [App\Http\Controllers\CheckoutController::class, 'callback'])->name('midtrans-callback');
Route::post('/order', [App\Http\Controllers\CheckoutController::class, 'order'])->name('order');

Route::post('/checkoutdata', [App\Http\Controllers\CheckoutController::class, 'checkoutdata'])->name('checkoutdata');

Route::get('successfully',[LandingPageController::class,'success'])->name('success');


