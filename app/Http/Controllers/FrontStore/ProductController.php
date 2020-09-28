<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $new_product->price_fabric = Product::price_fabric;

        $new_product->save();

        return redirect()->route('fabric.show.shipping.detail');
    }
    public function showShippingDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category',
                'products.unique_code','products.price_fabric')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

//        $order = User::findOrFail($order);
//
//        $data = array(
//            'detail_order' => $detail_order,
//            'order' => $order,
//        );




        return view('products.fabric.payment',compact('detail_order'));
    }

    public function saveShippingDetail(Request $request){
        $add_shipping = new User();

        $add_shipping->name = $request->get('name');
        $add_shipping->email = $request->get('email');
        $add_shipping->password = $request->get('password');
        $add_shipping->address = $request->get('address');
        $add_shipping->phone_number = $request->get('phone_number');
        $add_shipping->save();

        return back();

    }

    public function editFabricShippingDetail($order){

        return view('products.fabric.payment')->with
        (
            [
                'order' => User::findOrFail($order),
            ]
        );
//            $new_shipping_address = User::findOrFail($id);
//            return view('products.fabric.payment', ['new_shipping_address' => $new_shipping_address]);
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

        $design_left_mask = $request->file('design_left_mask');

        if($design_left_mask){
            $design_left_mask_path = $design_left_mask->store('design_left_mask', 'public');
            $new_product->design_left_mask = $design_left_mask_path;
        }

        $design_right_mask = $request->file('design_right_mask');

        if($design_right_mask){
            $design_right_mask_path = $design_right_mask->store('design_right_mask', 'public');
            $new_product->design_right_mask = $design_right_mask_path;
        }

//        $new_product->design_left_mask = $request->get('design_left_mask');
//        $new_product->design_right_mask = $request->get('design_right_mask');

        $new_product->category = $request->get('category');
        $new_product->size = $request->get('size');
        $new_product->material = $request->get('material');
        $new_product->note = $request->get('note');
        $new_product->status = $request->get('status');

        $new_product->save();

        return redirect()->route('mask.show.shipping.detail');
    }
    public function showShippingMaskDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category','products.unique_code')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        return view('products.mask.payment', compact('detail_order'));
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
        $new_product->proof_of_transaction = $request->get('proof_of_transaction');
        $new_product->status = $request->get('status');

        $new_product->save();

        return redirect()->route('totebag.show.shipping.detail');
    }

    public function showShippingTotebagDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category','products.unique_code')
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
        $new_product->proof_of_transaction = $request->get('proof_of_transaction');
        $new_product->status = $request->get('status');

        $new_product->save();

        return redirect()->route('tshirt.show.shipping.detail');
    }

    public function showShippingTshirtDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category','products.unique_code')
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
        $new_product->proof_of_transaction = $request->get('proof_of_transaction');
        $new_product->status = $request->get('status');

        $new_product->save();

        return redirect()->route('mug.show.shipping.detail');
    }

    public function showShippingMugDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category','products.unique_code')
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
        $new_product->proof_of_transaction = $request->get('proof_of_transaction');
        $new_product->status = $request->get('status');

        $new_product->save();

        return redirect()->route('bagpack.show.shipping.detail');
    }

    public function showShippingBagpackDetail(){

        $detail_order = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.id', 'products.quantity','products.created_at','products.category','products.unique_code')
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
