<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusOrderController extends Controller
{
    public function index(){
        $status = DB::table('products')
            ->join('users','products.user_id','=','users.id')
            ->select('products.status', 'products.created_at')
            ->orderByDesc('created_at')
            ->limit(1)
            ->get();

        $data = [
            'status' => $status,
        ];

        return view('status-pesanan', $data);
    }
}
