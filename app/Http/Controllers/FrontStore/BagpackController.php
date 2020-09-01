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

    public function showDetailBagpack($bagpack){

        $bagpack = Product::findOrFail($bagpack);

        return view('products.bag.detail')->with(['bagpack' => $bagpack,]);

    }
}
