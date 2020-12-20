@extends('layouts.master')
@section('title','Homepage')
@section('slider')
    <div class="aa-slider-area">
        <div id="sequence" class="seq">
            <div class="seq-screen">
                <ul class="seq-canvas">
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_tshirt.png')}}" alt="tshirt" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>TSHIRT</span>
                            <h2 data-seq>Disc up to 40%</h2>
                        </div>
                    </li>
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_mug.png')}}" alt="mug" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>MUG</span>
                            <h2 data-seq>Disc up to 70%</h2>
                        </div>
                    </li>
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_totebag.png')}}" alt="totebag" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>TOTEBAG</span>
                            <h2 data-seq>Disc up to 50%</h2>
                        </div>
                    </li>
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_mask.png')}}" alt="mask" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>MASKER</span>
                            <h2 data-seq>Save Up to 75% Off</h2>
                        </div>
                    </li>
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_bag.png')}}" alt="bag" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>TAS</span>
                            <h2 data-seq>Save Up to 80% Off</h2>
                        </div>
                    </li>
                </ul>
            </div>
            <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
            </fieldset>
        </div>
    </div>
@endsection

@section('populer')
    <section id="aa-client-brand">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="aa-custom-category-area">
                    <h2 class="text-center">CUSTOM PRODUK DISINI</h2>
                </div>
                <br>
                <br>
                <br>
                <div class="text-center" >
                    <a class="aa-browse-btn " href="{{route('fabric.create.detail.order')}}">Custom Produkmu Sekarang!</a>
                </div>
                <br>
                <br>
                <br>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                        <br>
                        <br>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="popular">
                                <ul class="aa-product-catg" >
                                    <li>
                                        <figure class="">
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/mask.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('mask.design')}}"><span class=""></span>Masker</a>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/totebag.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('totebag.design.front')}}"><span class=""></span>Tote bag</a>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/tshirt.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('tshirt.design.front')}}"><span class=""></span>T-shirt</a>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/mug.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('mug.design.front')}}"><span class=""></span>Mug</a>
                                        </figure>
                                    </li>
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/bag.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('bagpack.design')}}"><span class=""></span>Tas</a>
                                        </figure>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('support1')
@endsection

@section('support2')
@endsection
