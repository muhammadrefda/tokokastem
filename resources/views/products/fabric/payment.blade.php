@extends('layouts.master')
@section('title','Payment')
@section('content')

    <!-- Cart view section -->
    <section id="checkout" >
        <div class="container">
            <div class="row">

                    <div class="col-md-12">
                        <div class="checkout-left">
                            <div class="aa-order-summary-area">
                                <br>
                                <h2>Rincian Pesanan</h2>
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
                                            <td>{{number_format($td->price_fabric)}}</td>
                                        </tr>

                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <th colspan="2">Kode Unik</th>
                                        <td><b>{{$td->unique_code}}</b></td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Ongkir</th>
                                        <td>
                                            Rp . {{ number_format($ongkir) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <td>
                                            Rp. {{number_format($td->total+$ongkir)}}
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="aa-order-summary-area">
                                <h4>Setelah melakukan transfer, silahkan mengirim bukti pembayaran ke nomor berikut</h4>
                                <div class="col-md-offset-10">
                                <a class="btn btn-primary" style="background-color: #F36365; color: #ffffff;" href="https://api.whatsapp.com/send?phone=81411165221&text=Saya%20ingin%20melakukan%20konfirmasi%20pembayaran"><b>0812345678976</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->



@endsection
