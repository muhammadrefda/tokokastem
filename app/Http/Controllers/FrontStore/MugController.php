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
}
