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
{{--                                <div class="col-md-8">--}}
{{--                                    <div class="checkout-left">--}}
{{--                                        <div class="panel-group" id="accordion">--}}

{{--                                            <!-- Shipping Address -->--}}
{{--                                            <div class="panel panel-default aa-checkout-billaddress">--}}
{{--                                                <div class="panel-heading">--}}
{{--                                                    <h4 class="panel-title">--}}
{{--                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">--}}
{{--                                                            Alamat Pengiriman--}}
{{--                                                        </a>--}}
{{--                                                    </h4>--}}
{{--                                                </div>--}}
{{--                                                <div id="collapseFour" class="panel-collapse collapse">--}}
{{--                                                    <div class="panel-body">--}}
{{--                                                        <form action="{{route('mask.store.shipping.detail')}}" method="POST" class="aa-login-form">--}}
{{--                                                            @csrf--}}
{{--                                                            <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <div class="aa-checkout-single-bill">--}}
{{--                                                                    <input type="tel" placeholder="Nomor handphone*" name="phone_number">--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-12">--}}
{{--                                                                <div class="aa-checkout-single-bill">--}}
{{--                                                                    <p>--}}
{{--                                                                        contoh penulisan alamat:--}}
{{--                                                                    </p>--}}
{{--                                                                    <p>--}}
{{--                                                                        Jl. Muhammad Kahfi 2, Rt 03/08 no.38,--}}
{{--                                                                        DKI Jakarta, Jakarta Selatan, Jagakarsa 12640--}}
{{--                                                                        Indonesia--}}
{{--                                                                    </p>--}}
{{--                                                                    <textarea cols="8" rows="3" name="address" class="font-weight-bold"></textarea>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-12">--}}
{{--                                                                <br>--}}
{{--                                                                <input type="submit" name="submit" value="checkout pesanan" class="btn btn-primary">--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        </form>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-md-12">
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
                                                    <td>Rp. 2,000,-</td>
                                                </tr>

                                            </tbody>
                                            @endforeach
                                            <tfoot>
                                            <tr>
                                                <th colspan="2">Total</th>

                                                <td>Rp. {{number_format($td->quantity *2000)}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="checkout-right">
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
                                             <a class="btn btn-success" href="https://api.whatsapp.com/send?phone=81411165221&text=Saya%20ingin%20melakukan%20konfirmasi%20pembayaran">upload</a>
                                        </div>
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
