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
            ->select('products.id', 'products.quantity', 'products.link_goggle_drive', 'products.size',
                'products.material', 'products.note', 'products.type_fabric','products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Kain')
            ->simplePaginate(5);


        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_mask', 'products.size',
                'products.material', 'products.note', 'products.status','products.unique_code', 'users.name',
                'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Masker')
            ->simplePaginate(5);


        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_mug', 'products.design_back_mug',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Mug')
            ->simplePaginate(5);

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_tshirt', 'products.design_back_tshirt',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Tshirt')
            ->simplePaginate(5);

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_totebag', 'products.design_back_totebag',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','pending')
            ->where('category','=','Totebag')
            ->simplePaginate(5);

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_backpack', 'products.size',
                'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
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
            ->select('products.id', 'products.quantity', 'products.link_goggle_drive', 'products.size',
                'products.material', 'products.note', 'products.type_fabric','products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Kain')
            ->simplePaginate(5);


        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_mask', 'products.size',
                'products.material', 'products.note', 'products.status','products.unique_code', 'users.name',
                'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Masker')
            ->simplePaginate(5);

        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_mug', 'products.design_back_mug',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Mug')
            ->simplePaginate(5);

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_tshirt', 'products.design_back_tshirt',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Tshirt')
            ->simplePaginate(5);

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_totebag', 'products.design_back_totebag',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','Berhasil')
            ->where('category','=','Totebag')
            ->simplePaginate(5);

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_backpack', 'products.size',
                'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
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
            ->select('products.id', 'products.quantity', 'products.link_goggle_drive', 'products.size',
                'products.material', 'products.note', 'products.type_fabric','products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Kain')
            ->simplePaginate(5);

        $masks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_mask', 'products.size',
                'products.material', 'products.note', 'products.status','products.unique_code', 'users.name',
                'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Masker')
            ->simplePaginate(5);

        $mugs = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_mug', 'products.design_back_mug',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Mug')
            ->simplePaginate(5);

        $tshirts = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_tshirt', 'products.design_back_tshirt',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Tshirt')
            ->simplePaginate(5);

        $totebags = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_front_totebag', 'products.design_back_totebag',
                'products.size', 'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
            ->where('status','=','On Progress')
            ->where('category','=','Totebag')
            ->simplePaginate(5);

        $backpacks = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity', 'products.design_backpack', 'products.size',
                'products.material', 'products.note', 'products.status', 'products.unique_code',
                'users.name', 'users.address', 'users.phone_number', 'products.created_at')
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

    public function editFabricStatusOrder (Product $product)
    {
        return view('admin.order.fabric.edit', compact('product'));
    }

    public function updateFabricStatusOrder(Request $request, Product $product)
    {
        $request->validate(['status' => 'required']);

        $product->update($request->all());

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->back();

    }

    /* End Fabric Section */


    /* Start Mask Section */

    public function editMaskStatusOrder (Product $product)
    {
        return view('admin.order.mask.edit', compact('product'));
    }

    public function updateMaskStatusOrder(Request $request, Product $product){

        $request->validate(['status' => 'required']);

        $product->update($request->all());

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->back();

    }

    /* End Mask Section */


    /* Start Mug Section */

    public function editMugStatusOrder (Product $product)
    {

        return view('admin.order.mug.edit', compact('product'));
    }

    public function updateMugStatusOrder(Request $request, Product $product){

        $request->validate(['status' => 'required']);

        $product->update($request->all());

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->back();
    }

    /* End Mug Section */


    /* Start T-Shirt Section */

    public function editTshirtStatusOrder (Product $product)
    {

        return view('admin.order.tshirt.edit', compact('product'));
    }

    public function updateTshirtStatusOrder(Request $request, Product $product){

        $request->validate(['status' => 'required']);

        $product->update($request->all());

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->back();
    }
    /* End T-Shirt Section */


    /* Start Tote Bag Section */

    public function editTotebagStatusOrder (Product $product)
    {

        return view('admin.order.totebag.edit', compact('product'));
    }

    public function updateTotebagStatusOrder(Request $request, Product $product){

        $request->validate(['status' => 'required']);

        $product->update($request->all());

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->back();
    }
    /* End Tote Bag Section */


    /* Start BagPack Section */

    public function editBagStatusOrder (Product $product)
    {

        return view('admin.order.bag.edit', compact('product'));
    }

    public function updateBagStatusOrder(Request $request, Product $product){

        $request->validate(['status' => 'required']);

        $product->update($request->all());

        Alert::success('Sukses','Status Berhasil di update');

        return redirect()->back();
    }
    /* End BagPack Section */

}
