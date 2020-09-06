@extends('layouts.master')

@section('title','Homepage')

@section('content')

    <section id="aa-product-details">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-product-details-area">
                        <div class="aa-product-details-content">
                            <div class="row">
                                <center>
                                <h2>Detail Pemesanan</h2>
                                </center>
                                <div class="col-md-5 col-sm-5 col-xs-12">

                                        <form action="" class="aa-subscribe-form">
                                            @csrf
                                            <div class="form-group">
                                                <label>Jumlah Pesanan</label>
                                                <span class="aa-product-view-price"></span>
                                                <input type="text" class="form-control" name="material" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Design Tas Depan</label>
                                                <span class="aa-product-view-price"></span>
                                                <input type="file" class="form-control" name="material" required>
                                            </div>
                                        </form>

                                </div>

                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <div class="form-group">
                                            <label>Ukuran</label>
                                            <span class="aa-product-view-price"></span>
                                            <select class="form-control" id="exampleFormControlSelect1" disabled>
                                                <option>All Size</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Harga Satuan</label>
                                            <span class="aa-product-view-price"></span>
                                            <input type="text" class="form-control" name="material" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Bahan</label>
                                            <span class="aa-product-view-price"></span>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>Scuba</option>
                                                <option>Cotton</option>
                                                <option>Flanel</option>
                                                <option>Polyster</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <span class="aa-product-view-price"></span>
                                            <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                        </div>

                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <a class="aa-add-to-cart-btn" href="/products/payment">Proses Pemesanan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
