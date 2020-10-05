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






/*Start Front Store Area*/
Auth::routes();


Route::get('/', function () {
    return view('products.index');
});

Route::get('kontak-kami', function (){
    return view('contact');
})->name('contact');

Route::get('cara-pesan', function (){
    return view('cara-pesan');
})->name('cara-pesan');

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/api/province/{id}/cities', 'FrontStore\ProductController@getCities');
Route::post('/api/cities', 'FrontStore\ProductController@searchCities');
Route::post('/store-detail-pengiriman','FrontStore\ProductController@storeDetailPengiriman')->name('store.detail.pengiriman');



Route::prefix('product/fabric')->group(function () {
    Route::get('/detail/pesanan','FrontStore\ProductController@createFabricOrder')->name('fabric.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\ProductController@storeProductOrder')->name('fabric.store.detail.order')->middleware('auth');
    Route::get('detail-pengiriman','FrontStore\ProductController@showDetailPengiriman')->name('fabric.show.detail.pengiriman');
    Route::get('shipping-detail/','FrontStore\ProductController@showShippingDetail')->name('fabric.show.shipping.detail')->middleware('auth');
});

Route::prefix('product/mask')->group(function () {
    Route::get('/detail/pesanan','FrontStore\ProductController@createMaskOrder')->name('mask.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\ProductController@storeMaskOrder')->name('mask.store.detail.order')->middleware('auth');
    Route::get('shipping-detail/','FrontStore\ProductController@showShippingMaskDetail')->name('mask.show.shipping.detail')->middleware('auth');
    Route::get('/design/right','FrontStore\ProductController@showRightMask')->name('mask.design.right');
    Route::get('/design/left','FrontStore\ProductController@showLeftMask')->name('mask.design.left');
});

Route::prefix('product/totebag')->group(function () {
    Route::get('/detail/pesanan','FrontStore\ProductController@createTotebagOrder')->name('totebag.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\ProductController@storeTotebagOrder')->name('totebag.store.detail.order')->middleware('auth');
    Route::get('shipping-detail/','FrontStore\ProductController@showShippingTotebagDetail')->name('totebag.show.shipping.detail')->middleware('auth');;
    Route::get('/design/front','FrontStore\ProductController@showFrontTotebag')->name('totebag.design.front');
    Route::get('/design/back','FrontStore\ProductController@showBackTotebag')->name('totebag.design.back');
});

Route::prefix('product/tshirt')->group(function () {
    Route::get('/detail/pesanan','FrontStore\ProductController@createTshirtOrder')->name('tshirt.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\ProductController@storeTshirtOrder')->name('tshirt.store.detail.order')->middleware('auth');
    Route::get('shipping-detail/','FrontStore\ProductController@showShippingTshirtDetail')->name('tshirt.show.shipping.detail')->middleware('auth');;
    Route::get('/design/front','FrontStore\ProductController@showFrontTshirt')->name('tshirt.design.front');
    Route::get('/design/back','FrontStore\ProductController@showBackTshirt')->name('tshirt.design.back');
});

Route::prefix('product/mug')->group(function () {
    Route::get('/detail/pesanan','FrontStore\ProductController@createMugOrder')->name('mug.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\ProductController@storeMugOrder')->name('mug.store.detail.order');
    Route::get('shipping-detail/','FrontStore\ProductController@showShippingMugDetail')->name('mug.show.shipping.detail')->middleware('auth');;
    Route::get('/design/front','FrontStore\ProductController@showFrontMug')->name('mug.design.front');
    Route::get('/design/back','FrontStore\ProductController@showBackMug')->name('mug.design.back');
});

Route::prefix('product/bagpack')->group(function () {
    Route::get('/detail/pesanan','FrontStore\ProductController@createBagpackOrder')->name('bagpack.create.detail.order');
    Route::post('/detail/pesanan/create','FrontStore\ProductController@storeBagpackOrder')->name('bagpack.store.detail.order')->middleware('auth');
    Route::get('shipping-detail/','FrontStore\ProductController@showShippingBagpackDetail')->name('bagpack.show.shipping.detail')->middleware('auth');;
    Route::get('/design','FrontStore\ProductController@showBagpackDesain')->name('bagpack.design');
});

/*End Front Store Area*/


/*Start Admin Panel Area*/

Route::get('admin/home', 'HomeController@handleAdmin')->name('admin.route')->middleware('admin');

Route::get('/alamat-toko/show','Admin\AlamatController@displayStoreAddress')->name('admin.alamat.index');

Route::get('/alamat-toko','Admin\AlamatController@aturalamat')->name('admin.aturalamat');
//Route::get('/pengaturan/ubahalamat/{id}','admin\PengaturanController@ubahalamat')->name('admin.ubahalamat');
Route::get('/alamat-toko/getcity/{id}','Admin\AlamatController@getCity')->name('admin.getCity');
Route::post('alamat-toko/simpan','Admin\AlamatController@simpanalamat')->name('admin.simpanalamat');

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->middleware('admin');
});

Route::prefix('fabric-order')->group(function () {
    Route::get('/','Admin\OrderController@displayFabricPendingOrder')->name('fabric.order.index');
    Route::get('/success/','Admin\OrderController@displayFabricSuccessOrder')->name('fabric.order.index.success');
    Route::get('{order}/edit','Admin\OrderController@editFabricStatusOrder')->name('fabric.order.edit');
    Route::put('{order}','Admin\OrderController@updateFabricStatusOrder')->name('fabric.order.update');
});

Route::prefix('mask-order')->group(function () {
    Route::get('/','Admin\OrderController@displayMaskPendingOrder')->name('mask.order.index');
    Route::get('/success/','Admin\OrderController@displayMaskSuccessOrder')->name('mask.order.index.success');
    Route::get('{order}/edit','Admin\OrderController@editMaskStatusOrder')->name('mask.order.edit');
    Route::put('{order}','Admin\OrderController@updateMaskStatusOrder')->name('mask.order.update');
});

Route::prefix('mug-order')->group(function () {
    Route::get('/','Admin\OrderController@displayMugPendingOrder')->name('mug.order.index');
    Route::get('/success/','Admin\OrderController@displayMugSuccessOrder')->name('mug.order.index.success');
    Route::get('{order}/edit','Admin\OrderController@editMugStatusOrder')->name('mug.order.edit');
    Route::put('{order}','Admin\OrderController@updateMugStatusOrder')->name('mug.order.update');
});

Route::prefix('tshirt-order')->group(function () {
    Route::get('/','Admin\OrderController@displayTshirtPendingOrder')->name('tshirt.order.index');
    Route::get('/success/','Admin\OrderController@displayTshirtSuccessOrder')->name('tshirt.order.index.success');
    Route::get('{order}/edit','Admin\OrderController@editTshirtStatusOrder')->name('tshirt.order.edit');
    Route::put('{order}','Admin\OrderController@updateTshirtStatusOrder')->name('tshirt.order.update');
});

Route::prefix('totebag-order')->group(function () {
    Route::get('/','Admin\OrderController@displayTotebagPendingOrder')->name('totebag.order.index');
    Route::get('/success/','Admin\OrderController@displayTotebagSuccessOrder')->name('totebag.order.index.success');
    Route::get('{order}/edit','Admin\OrderController@editTotebagStatusOrder')->name('totebag.order.edit');
    Route::put('{order}','Admin\OrderController@updateTotebagStatusOrder')->name('totebag.order.update');
});

Route::prefix('bag-order')->group(function () {
    Route::get('/','Admin\OrderController@displayBagPendingOrder')->name('bag.order.index');
    Route::get('/success/','Admin\OrderController@displayBagSuccessOrder')->name('bag.order.index.success');
    Route::get('{order}/edit','Admin\OrderController@editBagStatusOrder')->name('bag.order.edit');
    Route::put('{order}','Admin\OrderController@updateBagStatusOrder')->name('bag.order.update');
});

/*End Admin Panel Area*/
