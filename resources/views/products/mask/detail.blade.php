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
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="aa-product-view-slider">
                                    <div id="demo-1" class="simpleLens-gallery-container">
                                        <div class="simpleLens-container">
                                            <img src="{{asset('img/category/mask.png')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="aa-product-view-content">
                                    <h2>Detail Pemesanan</h2>
{{--                                    @foreach($products as $product)--}}

                                    <div class="aa-price-block">
                                        <label for="">Nama Produk:</label>
                                        <span class="aa-product-view-price"></span> Masker sensi
                                    </div>

                                    <div class="aa-price-block">
                                        <label for="">Harga</label>
                                        <span class="aa-product-view-price"></span> ,-
                                    </div>

                                    <div class="aa-price-block">
                                        <label for="">Ketersediaan barang:</label>
                                        <span class="aa-product-view-price"></span> Tersedia
                                    </div>

                                    <div class="aa-price-block">
                                        <label for="">Jenis Bahan:</label>
                                        <span class="aa-product-view-price"></span> skuba
                                    </div>
                                    <div class="aa-price-block">
                                        <label for="">Ukuran:</label>
                                        <span class="aa-product-view-price"></span> All Size
                                    </div>

                                    <div class="aa-prod-view-bottom">
                                        <a class="aa-add-to-cart-btn" href="/products/payment">Beli Sekarang</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aa-product-details-bottom">
                        <ul class="nav nav-tabs" id="myTab2">
                            <li><a href="#description" data-toggle="tab">Deskripsi barang</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                <p>

                                </p>
                               </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
