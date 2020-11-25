@extends('layouts.master')
@section('title','custom kain')
@section('content')
    <!-- Subscribe section -->
    <section id="aa-subscribe">
        <div class="container">
            <div class="row">
                <form action="{{route('fabric.store.detail.order')}}" method="POST" class="aa-login-form">
                    @csrf
                <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="aa-product-view-content">
                            <div class="form-group">
                                <label>Jumlah Pesanan</label>
                                <span class="aa-product-view-price"></span>
                                <input type="text" class="form-control" name="quantity" placeholder="minimal 1" required>
                            </div>
                            <div class="form-group">
                                    <label>Masukkan link google drive desain kamu disini</label>
                                    <span class="aa-product-view-price"></span>
                                    <input type="text" class="form-control" name="link_goggle_drive" placeholder="link google drive" required>
                            </div>
                            <div class="form-group">
                                <span class="aa-product-view-price"></span>
                                <input type="hidden" class="form-control" name="category" value="Kain">
                            </div>
                            <div class="form-group">
                                <label>Pilih Jenis Kain</label>
                                <span class="aa-product-view-price"></span>
                                <select class="form-control" name="type_fabric">
                                    <option value="jeans">jeans</option>
                                    <option value="cotton">cotton</option>
                                    <option value="scuba">scuba</option>
                                    <option value="satin">satin</option>
                                    <option value="kanvas">kanvas</option>
                                </select>
                            </div>

                        </div>
                    </div>

                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="form-group">
                        <span class="aa-product-view-price"></span>
                        <input type="hidden" class="form-control" name="status" value="pending">
                    </div>
                    <div class="form-group">
                        <label>Catatan Untuk Admin</label>
                        <span class="aa-product-view-price"></span>
                        <textarea class="form-control" id="" cols="30" rows="10" name="note"></textarea>
                    </div>
                    <input type="submit" name="submit" value="proses pesanan" class="aa-add-to-cart-btn">
                </div>
                </form>
            </div>
            </div>
    </section>
    <!-- / Subscribe section -->
@endsection
