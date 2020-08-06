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

    public function showDetailBagpack(){
        return view('products.bag.detail');
    }
}
