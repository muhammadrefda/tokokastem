<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MaskController extends Controller
{
    public function showAllMask()
    {
        $products = Product::all();
        return view('products.mask.index')
            ->with(['products' => $products,]);
    }

    public function showDetailMask(){
        return view('products.mask.detail');
    }
}
