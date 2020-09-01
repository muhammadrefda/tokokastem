<?php

namespace App\Http\Controllers;

use App\Product;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {

        $orders = Transaction::all();
        return view('admin.product.index')
            ->with(['orders' => $orders,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function store(Request $request)
    {
//        $transaction = new Transaction();
//        $transaction->quantity = $request->get('quantity');
//        $transaction->total = $request->get('total');
//        $transaction->status = 'pending';
//        $transaction->customer_phone = $request->get('customer_phone');
//        $transaction->customer_province = $request->get('customer_province');
//        $transaction->customer_city = $request->get('customer_city');
//        $transaction->customer_district = $request->get('customer_district');
//        $transaction->customer_address = $request->get('customer_address');
//        $transaction->customer_postal_code = $request->get('customer_postal_code');
//        $transaction->proof_of_transaction = $request->get('proof_of_transaction');
//        $transaction->product_id = $request->get('product_id');
//
//
//        $transaction->save();


        return view('products.payment');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
