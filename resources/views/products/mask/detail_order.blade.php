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
                                <form action="{{route('mask.store.detail.order')}}" method="POST" class="aa-subscribe-form" enctype="multipart/form-data">
                                    @csrf
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="form-group">
                                                <label>Jumlah Pesanan</label>
                                                <span class="aa-product-view-price"></span>
                                                <input type="text" class="form-control" name="quantity" required placeholder="minimal 1">
                                            </div>
                                            <div class="form-group">
                                                <label>Design masker</label>

                                                <span class="aa-product-view-price"></span>
                                                <input type="file" class="form-control" name="design_right_mask"  required>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="category" value="Masker">
                                                <input type="hidden" class="form-control" name="status" value="pending">
                                            </div>
                                </div>
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="aa-product-view-content">
                                        <div class="form-group">
                                            <label>Ukuran</label>
                                            <span class="aa-product-view-price"></span>
                                            <select class="form-control" name="size" required>
                                                <option value="All Size">All Size</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Bahan</label>
                                            <span class="aa-product-view-price"></span>
                                            <select class="form-control" id="exampleFormControlSelect1" name="material">
                                                <option value="Scuba">Scuba</option>
                                                <option value="Cotton">Cotton</option>
                                                <option value="Flanel">Flanel</option>
                                                <option value="Polyster">Polyster</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Catatan</label>
                                            <span class="aa-product-view-price"></span>
                                            <textarea class="form-control" name="note" id="" cols="30" rows="10" ></textarea>
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
