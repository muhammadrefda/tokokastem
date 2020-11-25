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
use Kavist\RajaOngkir\Facades\RajaOngkir;


class ProductController extends Controller
{

    /*Start of Fabric section*/

    public function createFabricOrder()
    {
        return view('products.fabric.detail_order');
    }

    public function storeProductOrder(Request  $request){

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

        return redirect()->route('fabric.show.detail.pengiriman');
    }

    public function getProvince(){
        return Province::pluck('title');
    }

    public function getCities($id)
    {
        $city = City::where('province_code', $id)->pluck('title', 'code');
        return response()->json($city);
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

        return view('products.fabric.detail_pengiriman',$data);
    }

    public function getCity($id)
    {
        $city = City::where('province_id',$id)->get();

        return response()->json($city);
    }


    public function storeDetailPengiriman(Request $request){

         ShippingAddress::create([
             'cities_id' => $request->cities_id,
             'detail'    => $request->detail,
             'user_id'   => \Auth::user()->id,
             'courier_code'     => $request->courier_code
         ]);

        return redirect()->route('fabric.show.shipping.detail');
    }

    public function searchCities(Request $request){
        $search = $request->search;

        if (empty($search)){
            $cities = City::orderBy('title','asc')
                ->select('id','title')
                ->limit(5)
                ->get();
        } else {
            $cities = City::orderBy('title','asc')
                ->where('title','like','%' . $search . '%')
                ->select('id','title')
                ->limit(5)
                ->get();
        }

        $response = [];


        foreach ($cities as $city) {
            $response[] = [
                'id' => $city->id,
                'text' => $city->title
            ];
        }

        return json_encode($response);
    }

    public function getCourier()
    {
        return Courier::all();
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
            ->orderByDesc('created_at')->limit(1)->get();
        $calculateCourier = $getCourier[0]->courier_code;
        $calculateWeight = DB::table('products')
            ->select('products.fabric_weight')->orderByDesc('created_at')->limit(1)->get();
        $getFabricWeight = $calculateWeight[0]->fabric_weight;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => $getFabricWeight,
//        'weight' =>5000,
            'courier' => $calculateCourier,
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
//            'alamat' => $alamat_user,
            'detail_order' => $detail_order
        ];

        return view('products.fabric.payment',$data);
    }

//    public function check_ongkir(Request $request)
//    {
//        $cost = RajaOngkir::ongkosKirim([
//            'origin'        => $request->city_origin,
//            'destination'   => $request->city_destination,
//            'weight'        => $request->weight,
//            'courier'       => $request->courier
//        ])->get();
//
//        return response()->json($cost);
//    }

    public function saveShippingDetail(Request $request){
        $add_shipping = new User();

        $add_shipping->name = $request->get('name');
        $add_shipping->email = $request->get('email');
        $add_shipping->password = $request->get('password');
        $add_shipping->address = $request->get('address');
        $add_shipping->phone_number = $request->get('phone_number');
        $add_shipping->save();

        return back();

//        return redirect()->route('fabric.show.detail.pengiriman');
    }

    public function editFabricShippingDetail($order){

        return view('products.fabric.payment')->with
        (
            [
                'order' => User::findOrFail($order),
            ]
        );
    }

    public function updateFabricShippingDetail($order){

        $order = User::findOrFail($order);

        $order->update(request()->all());

        return redirect()->back();
    }

//    public function updateShippingAddress(Request $request, $id){
//
//            $new_shipping_address = User::findOrFail($id);
//
//            $new_shipping_address->name = $request->get('name');
//            $new_shipping_address->email = $request->get('email');
//            $new_shipping_address->password = $request->get('password');
//            $new_shipping_address->address = $request->get('address');
//            $new_shipping_address->phone_number = $request->get('phone_number');
//
//            $new_shipping_address->save();
//
//            return redirect()->route('fabric.edit.shipping',['id' => $new_shipping_address->id]);
//        }


        /*End of Fabric section*/


    /*Start of Mask section*/

    public function createMaskOrder(){

        return view('products.mask.detail_order');
    }

    public function storeMaskOrder(Request  $request){

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

        $new_product->price_mask = 5000;
        $new_product->weigth = 1000;



        $new_product->total = $new_product->getMaskTotalAttributes();


        $new_product->save();

        return redirect()->route('mask.show.detail.pengiriman');
    }


    public function showMaskDetailPengiriman(){

        $id_user = \Auth::user()->id;


        $data['courier'] = Courier::all();
        $data['province'] = Province::all();
        $cekAlamat = DB::table('shipping_address')
            ->where('user_id',$id_user)
            ->count();

        if($cekAlamat >0) {
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
            'cities_id' => $request->cities_id,
            'detail'    => $request->detail,
            'user_id'   => \Auth::user()->id
        ]);

        return redirect()->route('mask.show.shipping.detail');
    }


    public function showShippingMaskDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_mask','products.total')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $id_user = \Auth::user()->id;

        $city = DB::table('shipping_address')->where('user_id',$id_user)->get();

        $city_destination =  $city[0]->cities_id;

        $alamat_toko = DB::table('alamat_toko')->first();

//        $couriers = $courier[0]->courier_code;

        $cost = RajaOngkir::ongkosKirim([
            'origin'  => $alamat_toko->id,
            'destination' => $city_destination,
            'weight' => 1000,
            'courier' => 'jne'
        ])->get();

        $ongkir =  $cost[0]['costs'][0]['cost'][0]['value'];

        $data = [
            'ongkir' => $ongkir,
//            'alamat' => $alamat_user,
            'detail_order' => $detail_order
        ];

        return view('products.mask.payment', $data);
    }

    public function saveShippingMaskDetail(Request $request){
        $add_shipping = new User();

        $add_shipping->name = $request->get('name');
        $add_shipping->email = $request->get('email');
        $add_shipping->password = $request->get('password');
        $add_shipping->address = $request->get('address');
        $add_shipping->phone_number = $request->get('phone_number');

        $add_shipping->save();

        return back();
    }

    public function editPaymentMaskDetail($id){

        $new_shipping_address = User::findOrFail($id);

        return view('products.mask.payment', ['new_shipping_address' => $new_shipping_address]);
    }

    public function updateShippingMaskAddress(Request $request, $id){

        $new_shipping_address = User::findOrFail($id);

        $new_shipping_address->name = $request->get('name');
        $new_shipping_address->email = $request->get('email');
        $new_shipping_address->password = $request->get('password');
        $new_shipping_address->address = $request->get('address');
        $new_shipping_address->phone_number = $request->get('phone_number');

        $new_shipping_address->save();

        return redirect()->route('mask.edit.shipping',['id' => $new_shipping_address->id]);
    }

    public function showRightMask(){
        return view('products.mask.design_right');
    }

    public function showLeftMask(){
        return view('products.mask.design_left');
    }
    /*End of Mask section*/


    /*Start of Tote Bag section*/
    public function createTotebagOrder(){

        return view('products.totebag.detail_order');
    }

    public function storeTotebagOrder(Request  $request){

        $new_product = new Product();
        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');
        $new_product->design_front_totebag = $request->get('design_front_totebag');
        $new_product->design_back_totebag = $request->get('design_back_totebag');
        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');
        $new_product->price_totebag = 15000;

        $new_product->total = $new_product->getTotebagTotalAttributes();

        $new_product->save();

        return redirect()->route('totebag.show.shipping.detail');
    }

    public function showShippingTotebagDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_totebag','products.total')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        return view('products.totebag.payment', compact('detail_order'));
    }

    public function saveShippingTotebagDetail(Request $request){
        $add_shipping = new User();

        $add_shipping->name = $request->get('name');
        $add_shipping->email = $request->get('email');
        $add_shipping->password = $request->get('password');
        $add_shipping->address = $request->get('address');
        $add_shipping->phone_number = $request->get('phone_number');

        $add_shipping->save();

        return back();
    }

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

        return view('products.tshirt.detail_order');
    }

    public function storeTshirtOrder(Request  $request){

        $new_product = new Product();
        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');
        $new_product->design_front_tshirt = $request->get('design_front_tshirt');
        $new_product->design_back_tshirt = $request->get('design_back_tshirt');
        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');
        $new_product->price_tshirt = 35000;

        $new_product->total = $new_product->getTshirtTotalAttributes();

        $new_product->save();

        return redirect()->route('tshirt.show.shipping.detail');
    }

    public function showShippingTshirtDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_tshirt','products.total')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        return view('products.tshirt.payment', compact('detail_order'));
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
    /*End of T-Shirt Section*/

    /*Start of Mug Section*/

    public function createMugOrder(){

        return view('products.mug.detail_order');
    }

    public function storeMugOrder(Request  $request){

        $new_product = new Product();
        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');
        $new_product->design_front_mug = $request->get('design_front_mug');
        $new_product->design_back_mug = $request->get('design_back_mug');
        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');

        $new_product->price_mug = 25000;

        $new_product->total = $new_product->getMugTotalAttributes();

        $new_product->save();

        return redirect()->route('mug.show.shipping.detail');
    }

    public function showShippingMugDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_mug','products.total')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        return view('products.mug.payment', compact('detail_order'));
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

        return view('products.mug.design_back');
    }
    /*End of Mug Section*/

    /*Start of BackPack Section*/

    public function createBagpackOrder(){

        return view('products.bag.detail_order');
    }

    public function storeBagpackOrder(Request  $request){

        $new_product = new Product();
        $new_product->user_id = Auth::user()->id;
        $new_product->unique_code = mt_rand(100,999);
        $new_product->quantity = $request->get('quantity');
        $new_product->design_backpack = $request->get('design_backpack');
        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
//        $new_product->proof_of_transaction = $request->get('proof_of_transaction');
        $new_product->status = $request->get('status');
        $new_product->price_backpack = 50000;
        $new_product->total = $new_product->getBagTotalAttributes();



        $new_product->save();

        return redirect()->route('bagpack.show.shipping.detail');
    }

    public function showShippingBagpackDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_backpack','products.total')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        return view('products.bag.payment', compact('detail_order'));
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

    /*End of BackPack Section*/

}
