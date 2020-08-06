@extends('layouts.master')

@section('title','Homepage')

@section('slider')
    <div class="aa-slider-area">
        <div id="sequence" class="seq">
            <div class="seq-screen">
                <ul class="seq-canvas">
                    <!-- single slide item -->
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_tshirt.png')}}" alt="tshirt" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>TSHIRT</span>
                            <h2 data-seq>Disc up to 40%</h2>
{{--                            <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>--}}
                        </div>
                    </li>
                    <!-- single slide item -->
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_mug.png')}}" alt="mug" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>MUG</span>
                            <h2 data-seq>Disc up to 70%</h2>
{{--                            <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>--}}
                        </div>
                    </li>
                    <!-- single slide item -->
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_totebag.png')}}" alt="totebag" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>TOTEBAG</span>
                            <h2 data-seq>Disc up to 50%</h2>
                        </div>
                    </li>
                    <!-- single slide item -->
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_mask.png')}}" alt="mask" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>MASKER</span>
                            <h2 data-seq>Save Up to 75% Off</h2>
{{--                            <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>--}}
                        </div>
                    </li>
                    <!-- single slide item -->
                    <li>
                        <div class="seq-model">
                            <img data-seq src="{{asset('img/slider/banner_bag.png')}}" alt="bag" />
                        </div>
                        <div class="seq-title">
                            <span data-seq>TAS</span>
                            <h2 data-seq>Save Up to 80% Off</h2>
{{--                            <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>--}}
                        </div>
                    </li>
                </ul>
            </div>
            <!-- slider navigation btn -->
            <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
            </fieldset>
        </div>
    </div>
@endsection

@section('populer')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                        <!-- start prduct navigation -->

                        <!-- Tab panes -->
                        <br>
                        <br>
                        <div class="tab-content">
                            <!-- Start men popular category -->
                            <div class="tab-pane fade in active" id="popular">
                                <ul class="aa-product-catg">
                                    <!-- start single product item -->
                                    <li>
                                        <figure class="">
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/mask.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('mask.index')}}"><span class=""></span>Masker</a>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/totebag.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('totebag.index')}}"><span class=""></span>Tote bag</a>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/tshirt.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('tshirt.index')}}"><span class=""></span>T-shirt</a>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/mug.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('mug.index')}}"><span class=""></span>Mug</a>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="{{asset('img/category/bag.png')}}" alt=""></a>
                                            <a class="aa-add-card-btn" href="{{route('bagpack.index')}}"><span class=""></span>Tas</a>
                                        </figure>
                                    </li>
                                </ul>
                            </div>
                            <!-- / popular product category -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="aa-popular-category-area">
                            <h2 class="text-center">CUSTOM PRODUK DISINI</h2>
                        </div>
                    <br>
                    <div class="text-center">

                        <a class="aa-browse-btn " href="/products/">Custom Product Now! <span class=""></span></a>

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


