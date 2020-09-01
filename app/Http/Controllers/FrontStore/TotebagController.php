<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class TotebagController extends Controller
{
    public function showAllTotebag()
    {
        $totebags = Product::where("category","=",'tote bag')->get();
        return view('products.totebag.index')
            ->with(['totebags' => $totebags,]);
    }

    public function showDetailTotebag($totebag){

        $totebag = Product::findOrFail($totebag);

        return view('products.totebag.detail')->with(['totebag' => $totebag,]);
    }


    public function createTotebagOrder(){

        return view('products.totebag.detail_order');
    }

    public function storeTotebagOrder(Request $request){

        Product::create($request->all());
        return redirect()->route('totebag.detail.order')
            ->with('success','Order has ben created.');
    }


    public function showFrontTotebag(){
        return view('products.totebag.design_front');
    }

    public function showBackTotebag(){
        return view('products.totebag.design_back');
    }


}
