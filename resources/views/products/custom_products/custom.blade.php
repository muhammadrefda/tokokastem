@extends('layouts.master')
@section('title','custom kain')
@section('content')
{{--    <section id="aa-catg-head-banner">--}}
{{--        <div class="aa-catg-head-banner-area">--}}
{{--            <div class="container">--}}
{{--                <div class="aa-catg-head-banner-content">--}}
{{--                    <h2>Custom Product mu disini</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- Subscribe section -->
    <section id="aa-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <div class="aa-subscribe-area">
                            <form action="" class="aa-login-form">
                                <label for="">Masukkan link google drive desain kamu disini<span>*</span></label>
                                <input type="text" placeholder="link google drive">
                                <label for="">Pilih Jenis Kain</label>
                                <label>
                                    <select class="form-control" name="jenis_kain">
                                        <option value="All Size">jeans</option>
                                        <option value="S">cotton</option>
                                        <option value="L">scuba</option>
                                        <option value="M">satin</option>
                                        <option value="XL">kanvas</option>
                                    </select>
                                </label>
                                <label for="">Ukuran</label>
                                <label for="">panjang</label>
                                <input type="text" placeholder="panjang kain dalam cm">
                                <label for="">lebar</label>
                                <input type="text" placeholder="lebar kain dalam cm">
                                <label for="">Catatan Untuk Admin</label>
                                <textarea name="" id=""  ></textarea>
                                <br>
                                <button type="submit" class="aa-browse-btn">Pesan Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- / Subscribe section -->
@endsection
