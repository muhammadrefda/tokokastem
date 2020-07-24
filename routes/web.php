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




Route::get('account', function (){
    return view('account');
})->name('account');

Route::get('contact', function (){
    return view('contact');
})->name('contact');

Route::get('cara-pesan', function (){
    return view('cara-pesan');
})->name('cara-pesan');




Route::get('/', function () {
    return view('products.index');
});
Route::prefix('products')->group(function (){



    Route::get('detail', function (){
        return view('products.detail');
    })->name('products.details');

    Route::get('custom', function (){
        return view('products.custom');
    })->name('products.custom');

    Route::get('payment', function (){
        return view('products.payment');
    })->name('products.payment');

    Route::get('bag', function (){
        return view('products.bag.index');
    })->name('products.bag.index');


    Route::resource('mask','ProductController');




    Route::get('mug', function (){
        return view('products.mug.index');
    })->name('products.mug.index');

    Route::get('totebag', function (){
        return view('products.totebag.index');
    })->name('products.totebag.index');


    Route::get('tshirt', function (){
        return view('products.tshirt.index');
    })->name('products.tshirt.index');

});

Route::get('product/mask/{id?}','ProductDetailController@index')->name('mask.detail');





    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('admin/products','admin\ProductController');
    Route::resource('admin/orders','admin\OrderController');
Route::resource('admin/promo','admin\PromoController');





Route::get('/table', function () {
    return view('tables');
});


Route::get('/login', function () {
    return view('admin.login');
});


Route::get('/register', function () {
    return view('admin.register');
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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
