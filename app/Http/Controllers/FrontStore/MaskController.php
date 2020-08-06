<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;

class MaskController extends Controller
{
    public function showAllMask()
    {
        $masks = Product::where("category","=",'masker')->get();
        return view('products.mask.index')
            ->with(['masks' => $masks,]);
    }

    public function showDetailMask(){
        return view('products.mask.detail');
    }
}
