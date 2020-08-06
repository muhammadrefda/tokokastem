<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class TotebagController extends Controller
{
    public function showAllTotebag()
    {
        $totebags = Product::where("category","=",'totebag')->get();
        return view('products.totebag.index')
            ->with(['totebags' => $totebags,]);
    }

    public function showDetailTotebag(){
        return view('products.totebag.detail');
    }
}
