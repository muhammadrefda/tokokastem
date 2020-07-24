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
                            <!-- Modal view content -->
                            <div class="col-md-12">
                                <div class="aa-product-view-content">
                                    <h2>Detail Pemesanan</h2>
                                    @foreach($products as $product)
                                    <div class="aa-price-block">
                                        <label for="">Harga</label>
                                        <span class="aa-product-view-price">{{$product->price}}</span> ,-
                                        <p class="aa-product-avilability">Avilability: <span>{{$product->status}}</span></p>
                                    </div>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Catatan</span>
                                        </div>
                                        <textarea class="form-control"  aria-label="With textarea" name="note" ></textarea>
                                    </div>

                                    <h4>Jenis Kain</h4>
                                    <div class="aa-prod-view-size">
                                        <a href="#">Drill</a>
                                        <a href="#">Denim</a>
                                        <a href="#">Linen</a>
                                    </div>
                                    <h4>Warna Kain</h4>
                                    <div class="aa-color-tag">
                                        <a href="#" class="aa-color-green"></a>
                                        <a href="#" class="aa-color-yellow"></a>
                                        <a href="#" class="aa-color-pink"></a>
                                        <a href="#" class="aa-color-black"></a>
                                        <a href="#" class="aa-color-white"></a>
                                    </div>
                                    <div class="aa-prod-quantity">
                                        <form action="">
                                            <label for="">Quantity</label>
                                            <select id="" name="size">
                                                <option value="All Size">All Size</option>
                                            </select>
                                        </form>
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
                            <li><a href="#description" data-toggle="tab">Description</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                <p></p>
                               </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
