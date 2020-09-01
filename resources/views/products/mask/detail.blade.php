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
                                            <img src="{{asset("storage/{$mask->image}")}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="aa-product-view-content">
                                    <h2>Detail Pemesanan</h2>
                                    <div class="aa-price-block">
                                        <label for="">Nama Produk:</label>
                                        <span class="aa-product-view-price"></span>{{$mask->title}}
                                    </div>

                                    <div class="aa-price-block">
                                        <label for="">Harga</label>
                                        <span class="aa-product-view-price"></span>{{$mask->price}} ,-
                                    </div>

                                    <div class="aa-price-block">
                                        <label for="">Ketersediaan barang:</label>
                                        <span class="aa-product-view-price"></span>{{$mask->status}}
                                    </div>

                                    <div class="aa-price-block">
                                        <label for="">Jenis Bahan:</label>
                                        <span class="aa-product-view-price"></span>{{$mask->material}}
                                    </div>
                                    <div class="aa-price-block">
                                        <label for="">Ukuran:</label>
                                        <span class="aa-product-view-price"></span>{{$mask->size}}
                                    </div>

                                    <form action="{{route('transaction.store')}}" method="POST">
                                        @csrf
                                        <div class="form-group col-md-2">
                                            <label for="">Jumlah:</label>
                                            <input type="text" class="form-control" name="quantity" required>
{{--                                            <input type="hidden" name="product_id" value="{{$product->id}}">--}}

                                        </div>
                                        <div class="aa-prod-view-bottom">
{{--                                            <a class="aa-add-to-cart-btn" href="/products/payment">Beli Sekarang</a>--}}
{{--                                            kasih {id}--}}
                                            <button type="submit" name="submit" class="aa-add-to-cart-btn">Beli Sekarang</button>
                                        </div>
                                    </form>



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
                                    {{$mask->description}}
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
