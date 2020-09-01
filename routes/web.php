<?php

use Illuminate\Support\Facades\Route;
//require 'admin';

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


/*
 * Authentication for admin
 */
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::get('/register', function () {
        return view('admin.register');
    });
    Route::get('/order','admin\OrderController@index')->name('order.index');

});




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

    Route::get('custom', function (){
        return view('products.custom');
    })->name('products.custom');

    Route::get('payment', 'TransactionController@store')->name('transaction.store');
});

Route::get('fabric', 'FrontStore\FabricController@createFabric')->name('fabric.create');

//Route::get('product/mask/{id?}','ProductDetailController@index')->name('mask.detail');
Route::prefix('product/mask')->group(function () {
    Route::get('/','FrontStore\MaskController@showAllMask')->name('mask.index');
    Route::get('/detail/pesanan','FrontStore\MaskController@createMaskOrder')->name('mask.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\MaskController@storeMaskOrder')->name('mask.store.detail.order');
    Route::get('/design/right','FrontStore\MaskController@showRightMask')->name('mask.design.right');
    Route::get('/design/left','FrontStore\MaskController@showLeftMask')->name('mask.design.left');

});

Route::prefix('product/totebag')->group(function () {
    Route::get('/','FrontStore\TotebagController@showAllTotebag')->name('totebag.index');
    Route::get('/detail/pesanan','FrontStore\TotebagController@createTotebagOrder')->name('totebag.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\TotebagController@storeTotebagOrder')->name('totebag.store.detail.order');
    Route::get('/design/front','FrontStore\TotebagController@showFrontTotebag')->name('totebag.design.front');
    Route::get('/design/back','FrontStore\TotebagController@showBackTotebag')->name('totebag.design.back');

});

Route::prefix('product/tshirt')->group(function () {
    Route::get('/','FrontStore\TshirtController@showAllTshirt')->name('tshirt.index');
    Route::get('/detail/pesanan','FrontStore\TshirtController@createTshirtOrder')->name('tshirt.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\TshirtController@storeTshirtOrder')->name('tshirt.store.detail.order');
    Route::get('/design/front','FrontStore\TshirtController@showFrontTshirt')->name('tshirt.design.front');
    Route::get('/design/back','FrontStore\TshirtController@showBackTshirt')->name('tshirt.design.back');

});

Route::prefix('product/mug')->group(function () {
    Route::get('/','FrontStore\MugController@showAllMug')->name('mug.index');
    Route::get('/detail/{id?}','FrontStore\MugController@showDetailMug')->name('mug.detail');
});

Route::prefix('product/bagpack')->group(function () {
    Route::get('/','FrontStore\BagpackController@showAllBagpack')->name('bagpack.index');
    Route::get('/detail/{id?}','FrontStore\BagpackController@showDetailBagpack')->name('bagpack.detail');
});




    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::resource('admin/products','admin\ProductController');
    Route::resource('admin/orders','admin\OrderController');
Route::resource('admin/promo','admin\PromoController');





Route::get('/table', function () {
    return view('tables');
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







Route::resource('users', 'UsersController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
