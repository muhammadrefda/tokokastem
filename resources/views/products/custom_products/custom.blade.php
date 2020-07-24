@extends('layouts.master')
@section('title','custom product')
@section('content')
    <section id="aa-catg-head-banner">
        <img src="{{asset('img/fashion/fashion-header-bg-8.jpg')}}" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Custom Product mu disini</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Subscribe section -->
    <section id="aa-subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-subscribe-area">
                        <h3>Masukkan link google drive desain kalian disini  </h3>
                        <form action="" class="aa-subscribe-form">
                            <input type="email" name="" id="">
                            <input type="submit" value="Kirim">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Subscribe section -->
@endsection
