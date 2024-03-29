<?php

namespace App\Http\Controllers\FrontStore;

use App\City;
use App\Courier;
use App\Http\Controllers\Controller;
use App\Product;
use App\Province;
use App\ShippingAddress;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class ProductController extends Controller
{
    /*Start of Raja Ongkir Function*/

    public function getProvince(){
        return Province::pluck('title');
    }

    public function getCity($id){
        $city = City::where('province_id',$id)->get();

        return response()->json($city);
    }

    public function getCourier(){
        return Courier::all();
    }

    /*End Of Raja Ongkir Function*/


    /*Start of Fabric section*/

    public function createFabricOrder(){
        return view('products.fabric.detail_order');
    }

    public function storeProductOrder(Request  $request){

        Validator::make($request->all(),[
            "quantity" => "required|digits_between:1,6",
            "link_goggle_drive" => "required"
        ])->validate();

        $new_product = new Product();

        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');
        $new_product->link_goggle_drive = $request->get('link_goggle_drive');
        $new_product->type_fabric = $request->get('type_fabric');
        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');
        $new_product->price_fabric = 10000;
        /*weight in grams*/
        $new_product->fabric_weight = 1000;

        $new_product->total = $new_product->getTotalAttributes();

        $new_product->save();

        Alert::success('SUKSES','Pesanan Berhasil dibuat');

        return redirect()->route('fabric.show.detail.pengiriman',['order' => $new_product->id]);
    }

    public function showDetailPengiriman(){

        $id_user = \Auth::user()->id;

        $data['courier'] = Courier::all();
        $data['province'] = Province::all();
        $cekAlamat = DB::table('shipping_address')
            ->where('user_id',$id_user)
            ->count();

        if( $cekAlamat > 0 ) {
            $data['alamat'] = DB::table('shipping_address')
                ->join('cities', 'cities.city_id', '=', 'shipping_address.cities_id')
                ->join('provinces', 'provinces.province_id', '=', 'cities.province_id')
                ->select('provinces.title as prov', 'cities.title as kota', 'shipping_address.*')
                ->where('shipping_address.user_id', $id_user)
                ->get();
        }
        return view('products.fabric.detail_pengiriman',$data)->with('success','Pesanan Berhasil dibuat');
    }

    public function InvoiceFabric(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->orderByDesc('products.created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.fabric_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getFabricWeight = $calculateWeight[0]->fabric_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getFabricWeight,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order,
            'getCourier' => $getCourier
        ];

//        $pdf = PDF::loadview('products.fabric.invoice',compact('detail_order','ongkir', 'getCourier'));
        $pdf = PDF::loadview('products.fabric.invoice',$data);

        return $pdf->stream('invoice-kain.pdf');
    }

    public function storeDetailPengiriman(Request $request){

         ShippingAddress::create([
             'cities_id'        => $request->cities_id,
             'user_id'          => \Auth::user()->id,
             'courier_code'     => $request->courier_code
         ]);

        Alert::success('SUKSES','Alamat Pengiriman Berhasil dibuat!');

        return redirect()->route('fabric.show.shipping.detail');
    }

    public function showShippingDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_fabric','products.total','products.fabric_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.fabric_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getFabricWeight = $calculateWeight[0]->fabric_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getFabricWeight,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order
        ];

        return view('products.fabric.payment',$data);
    }

    /*End of Fabric section*/


    /*Start of Mask section*/

    public function showMaskDesign(){
        return view('products.mask.design');
    }

    public function createMaskOrder(){

        Alert::success('SUKSES','Desain Berhasil dibuat!');

        return view('products.mask.detail_order');
    }

    public function storeMaskOrder(Request  $request){

        Validator::make($request->all(),[
            "quantity" => "required|digits_between:1,6",
            "design_mask" => "required"
        ])->validate();

        $new_product = new Product();

        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');

        $design_mask = $request->file('design_mask');

        if($design_mask){
            $design_mask_path = $design_mask->store('design_mask', 'public');
            $new_product->design_mask = $design_mask_path;
        }

        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');
        $new_product->price_mask = 15000;
        /*weight in grams*/
        $new_product->mask_weight = 1000;

        $new_product->total = $new_product->getMaskTotalAttributes();

        $new_product->save();

        Alert::success('SUKSES','Pesanan Berhasil dibuat!');

        return redirect()->route('mask.show.detail.pengiriman');
    }


    public function showMaskDetailPengiriman(){

        $id_user = \Auth::user()->id;

        $data['courier'] = Courier::all();
        $data['province'] = Province::all();
        $cekAlamat = DB::table('shipping_address')
            ->where('user_id',$id_user)
            ->count();

        if( $cekAlamat > 0 ) {
            $data['alamat'] = DB::table('shipping_address')
                ->join('cities', 'cities.city_id', '=', 'shipping_address.cities_id')
                ->join('provinces', 'provinces.province_id', '=', 'cities.province_id')
                ->select('provinces.title as prov', 'cities.title as kota', 'shipping_address.*')
                ->where('shipping_address.user_id', $id_user)
                ->get();
        }

        return view('products.mask.detail_pengiriman',$data);
    }

    public function storeMaskDetailPengiriman(Request $request){

        ShippingAddress::create([
            'cities_id'        => $request->cities_id,
            'user_id'          => \Auth::user()->id,
            'courier_code'     => $request->courier_code
        ]);

        Alert::success('SUKSES','Pesanan Berhasil dibuat!');

        return redirect()->route('mask.show.shipping.detail');
    }

    public function showShippingMaskDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_mask','products.total','products.mask_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.mask_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getMaskWeight = $calculateWeight[0]->mask_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'      => $alamat_toko->id,
            'destination' => $city_destination,
            'weight'      => $getMaskWeight,
            'courier'     => $calculateCourier
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order
        ];

        return view('products.mask.payment', $data);
    }

    public function InvoiceMask(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->orderByDesc('products.created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.mask_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getMaskWeight = $calculateWeight[0]->mask_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getMaskWeight,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order,
            'getCourier' => $getCourier
        ];

        $pdf = PDF::loadview('products.mask.invoice',$data);

        return $pdf->stream('invoice-masker.pdf');
    }

    /*End of Mask section*/


    /*Start of Tote Bag section*/
    public function createTotebagOrder(){

        return view('products.totebag.detail_order');
    }

    public function storeTotebagOrder(Request  $request){

        Validator::make($request->all(),[
            "quantity" => "required|digits_between:1,6",
            "design_front_totebag" => "required",
            "design_back_totebag" => "required"
        ])->validate();

        $new_product = new Product();

        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');

        $design_front_totebag = $request->file('design_front_totebag');

        if($design_front_totebag){
            $design_front_totebag_path = $design_front_totebag->store('design_totebag', 'public');
            $new_product->design_front_totebag = $design_front_totebag_path;
        }

        $design_back_totebag = $request->file('design_back_totebag');
        if($design_back_totebag){
            $design_back_totebag_path = $design_back_totebag->store('design_totebag', 'public');
            $new_product->design_back_totebag = $design_back_totebag_path;
        }

        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');
        $new_product->price_totebag = 15000;
        /*weight in grams*/
        $new_product->totebag_weight = 1000;

        $new_product->total = $new_product->getTotebagTotalAttributes();

        $new_product->save();

        Alert::success('SUKSES','Pesanan Berhasil dibuat!');

        return redirect()->route('totebag.show.detail.pengiriman');
    }

    public function showShippingTotebagDetail(){
        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_totebag','products.total','products.totebag_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.totebag_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getTotebagWeight = $calculateWeight[0]->totebag_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'      => $alamat_toko->id,
            'destination' => $city_destination,
            'weight'      => $getTotebagWeight,
            'courier'     => $calculateCourier
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order
        ];

        return view('products.totebag.payment', $data);
    }

    public function showTotebagDetailPengiriman(){

        $id_user = \Auth::user()->id;

        $data['courier'] = Courier::all();
        $data['province'] = Province::all();
        $cekAlamat = DB::table('shipping_address')
            ->where('user_id',$id_user)
            ->count();

        if( $cekAlamat > 0 ) {
            $data['alamat'] = DB::table('shipping_address')
                ->join('cities', 'cities.city_id', '=', 'shipping_address.cities_id')
                ->join('provinces', 'provinces.province_id', '=', 'cities.province_id')
                ->select('provinces.title as prov', 'cities.title as kota', 'shipping_address.*')
                ->where('shipping_address.user_id', $id_user)
                ->get();
        }

        return view('products.totebag.detail_pengiriman',$data);
    }

    public function storeTotebagDetailPengiriman(Request $request){

        ShippingAddress::create([
            'cities_id'        => $request->cities_id,
//            'detail'           => $request->detail,
            'user_id'          => \Auth::user()->id,
            'courier_code'     => $request->courier_code

        ]);

        Alert::success('SUKSES','Alamat Pengiriman  Berhasil dibuat!');

        return redirect()->route('totebag.show.shipping.detail');
    }

    public function InvoiceTotebag(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->orderByDesc('products.created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.totebag_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getTotebagWeight = $calculateWeight[0]->totebag_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getTotebagWeight,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order,
            'getCourier' => $getCourier
        ];

        $pdf = PDF::loadview('products.totebag.invoice',$data);

        return $pdf->stream('invoice-totebag.pdf');
    }


//    public function saveShippingTotebagDetail(Request $request){
//        $add_shipping = new User();
//
//        $add_shipping->name = $request->get('name');
//        $add_shipping->email = $request->get('email');
//        $add_shipping->password = $request->get('password');
//        $add_shipping->address = $request->get('address');
//        $add_shipping->phone_number = $request->get('phone_number');
//
//        $add_shipping->save();
//
//        return back();
//    }

    public function editPaymentTotebagDetail($id){
        $new_shipping_address = User::findOrFail($id);

        return view('products.totebag.payment', ['new_shipping_address' => $new_shipping_address]);
    }

    public function updateShippingTotebagAddress(Request $request, $id){
        $new_shipping_address = User::findOrFail($id);

        $new_shipping_address->name = $request->get('name');
        $new_shipping_address->email = $request->get('email');
        $new_shipping_address->password = $request->get('password');
        $new_shipping_address->address = $request->get('address');
        $new_shipping_address->phone_number = $request->get('phone_number');

        $new_shipping_address->save();

        return redirect()->route('totebag.edit.shipping',['id' => $new_shipping_address->id]);
    }

    public function showFrontTotebag(){

        return view('products.totebag.design_front');
    }

    public function showBackTotebag(){

        return view('products.totebag.design_back');
    }
    /*End of Tote Bag section*/


    /*Start of T-Shirt*/
    public function createTshirtOrder(){
        Alert::success('SUKSES','Desain Berhasil dibuat!');

        return view('products.tshirt.detail_order');
    }

    public function storeTshirtOrder(Request  $request){

        Validator::make($request->all(),[
            "quantity" => "required|digits_between:1,6",
            "design_front_tshirt" => "required",
            "design_back_tshirt" => "required"
        ])->validate();

        $new_product = new Product();

        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');

        $design_front_tshirt = $request->file('design_front_tshirt');

        if($design_front_tshirt){
            $design_front_tshirt_path = $design_front_tshirt->store('design_tshirt', 'public');
            $new_product->design_front_tshirt = $design_front_tshirt_path;
        }

        $design_back_tshirt = $request->file('design_back_tshirt');

        if($design_back_tshirt){
            $design_back_tshirt_path = $design_back_tshirt->store('design_tshirt', 'public');
            $new_product->design_back_tshirt = $design_back_tshirt_path;
        }

        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');
        $new_product->price_tshirt = 35000;
        /*weight in grams*/
        $new_product->tshirt_weight = 1000;

        $new_product->total = $new_product->getTshirtTotalAttributes();

        $new_product->save();

        Alert::success('SUKSES','Pesanan Berhasil dibuat!');

        return redirect()->route('tshirt.show.detail.pengiriman');
    }

    public function showShippingTshirtDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_tshirt','products.total')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.tshirt_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getTshirtWeight = $calculateWeight[0]->tshirt_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'      => $alamat_toko->id,
            'destination' => $city_destination,
            'weight'      => $getTshirtWeight,
            'courier'     => $calculateCourier
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order
        ];

        return view('products.tshirt.payment', $data);
    }


    public function showTshirtDetailPengiriman(){

        $id_user = \Auth::user()->id;

        $data['courier'] = Courier::all();
        $data['province'] = Province::all();
        $cekAlamat = DB::table('shipping_address')
            ->where('user_id',$id_user)
            ->count();

        if( $cekAlamat > 0 ) {
            $data['alamat'] = DB::table('shipping_address')
                ->join('cities', 'cities.city_id', '=', 'shipping_address.cities_id')
                ->join('provinces', 'provinces.province_id', '=', 'cities.province_id')
                ->select('provinces.title as prov', 'cities.title as kota', 'shipping_address.*')
                ->where('shipping_address.user_id', $id_user)
                ->get();
        }

        return view('products.tshirt.detail_pengiriman',$data);
    }


    public function storeTshirtDetailPengiriman(Request $request){

        ShippingAddress::create([
            'cities_id'        => $request->cities_id,
//            'detail'           => $request->detail,
            'user_id'          => \Auth::user()->id,
            'courier_code'     => $request->courier_code

        ]);

        Alert::success('SUKSES','Alamat Pengiriman Berhasil dibuat!');


        return redirect()->route('tshirt.show.shipping.detail');
    }


    public function saveShippingTshirtDetail(Request $request){
        $add_shipping = new User();

        $add_shipping->name = $request->get('name');
        $add_shipping->email = $request->get('email');
        $add_shipping->password = $request->get('password');
        $add_shipping->address = $request->get('address');
        $add_shipping->phone_number = $request->get('phone_number');

        $add_shipping->save();

        return back();
    }

    public function editPaymentTshirtDetail($id){
        $new_shipping_address = User::findOrFail($id);

        return view('products.tshirt.payment', ['new_shipping_address' => $new_shipping_address]);
    }

    public function updateShippingTshirtAddress(Request $request, $id){
        $new_shipping_address = User::findOrFail($id);

        $new_shipping_address->name = $request->get('name');
        $new_shipping_address->email = $request->get('email');
        $new_shipping_address->password = $request->get('password');
        $new_shipping_address->address = $request->get('address');
        $new_shipping_address->phone_number = $request->get('phone_number');

        $new_shipping_address->save();

        return redirect()->route('tshirt.edit.shipping',['id' => $new_shipping_address->id]);
    }


    public function showFrontTshirt(){
        return view('products.tshirt.design_front');
    }

    public function showBackTshirt(){
        return view('products.tshirt.design_back');
    }

    public function InvoiceTshirt(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->orderByDesc('products.created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $displayCourierType = DB::table('shipping_address')
            ->select('courier_code')->first();

        $calculateWeight = DB::table('products')
            ->select('products.tshirt_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getTshirtWeight = $calculateWeight[0]->tshirt_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getTshirtWeight,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order,
            'getCourier' => $getCourier
        ];

        $pdf = PDF::loadview('products.tshirt.invoice',$data);

        return $pdf->stream('invoice-kaos.pdf');
    }

    /*End of T-Shirt Section*/

    /*Start of Mug Section*/

    public function createMugOrder(){

        return view('products.mug.detail_order');
    }

    public function storeMugOrder(Request  $request){

        Validator::make($request->all(),[
            "quantity" => "required|digits_between:1,6",
            "design_front_mug" => "required",
            "design_back_mug" => "required"
        ])->validate();

        $new_product = new Product();

        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');

        $design_front_mug = $request->file('design_front_mug');

        if($design_front_mug){
            $design_front_mug_path = $design_front_mug->store('design_mug', 'public');
            $new_product->design_front_mug = $design_front_mug_path;
        }

        $design_back_mug = $request->file('design_back_mug');

        if($design_back_mug){
            $design_back_mug_path = $design_back_mug->store('design_mug', 'public');
            $new_product->design_back_mug = $design_back_mug_path;
        }

        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');
        $new_product->price_mug = 25000;
        /*weight in grams*/
        $new_product->mug_weight = 1500;


        $new_product->total = $new_product->getMugTotalAttributes();

        $new_product->save();

        Alert::success('SUKSES','Pesanan Berhasil dibuat!');

        return redirect()->route('mug.show.detail.pengiriman');
    }

    public function showMugDetailPengiriman(){

        $id_user = \Auth::user()->id;

        $data['courier'] = Courier::all();
        $data['province'] = Province::all();
        $cekAlamat = DB::table('shipping_address')
            ->where('user_id',$id_user)
            ->count();

        if( $cekAlamat > 0 ) {
            $data['alamat'] = DB::table('shipping_address')
                ->join('cities', 'cities.city_id', '=', 'shipping_address.cities_id')
                ->join('provinces', 'provinces.province_id', '=', 'cities.province_id')
                ->select('provinces.title as prov', 'cities.title as kota', 'shipping_address.*')
                ->where('shipping_address.user_id', $id_user)
                ->get();
        }

        return view('products.mug.detail_pengiriman',$data);
    }


    public function storeMugDetailPengiriman(Request $request){

        ShippingAddress::create([
            'cities_id'        => $request->cities_id,
//            'detail'           => $request->detail,
            'user_id'          => \Auth::user()->id,
            'courier_code'     => $request->courier_code

        ]);

        Alert::success('SUKSES','Alamat Pengiriman Berhasil dibuat!');

        return redirect()->route('mug.show.shipping.detail');
    }

    public function showShippingMugDetail(){
        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_mug','products.total','products.mug_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.mug_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getMugWeight = $calculateWeight[0]->mug_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getMugWeight,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order
        ];

        return view('products.mug.payment',$data);
    }

    public function saveShippingMugDetail(Request $request){
        $add_shipping = new User();

        $add_shipping->name = $request->get('name');
        $add_shipping->email = $request->get('email');
        $add_shipping->password = $request->get('password');
        $add_shipping->address = $request->get('address');
        $add_shipping->phone_number = $request->get('phone_number');

        $add_shipping->save();

        return back();
    }

    public function editPaymentMugDetail($id){
        $new_shipping_address = User::findOrFail($id);

        return view('products.mug.payment', ['new_shipping_address' => $new_shipping_address]);
    }

    public function updateShippingMugAddress(Request $request, $id){

        $new_shipping_address = User::findOrFail($id);

        $new_shipping_address->name = $request->get('name');
        $new_shipping_address->email = $request->get('email');
        $new_shipping_address->password = $request->get('password');
        $new_shipping_address->address = $request->get('address');
        $new_shipping_address->phone_number = $request->get('phone_number');

        $new_shipping_address->save();

        return redirect()->route('mug.edit.shipping',['id' => $new_shipping_address->id]);
    }

    public function showFrontMug(){

        return view('products.mug.design_front');

    }

    public function showBackMug(){
        Alert::success('SUKSES','Desain Berhasil dibuat!');

        return view('products.mug.design_back');
    }
    public function InvoiceMug(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->orderByDesc('products.created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $displayCourierType = DB::table('shipping_address')
            ->select('courier_code')->first();

        $calculateWeight = DB::table('products')
            ->select('products.mug_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getMugWeight = $calculateWeight[0]->mug_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getMugWeight,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order,
            'getCourier' => $getCourier
        ];

        $pdf = PDF::loadview('products.mug.invoice',$data);

        return $pdf->stream('invoice-mug.pdf');
    }

    /*End of Mug Section*/

    /*Start of BackPack Section*/

    public function createBagpackOrder(){

        Alert::success('SUKSES','Desain Berhasil dibuat!');

        return view('products.bag.detail_order');
    }

    public function storeBagpackOrder(Request  $request){

        Validator::make($request->all(),[
            "quantity" => "required|digits_between:1,6",
            "design_backpack" => "required"
        ])->validate();

        $new_product = new Product();

        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');

        $design_backpack = $request->file('design_backpack');

        if($design_backpack){
            $design_backpack_path = $design_backpack->store('design_backpack', 'public');
            $new_product->design_backpack = $design_backpack_path;
        }

        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');
        $new_product->price_backpack = 50000;
        /*weight in grams*/
        $new_product->backpack_weight = 2000;

        $new_product->total = $new_product->getBagTotalAttributes();

        $new_product->save();

        Alert::success('SUKSES','Pesanan Berhasil dibuat!');

        return redirect()->route('backpack.show.detail.pengiriman');
    }


    public function showBackpackDetailPengiriman(){

        $id_user = \Auth::user()->id;

        $data['courier'] = Courier::all();
        $data['province'] = Province::all();
        $cekAlamat = DB::table('shipping_address')
            ->where('user_id',$id_user)
            ->count();

        if( $cekAlamat > 0 ) {
            $data['alamat'] = DB::table('shipping_address')
                ->join('cities', 'cities.city_id', '=', 'shipping_address.cities_id')
                ->join('provinces', 'provinces.province_id', '=', 'cities.province_id')
                ->select('provinces.title as prov', 'cities.title as kota', 'shipping_address.*')
                ->where('shipping_address.user_id', $id_user)
                ->get();
        }

        return view('products.bag.detail_pengiriman',$data);
    }


    public function storeBackpackDetailPengiriman(Request $request){

        ShippingAddress::create([
            'cities_id'        => $request->cities_id,
//            'detail'           => $request->detail,
            'user_id'          => \Auth::user()->id,
            'courier_code'     => $request->courier_code

        ]);

        Alert::success('SUKSES','Alamat Pengiriman Berhasil dibuat!');

        return redirect()->route('bagpack.show.shipping.detail');
    }

    public function showShippingBagpackDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_backpack','products.total','products.backpack_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $calculateWeight = DB::table('products')
            ->select('products.backpack_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getBackpackWeight = $calculateWeight[0]->backpack_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'      => $alamat_toko->id,
            'destination' => $city_destination,
            'weight'      => $getBackpackWeight,
            'courier'     => $calculateCourier
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order
        ];

        return view('products.bag.payment', $data);
    }

    public function saveShippingBagpackDetail(Request $request){
        $add_shipping = new User();

        $add_shipping->name = $request->get('name');
        $add_shipping->email = $request->get('email');
        $add_shipping->password = $request->get('password');
        $add_shipping->address = $request->get('address');
        $add_shipping->phone_number = $request->get('phone_number');

        $add_shipping->save();

        return back();
    }

    public function editPaymentBagpackDetail($id){

        $new_shipping_address = User::findOrFail($id);

        return view('products.bag.payment', ['new_shipping_address' => $new_shipping_address]);
    }

    public function updateShippingBagpackAddress(Request $request, $id){

        $new_shipping_address = User::findOrFail($id);

        $new_shipping_address->name = $request->get('name');
        $new_shipping_address->email = $request->get('email');
        $new_shipping_address->password = $request->get('password');
        $new_shipping_address->address = $request->get('address');
        $new_shipping_address->phone_number = $request->get('phone_number');

        $new_shipping_address->save();

        return redirect()->route('bagpack.edit.shipping',['id' => $new_shipping_address->id]);
    }

    public function showBagpackDesain(){

        return view('products.bag.design_front');
    }

    public function InvoiceBagpack(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.*','users.*')
            ->orderByDesc('products.created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

        $getCourier = DB::table('shipping_address')->select('shipping_address.courier_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $calculateCourier = $getCourier[0]->courier_code;

        $displayCourierType = DB::table('shipping_address')
            ->select('courier_code')->first();

        $calculateWeight = DB::table('products')
            ->select('products.backpack_weight')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $getBagpackWeight = $calculateWeight[0]->backpack_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getBagpackWeight,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
            'detail_order' => $detail_order,
            'getCourier' => $getCourier
        ];

        $pdf = PDF::loadview('products.bag.invoice',$data);

        return $pdf->stream('invoice-tas.pdf');
    }


    /*End of BackPack Section*/
}
