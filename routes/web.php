<?php

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
    return view('products.index');
});

Route::get('products', function (){
        return view('products.detail');
})->name('products.details');


Route::get('products/custom', function (){
    return view('products.custom');
})->name('products.custom');


Route::get('account', function (){
    return view('account');
})->name('account');

Route::get('contact', function (){
    return view('contact');
})->name('contact');

Route::get('cara-pesan', function (){
    return view('cara-pesan');
})->name('cara-pesan');

Route::get('products/payment', function (){
    return view('products.payment');
})->name('products.payment');

//, 'middleware' => 'auth'
Route::group(['prefix' => 'administrator'], function (){
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('product','ProductController');
});



Route::get('/table', function () {
    return view('tables');
});


Route::get('/login', function () {
    return view('admin.login');
});


Route::get('/register', function () {
    return view('admin.register');
});



Route::prefix('manage-category')->group(function () {
    Route::get('/', function () {
        return view('category.index');
    });
    Route::get('/create', function () {
        return view('category.create');
    });
});

Route::prefix('manage-transaction')->group(function () {
    Route::get('/', function () {
        return view('transaction.index');
    });
    Route::get('/create', function () {
        return view('transaction.create');
    });
});



Route::prefix('manage-product')->group(function () {
    Route::get('/', function () {
        return view('');
    });

});

