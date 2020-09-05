<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class MugController extends Controller
{
    public function showAllMug()
    {
        $mugs = Product::where("category","=",'mug')->get();
        return view('products.mug.index')
            ->with(['mugs' => $mugs,]);
    }

    public function showDetailMug($mug){

        $mug = Product::findOrFail($mug);

        return view('products.mug.detail')->with(['mug' => $mug,]);
    }


    public function createMugOrder(){

        return view('products.mug.detail_order');
    }

    public function storeMugOrder(Request $request){

        Product::create($request->all());
        return redirect()->route('mug.detail.order')
            ->with('success','Order has ben created.');
    }


    public function showFrontMug(){

        return view('products.mug.design_front');
    }

    public function showBackMug(){

        return view('products.mug.design_back');
    }
}
