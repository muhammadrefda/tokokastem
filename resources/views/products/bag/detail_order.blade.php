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
                                <form action="{{route('bagpack.store.detail.order')}}" method="POST" class="aa-subscribe-form" enctype="multipart/form-data">
                                    @csrf
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="form-group">
                                                <label>Jumlah Pesanan</label>
                                                <span class="aa-product-view-price"></span>
                                                <input type="text" class="form-control" name="quantity" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Design Tas</label>
                                                <span class="aa-product-view-price"></span>
                                                <input type="file" class="form-control" name="design_backpack" required>
                                            </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="category" value="Tas">
                                        <input type="hidden" class="form-control" name="status" value="pending">
                                    </div>
                                </div>

                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <div class="form-group">
                                            <label>Ukuran</label>
                                            <span class="aa-product-view-price"></span>
                                            <select class="form-control" name="size">
                                                <option value="All Size">All Size</option>
                                            </select>
                                        </div>

{{--                                        <div class="form-group">--}}
{{--                                            <label>Harga Satuan</label>--}}
{{--                                            <span class="aa-product-view-price"></span>--}}
{{--                                            <input type="text" class="form-control" value="Rp 50.000,-" disabled>--}}
{{--                                        </div>--}}

                                        <div class="form-group">
                                            <label>Jenis Bahan</label>
                                            <span class="aa-product-view-price"></span>
                                            <select class="form-control" name="material">
                                                <option value="Cotton">Cotton</option>
                                                <option value="Flanel">Flanel</option>
                                                <option value="Polyster">Polyster</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <span class="aa-product-view-price"></span>
                                            <textarea class="form-control" name="note" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="col-md-10 col-sm-10 col-xs-12">
                                            <input type="submit" name="submit" value="proses pesanan" class="aa-add-to-cart-btn">
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
