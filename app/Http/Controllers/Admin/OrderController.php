<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use RealRashid\SweetAlert\Facades\Alert;


class OrderController extends Controller
{


    public function allPendingOrder (){

        $fabrics = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->where('status','=','pending')
            ->where('category','=','Kain')
            ->simplePaginate(5);


        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Masker')
            ->simplePaginate(5);


        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Mug')
            ->simplePaginate(5);

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Tshirt')
            ->simplePaginate(5);

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Totebag')
            ->simplePaginate(5);

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','pending')
            ->where('category','=','Tas')
            ->simplePaginate(5);

        $data = [
            'fabrics' => $fabrics,
            'masks' => $masks,
            'mugs' => $mugs,
            'tshirts' => $tshirts,
            'totebags' => $totebags,
            'backpacks' => $backpacks,
        ];

        return view('admin.order.all_pending',$data);

    }

    public function allSuccessOrder(){
        $fabrics = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->where('status','=','Berhasil')
            ->where('category','=','Kain')
            ->simplePaginate(5);


        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','Berhasil')
            ->where('category','=','Masker')
            ->simplePaginate(5);

        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','Berhasil')
            ->where('category','=','Mug')
            ->simplePaginate(5);

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','Berhasil')
            ->where('category','=','Tshirt')
            ->simplePaginate(5);

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','Berhasil')
            ->where('category','=','Totebag')
            ->simplePaginate(5);

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','Berhasil')
            ->where('category','=','Tas')
            ->simplePaginate(5);

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
            ->simplePaginate(5);

        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','On Progress')
            ->where('category','=','Masker')
            ->simplePaginate(5);

        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','On Progress')
            ->where('category','=','Mug')
            ->simplePaginate(5);

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','On Progress')
            ->where('category','=','Tshirt')
            ->simplePaginate(5);

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','On Progress')
            ->where('category','=','Totebag')
            ->simplePaginate(5);

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*', 'users.*')
            ->where('status','=','On Progress')
            ->where('category','=','Tas')
            ->simplePaginate(5);


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

    public function editFabricStatusOrder ($order)
    {

        $fabric = Product::findOrFail($order);

        return view('admin.order.fabric.edit',['fabric' => $fabric,]);
    }

    public function updateFabricStatusOrder(Request $request, $order)
    {

//                $updateFabric = Product::findOrFail($order);
//
//        $updateFabric->update(
//            $request->all()
//        );

        $kain = Product::findOrFail($order);

        $kain->status= $request->get('status');

        $kain->save();

//        $kain->update(['status' => $request->status,]);


//        $updateFabric = Product::findOrFail($order);

//        $updateFabric->status = $request->get('status');

//        $updateFabric->save();


//        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->route('fabric.order.edit', ['order' => $order])->with('Sukses','Status Berhasil di update!');
    }

    /* End Fabric Section */


    /* Start Mask Section */

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

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->route('order.success.index');
    }

    /* End Mask Section */


    /* Start Mug Section */

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

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->route('order.success.index');
    }

    /* End Mug Section */


    /* Start T-Shirt Section */

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

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->route('order.success.index');
    }
    /* End T-Shirt Section */


    /* Start Tote Bag Section */

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

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->back();
    }
    /* End Tote Bag Section */


    /* Start BagPack Section */

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

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->route('bag.order.index');
    }
    /* End BagPack Section */

}
