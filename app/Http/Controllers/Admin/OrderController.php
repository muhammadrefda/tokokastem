<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Intervention\Image\Image;
use Image;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class OrderController extends Controller
{


    public function allPendingOrder (){


//        $city = DB::table('users')->get();

//        $city_destination =  $city[0]->cities_id;

//        $alamat_toko = DB::table('alamat_toko')->first();

//        $getCourier = DB::table('users')->select('users.courier_code')
//            ->orderByDesc('created_at')
//            ->limit(1)
//            ->get();

//        $calculateCourier = $getCourier[0]->courier_code;

//        $calculateWeight = DB::table('products')
//            ->select('products.fabric_weight')
//            ->orderByDesc('created_at')
//            ->limit(1)
//            ->get();

//        $getFabricWeight = $calculateWeight[0]->fabric_weight;

//        $cost = RajaOngkir::ongkosKirim([
//            'origin'  => $alamat_toko->id,
//            'destination' => $city_destination,
//            'weight' => $getFabricWeight,
//            'courier' => $calculateCourier,
//        ])->get();

//        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];



        $fabrics = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->where('status','=','pending')
            ->where('category','=','Kain')
            ->get();




        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Masker')
            ->get();

        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Mug')
            ->get();

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Tshirt')
            ->get();

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Totebag')
            ->get();

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Tas')
            ->get();

        $data = [
            'fabrics' => $fabrics,
            'masks' => $masks,
            'mugs' => $mugs,
            'tshirts' => $tshirts,
            'totebags' => $totebags,
            'backpacks' => $backpacks,
//            'ongkir' => $ongkir,
        ];

        return view('admin.order.all_pending',$data);

    }

    public function allSuccessOrder(){
        $fabrics = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->where('status','=','Berhasil')
            ->where('category','=','Kain')
            ->get();

        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_mask', 'products.size',
                'products.material', 'products.note', 'products.status','products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Masker')
            ->get();

        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_mug', 'products.design_back_mug',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Mug')
            ->get();

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_tshirt', 'products.design_back_tshirt',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Tshirt')
            ->get();

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_totebag', 'products.design_back_totebag',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Totebag')
            ->get();

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_backpack', 'products.size',
                'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Tas')
            ->get();


        $data = [
            'fabrics' => $fabrics,
            'masks' => $masks,
            'mugs' => $mugs,
            'tshirts' => $tshirts,
            'totebags' => $totebags,
            'backpacks' => $backpacks,
        ];

        return view('admin.order.all_success',$data);
    }

    public function allOnProgressOrder(){
        $fabrics = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->where('status','=','On Progress')
            ->where('category','=','Kain')
            ->get();

        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_mask', 'products.size',
                'products.material', 'products.note', 'products.status','products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Masker')
            ->get();

        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_mug', 'products.design_back_mug',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Mug')
            ->get();

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_tshirt', 'products.design_back_tshirt',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Tshirt')
            ->get();

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_totebag', 'products.design_back_totebag',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Totebag')
            ->get();

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_backpack', 'products.size',
                'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Tas')
            ->get();


        $data = [
            'fabrics' => $fabrics,
            'masks' => $masks,
            'mugs' => $mugs,
            'tshirts' => $tshirts,
            'totebags' => $totebags,
            'backpacks' => $backpacks,
        ];

        return view('admin.order.all_onprogress',$data);
    }

    /* Start Fabric Section */

//    public function displayFabricSuccessOrder(){
//
//        $orders = DB::table('products')
//            ->join('users','products.user_id','=','users.id')
//            ->select('products.id', 'products.quantity', 'products.link_goggle_drive', 'products.type_fabric',
//                             'products.note', 'products.status',
//                             'products.unique_code', 'users.name', 'users.address', 'users.phone_number',
//                             'products.created_at')
//            ->where('status','=','Berhasil')
//            ->where('category','=','Kain')
//            ->get();
//
//        return view('admin.order.fabric.success')->with(['orders' => $orders,]);
//    }


    public function editFabricStatusOrder ($order)
    {

        return view('admin.order.fabric.edit')->with
        (
            [
                'order' => Product::findOrFail($order),
            ]
        );
    }

    public function updateFabricStatusOrder($order){

        $order = Product::findOrFail($order);

        $order->update(request()->all());

        return redirect()->back();
    }

    /* End Fabric Section */


    /* Start Mask Section */

    public function displayMaskSuccessOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_left_mask', 'products.design_right_mask',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Masker')
            ->get();

        return view('admin.order.mask.success')->with(['orders' => $orders,]);
    }


    public function editMaskStatusOrder ($order)
    {

        return view('admin.order.mask.edit')->with
        (
            [
                'order' => Product::findOrFail($order),
            ]
        );
    }

    public function updateMaskStatusOrder($order){

        $order = Product::findOrFail($order);

        $order->update(request()->all());

        return redirect()->route('order.success.index');
    }

    /* End Mask Section */


    /* Start Mug Section */

    public function displayMugPendingOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_mug', 'products.design_back_mug',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Mug')
            ->get();

        return view('admin.order.mug.pending')->with(['orders' => $orders,]);
    }

    public function displayMugSuccessOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_mug', 'products.design_back_mug',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Mug')
            ->get();

        return view('admin.order.mug.success')->with(['orders' => $orders,]);
    }

    public function editMugStatusOrder ($order)
    {

        return view('admin.order.mug.edit')->with
        (
            [
                'order' => Product::findOrFail($order),
            ]
        );
    }

    public function updateMugStatusOrder($order){

        $order = Product::findOrFail($order);

        $order->update(request()->all());

        return redirect()->route('order.success.index');
    }

    /* End Mug Section */


    /* Start T-Shirt Section */

    public function displayTshirtPendingOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_tshirt', 'products.design_back_tshirt',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Tshirt')
            ->get();

        return view('admin.order.tshirt.pending')->with(['orders' => $orders,]);
    }

    public function displayTshirtSuccessOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_tshirt', 'products.design_back_tshirt',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Tshirt')
            ->get();

        return view('admin.order.tshirt.success')->with(['orders' => $orders,]);
    }

    public function editTshirtStatusOrder ($order)
    {

        return view('admin.order.tshirt.edit')->with
        (
            [
                'order' => Product::findOrFail($order),
            ]
        );
    }

    public function updateTshirtStatusOrder($order){

        $order = Product::findOrFail($order);

        $order->update(request()->all());

        return redirect()->route('order.success.index');
    }
    /* End T-Shirt Section */


    /* Start Tote Bag Section */

    public function displayTotebagPendingOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_totebag', 'products.design_back_totebag',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Totebag')
            ->get();

        return view('admin.order.totebag.pending')->with(['orders' => $orders,]);
    }

    public function displayTotebagSuccessOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_totebag', 'products.design_back_totebag',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Totebag')
            ->get();

        return view('admin.order.totebag.success')->with(['orders' => $orders,]);
    }

    public function editTotebagStatusOrder ($order)
    {

        return view('admin.order.totebag.edit')->with
        (
            [
                'order' => Product::findOrFail($order),
            ]
        );
    }

    public function updateTotebagStatusOrder($order){

        $order = Product::findOrFail($order);

        $order->update(request()->all());

        return redirect()->route('totebag.order.index');
    }
    /* End Tote Bag Section */


    /* Start BagPack Section */

    public function displayBagPendingOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_backpack', 'products.size',
                'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Tas')
            ->get();

        return view('admin.order.bag.pending')->with(['orders' => $orders,]);
    }

    public function displayBagSuccessOrder(){

        $orders = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_backpack',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Tas')
            ->get();

        return view('admin.order.bag.success')->with(['orders' => $orders,]);
    }

    public function editBagStatusOrder ($order)
    {

        return view('admin.order.bag.edit')->with
        (
            [
                'order' => Product::findOrFail($order),
            ]
        );
    }

    public function updateBagStatusOrder($order){

        $order = Product::findOrFail($order);

        $order->update(request()->all());

        return redirect()->route('bag.order.index');
    }
    /* End BagPack Section */



}
