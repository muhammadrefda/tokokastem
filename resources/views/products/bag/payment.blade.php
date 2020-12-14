@extends('layouts.master')
@section('title','Payment')
@section('content')
    <section id="checkout" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-left">
                        <div class="aa-order-summary-area">
                            <br>
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
                                        <td>{{number_format($td->price_backpack)}}</td>
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
                            <div class="aa-blog-content">
                                <h4>
                                    Silahkan <b>Cetak Invoice</b> dan kirim ke nomor <b>WhatsApp</b> dibawah
                                </h4>
                            </div>
                            <div class="col-lg-offset-11">
                                <a href="{{route('bagpack.print.invoice')}}" class="btn btn-primary btn-lg"
                                   style="background-color: #F36365; color: #ffffff;">Cetak Invoice</a>
                            </div>
                            <div class="">
                                <button class="btn btn-primary btn-lg" style="background-color: #333333; color: #ffffff;">
                                    <i class="fa fa-whatsapp" style="color: #5DC244; font-size: 5rem">
                                    </i>
                                    <a style="color: #ffffff"
                                       href="https://api.whatsapp.com/send?phone=81411165221&text=Saya%20ingin%20melakukan%20konfirmasi%20pembayaran">
                                        0812345678976
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- / Cart view section -->



@endsection
