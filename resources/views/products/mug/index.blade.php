@extends('layouts.master')

@section('title','Homepage')

@section('populer')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h2> Kategori: Mug</h2>
                    <div class="aa-popular-category-area">
                        <!-- start prduct navigation -->

                        <br>
                        <div class="tab-content">
                            <!-- Start men popular category -->
                            <div class="tab-pane fade in active" id="popular">
                                <ul class="aa-product-catg">
                                    <!-- start single product item -->
                                    <li>
                                        <figure class="">
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-2.png" alt=""></a>
                                            <a class="aa-add-card-btn" href="/products"><span class=""></span>Masker</a>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt=""></a>
                                            <a class="aa-add-card-btn" href="/products"><span class=""></span>Tote bag</a>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt=""></a>
                                            <a class="aa-add-card-btn" href="/products"><span class=""></span>T-shirt</a>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-3.png" alt=""></a>
                                            <a class="aa-add-card-btn" href="/products"><span class=""></span>Mug</a>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-1.png" alt=""></a>
                                            <a class="aa-add-card-btn" href="/products"><span class=""></span>Tas</a>
                                        </figure>
                                    </li>
                                </ul>


                            </div>
                            <!-- / popular product category -->


                            <div class="tab-pane fade" id="featured">
                                <ul class="aa-product-catg aa-featured-slider">
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-2.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="/products"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-2.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                        </figure>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                        </figure>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                                            <span class="aa-product-price">$45.50</span>
                                        </figcaption>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-3.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-1.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-4.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-hot" href="#">HOT!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-4.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-hot" href="#">HOT!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-1.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                                    </li>
                                </ul>
                                <a class="aa-browse-btn" href="#">Custom Product Now<span class="fa fa-long-arrow-right"></span></a>
                            </div>


                            <!-- start latest product category -->
                            <div class="tab-pane fade" id="latest">
                                <ul class="aa-product-catg aa-latest-slider">
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-2.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-2.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                                                <span class="aa-product-price">$45.50</span>
                                            </figcaption>
                                        </figure>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/t-shirt-1.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                        </figure>
                                        <figcaption>
                                            <h4 class="aa-product-title"><a href="#">T-Shirt</a></h4>
                                            <span class="aa-product-price">$45.50</span>
                                        </figcaption>
                                        <!-- product badge -->
                                        <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-3.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>

                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-1.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>

                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-4.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Lorem ipsum doller</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>

                                        <!-- product badge -->
                                        <span class="aa-badge aa-hot" href="#">HOT!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/man/polo-shirt-4.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">Polo T-Shirt</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>

                                        <!-- product badge -->
                                        <span class="aa-badge aa-hot" href="#">HOT!</span>
                                    </li>
                                    <!-- start single product item -->
                                    <li>
                                        <figure>
                                            <a class="aa-product-img" href="#"><img src="img/women/girl-1.png" alt="polo shirt img"></a>
                                            <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Checkout</a>
                                            <figcaption>
                                                <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                                                <span class="aa-product-price">$45.50</span><span
                                                    class="aa-product-price"><del>$65.50</del></span>
                                            </figcaption>
                                        </figure>

                                        <!-- product badge -->
                                        <span class="aa-badge aa-sale" href="#">SALE!</span>
                                    </li>
                                </ul>
                                <a class="aa-browse-btn" href="#">Custom Product Now<span class="fa fa-long-arrow-right"></span></a>

                            </div>
                            <!-- / latest product category -->
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


