@extends('layouts.master')

@section('title','Homepage')

@section('populer')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h2> Kategori: Tote Bag</h2>
                    <div class="aa-popular-category-area">
                        <!-- start prduct navigation -->
                        <br>
                        <div class="tab-content">
                            <!-- Start men popular category -->
                            <div class="tab-pane fade in active" id="popular">
                                <ul class="aa-product-catg">
                                    <!-- start single product item -->
                                    @foreach($totebags as $totebag)
                                        <li>
                                            <figure class="">
                                                <a class="aa-product-img" href="#"><img src="{{asset("storage/{$totebag->image}")}}" ></a>
                                                <a class="aa-add-card-btn" href="{{route('totebag.detail',$totebag->id)}}"><span class=""></span>{{$totebag->title}}</a>
                                            </figure>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- / popular product category -->
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


