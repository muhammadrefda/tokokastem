<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class BagpackController extends Controller
{
    public function showAllBagpack()
    {
        $bagpacks = Product::where("category","=",'tas')->get();
        return view('products.bag.index')
            ->with(['bagpacks' => $bagpacks,]);
    }

    public function createBagpackOrder(){

        return view('products.mug.detail_order');
    }

    public function storeBagpackOrder(Request $request){

        Product::create($request->all());
        return redirect()->route('bagpack.detail.order')
            ->with('success','Order has ben created.');
    }


    public function showFrontBagpack(){

        return view('products.bag.design_front');
    }

    public function showBackBagpack(){

        return view('products.bag.design_back');
    }

}
