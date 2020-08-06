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

    public function showDetailTshirt(){
        return view('products.tshirt.detail');
    }
}
