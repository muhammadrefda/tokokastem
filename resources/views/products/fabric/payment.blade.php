@extends('layouts.master')
@section('title','Payment')
@section('content')

    <!-- Cart view section -->
    <section id="checkout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-area">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-right">
                                        <div class="aa-order-summary-area">
                                            <h4>Rincian Pesanan</h4>
                                            <table class="table table-responsive">
                                                <thead>
                                                <tr>
                                                    <th>Produk</th>
                                                    <th>Qty </th>
                                                    <th>Harga Satuan</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($detail_order as $td)
                                                    <tr>
                                                        <td>{{$td->category}}</td>
                                                        <td>{{$td->quantity}}</td>
                                                        <td>{{$td->price_fabric}}</td>
                                                    </tr>

                                                </tbody>
                                                @endforeach
                                                <tfoot>
                                                <tr>
                                                    <th colspan="2">Kode Unik</th>
                                                    <td><b>{{$td->unique_code}}</b></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">Total</th>
{{--                                                    <td>Rp. {{number_format($td->quantity *2000)}}</td>--}}
                                                    <td>
                                                        @php()
                                                        @endphp
                                                    </td>

                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <h4>Upload Bukti Transfer disini</h4>
                                        <div class="aa-order-summary-area">
                                            <p>Silahkan Transfer ke:</p>
                                            Kode Unik:  <b>{{$td->unique_code}}</b>


                                            <p>
                                                Nama Bank : BNI
                                            </p>
                                            <p>
                                                No. Rek   : 091123453
                                            </p>
                                            <h5>Tambahkan 3 digit kode unik di atas pada saat transfer agar pesanan cepat diproses</h5>
                                        </div>
                                        <div class="aa-order-summary-area">
                                            <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=81411165221&text=Saya%20ingin%20melakukan%20konfirmasi%20pembayaran">Upload Bukti Pembayaran</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6  " >
                                    <div class="checkout-right ">
                                        code here
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->



@endsection
