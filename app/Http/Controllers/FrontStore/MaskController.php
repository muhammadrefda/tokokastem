<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use App\Contracts\AttributeContract;


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
}
