<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class FabricController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createFabric()
    {
        return view('products.custom_products.custom');
    }

}
