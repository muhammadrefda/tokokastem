<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use App\Contracts\AttributeContract;
use Illuminate\Http\Request;


class MaskController extends Controller
{


    public function showAllMask()
    {
        $masks = Product::where("category","=",'masker')->get();
        return view('products.mask.index')
            ->with(['masks' => $masks,]);
    }

    public function showDetailMask($mask){

        $mask = Product::findOrFail($mask);

        return view('products.mask.detail')->with(['mask' => $mask,]);
    }

    public function createMaskOrder(){

        return view('products.mask.detail_order');
    }

    public function storeMaskOrder(Request $request){

        Product::create($request->all());
        return redirect()->route('mask.detail.order')
            ->with('success','Order has ben created.');
    }


    public function showRightMask(){
        return view('products.mask.design_right');
    }

    public function showLeftMask(){
        return view('products.mask.design_left');
    }
}
