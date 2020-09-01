<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class TshirtController extends Controller
{
    public function showAllTshirt()
    {
        $tshirts = Product::where("category","=",'tshirt')->get();
        return view('products.tshirt.index')
            ->with(['tshirts' => $tshirts,]);
    }

    public function createTshirtOrder(){

        return view('products.tshirt.detail_order');
    }

    public function storeTshirtOrder(Request $request){

        Product::create($request->all());
        return redirect()->route('tshirt.detail.order')
            ->with('success','Order has ben created.');

//        return view('products.tshirt.detail')->with(['tshirt' => $tshirt,]);
    }


    public function showFrontTshirt(){

        return view('products.tshirt.design_front');
    }

    public function showBackTshirt(){

        return view('products.tshirt.design_back');
    }
}
