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
                                        <td>{{number_format($td->price_totebag)}}</td>
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

                {{--                <div class="col-md-6">--}}
                {{--                    <div class="checkout-left">--}}
                {{--                        <div class="aa-order-summary-area">--}}
                {{--                            <div class="card">--}}
                {{--                                <div class="card-header">--}}
                {{--                                    <h4 class="my-0 font-weight-normal">Rincian Pengiriman--}}
                {{--                                    </h4>--}}
                {{--                                </div>--}}
                {{--                                <br>--}}
                {{--                                <div class="card-body">--}}
                {{--                                    <form action="" method="POST">--}}
                {{--                                        @csrf--}}
                {{--                                        <div class="form-row">--}}
                {{--                                            <div class="col">--}}
                {{--                                                <h5 class="text-muted">Asal Pengirim:</h5>--}}
                {{--                                                <div class="form-group">--}}
                {{--                                                    <label for="">Provinsi</label>--}}
                {{--                                                    <select class="form-control provinsi-asal" name="province_origin" id="provinsi-asal">--}}
                {{--                                                        <option value="0">-- pilih provinsi asal --</option>--}}
                {{--                                                        @foreach ($provinces as $province => $value)--}}
                {{--                                                            <option value="{{ $province  }}">{{ $value }}</option>--}}
                {{--                                                        @endforeach--}}
                {{--                                                    </select>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="form-group">--}}
                {{--                                                    <label class="font-weight-bold">KOTA / KABUPATEN ASAL</label>--}}
                {{--                                                    <select class="form-control kota-asal" name="city_origin" id="kota-asal">--}}
                {{--                                                        <option value="">-- pilih kota asal --</option>--}}
                {{--                                                    </select>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="col-md-3">--}}
                {{--                                                    <div class="card">--}}
                {{--                                                        <div class="card-body">--}}
                {{--                                                            <h3>DESTINATION</h3>--}}
                {{--                                                            <hr>--}}
                {{--                                                            <div class="form-group">--}}
                {{--                                                                <label class="font-weight-bold">PROVINSI TUJUAN</label>--}}
                {{--                                                                <select class="form-control provinsi-tujuan" name="province_destination">--}}
                {{--                                                                    <option value="0">-- pilih provinsi tujuan --</option>--}}
                {{--                                                                    @foreach ($provinces as $province => $value)--}}
                {{--                                                                        <option value="{{ $province  }}">{{ $value }}</option>--}}
                {{--                                                                    @endforeach--}}
                {{--                                                                </select>--}}
                {{--                                                            </div>--}}
                {{--                                                            <div class="form-group">--}}
                {{--                                                                <label class="font-weight-bold">KOTA / KABUPATEN TUJUAN</label>--}}
                {{--                                                                <select class="form-control kota-tujuan" name="city_destination">--}}
                {{--                                                                    <option value="">-- pilih kota tujuan --</option>--}}
                {{--                                                                </select>--}}
                {{--                                                            </div>--}}
                {{--                                                        </div>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="col-md-3">--}}
                {{--                                                    <div class="card">--}}
                {{--                                                        <div class="card-body">--}}
                {{--                                                            <h3>KURIR</h3>--}}
                {{--                                                            <hr>--}}
                {{--                                                            <div class="form-group">--}}
                {{--                                                                <label>PROVINSI TUJUAN</label>--}}
                {{--                                                                <select class="form-control kurir" name="courier">--}}
                {{--                                                                    <option value="0">-- pilih kurir --</option>--}}
                {{--                                                                    <option value="jne">JNE</option>--}}
                {{--                                                                    <option value="pos">POS</option>--}}
                {{--                                                                    <option value="tiki">TIKI</option>--}}
                {{--                                                                </select>--}}
                {{--                                                            </div>--}}
                {{--                                                            <div class="form-group">--}}
                {{--                                                                <label class="font-weight-bold">BERAT (GRAM)</label>--}}
                {{--                                                                <input type="number" class="form-control" name="weight" id="weight" placeholder="Masukkan Berat (GRAM)">--}}
                {{--                                                            </div>--}}
                {{--                                                        </div>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                                <div class="col-md-3">--}}
                {{--                                                    <button class="btn btn-md btn-primary btn-block btn-check">CEK ONGKOS KIRIM</button>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}

                {{--                                            <div class="row mt-3">--}}
                {{--                                                <div class="col-md-12">--}}
                {{--                                                    <div class="card d-none ongkir">--}}
                {{--                                                        <div class="card-body">--}}
                {{--                                                            <ul class="list-group" id="ongkir"></ul>--}}
                {{--                                                        </div>--}}
                {{--                                                    </div>--}}
                {{--                                                </div>--}}
                {{--                                            </div>--}}
                {{--                                            </div>--}}
                {{--                                    </form>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}


            </div>
        </div>
    </section>

    <!-- / Cart view section -->



@endsection
