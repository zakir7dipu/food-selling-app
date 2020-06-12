@extends('layouts.master-client')
@section('content')
    <!-- Banner Area Starts ok-->
    <section class="banner-area text-center">
        <div class="container">
            @if(auth()->user())
            <div class="row m-0 p-0">
                <button class="btn btn-sm btn-warning banner-area_edit_dtn"><i class="fa fa-edit"></i></button>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    @foreach($banner_first as $banner)
                    <h6>{{ $banner->meta_keyword_first }}</h6>
                    <h1>{!! $banner->meta_keyword_second !!}</h1>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Welcome Area Starts ok-->
    <section class="welcome-area section-padding2">
        <div class="container-fluid">
            <div class="row" id="about_us">
                <div class="col-md-6 align-self-center">
                    <div class="welcome-img">
                        @if(auth()->user())
                        <div class="row m-0 p-0">
                            <button class="btn btn-sm btn-warning welcome-area_img_edit_dtn"><i class="fa fa-edit"></i></button>
                        </div>
                        @endif
                        <img src="{{ asset('upload/images/banners/'.$welcome_area_image) }}" class="img-fluid" alt="Welcome Area Image">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    @if(auth()->user())
                    <div class="row m-0 p-0">
                        <button class="btn btn-sm btn-warning welcome-area_edit_dtn"><i class="fa fa-edit"></i></button>
                    </div>
                    @endif
                    <div class="welcome-text mt-5 mt-md-0">
                        @foreach($welcome_about as $about_us)
                        <h3>{!! $about_us->title !!}</h3>
                        <p class="pt-3">{!! $about_us->description !!}</p>
                        @endforeach
                        <a href="{{ route('menu') }}" class="template-btn mt-3">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- Food Area starts ok-->
    <section class="food-area section-padding">
        <div class="container">
            @if(auth()->user())
            <div class="row m-0 p-0">
                <button class="btn btn-sm btn-warning food-area_edit_dtn"><i class="fa fa-edit"></i></button>
            </div>
            @endif
            <div class="row">
                <div class="col-md-5">
                    <div class="section-top">
                        @foreach($food_about as $about_us)
                        <h3>{!! $about_us->title !!}</h3>
                        <p class="pt-3">{!! $about_us->description !!}</p>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <div class="col-md-4 col-sm-6">
                    <a href="javascript:void(0)" class="product-quick-view" id="{{ $product->id }}">
                        <div class="single-food">
                            <div class="food-img">
                                <img src="{{ asset('upload/images/product-images/'.$product->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="food-content">
                                <div class="d-flex justify-content-between">
                                    <h5>{{ $product->name }}</h5>
                                    <span class="style-change">{{ $product->price }}৳</span>
                                </div>
                                <p class="pt-3 text-black-50">{{ $product->description }}</p>

                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Food Area End -->

    <!-- Reservation Area Starts ok-->
    <div class="reservation-area section-padding text-center">
        <div class="container">
            @if(auth()->user())
            <div class="row m-0 p-0">
                <button class="btn btn-sm btn-warning reservation-area_edit_dtn"><i class="fa fa-edit"></i></button>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    @foreach($banner_second as $banner)
                    <h2>{!! $banner->meta_keyword_second !!}</h2>
                    <h4 class="mt-4">{{ $banner->meta_keyword_first }}</h4>
                    @endforeach
                    <a href="javascript:void(0)" class="template-btn template-btn2 mt-4">reservation</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation Area End -->

    <!-- Deshes Area Starts ok-->
{{--    <div class="deshes-area section-padding">--}}
{{--        <div class="container">--}}
{{--            @if(auth()->user())--}}
{{--            <div class="row m-0 p-0">--}}
{{--                <button class="btn btn-sm btn-warning deshes-area_edit_dtn"><i class="fa fa-edit"></i></button>--}}
{{--            </div>--}}
{{--            @endif--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="section-top2 text-center">--}}
{{--                        @foreach($deshes_about as $about)--}}
{{--                        <h3>{!! $about->title !!}</h3>--}}
{{--                        <p><i>{!! $about->description !!}</i></p>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-5 col-md-6 align-self-center">--}}
{{--                    <h1>01.</h1>--}}
{{--                    <div class="deshes-text">--}}
{{--                        <h3><span>Garlic</span><br> green beans</h3>--}}
{{--                        <p class="pt-3">Be. Seed saying our signs beginning face give spirit own beast darkness morning moveth green multiply she'd kind saying one shall, two which darkness have day image god their night. his subdue so you rule can.</p>--}}
{{--                        <span class="style-change">$12.00</span>--}}
{{--                        <a href="#" class="template-btn3 mt-3">book a table <span><i class="fa fa-long-arrow-right"></i></span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">--}}
{{--                    <img src="/client-assets/images/deshes1.png" alt="" class="img-fluid">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row mt-5">--}}
{{--                <div class="col-lg-5 col-md-6 align-self-center order-2 order-md-1 mt-4 mt-md-0">--}}
{{--                    <img src="/client-assets/images/deshes2.png" alt="" class="img-fluid">--}}
{{--                </div>--}}
{{--                <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center order-1 order-md-2">--}}
{{--                    <h1>02.</h1>--}}
{{--                    <div class="deshes-text">--}}
{{--                        <h3><span>Lemon</span><br> rosemary chicken</h3>--}}
{{--                        <p class="pt-3">Be. Seed saying our signs beginning face give spirit own beast darkness morning moveth green multiply she'd kind saying one shall, two which darkness have day image god their night. his subdue so you rule can.</p>--}}
{{--                        <span class="style-change">$12.00</span>--}}
{{--                        <a href="#" class="template-btn3 mt-3">book a table <span><i class="fa fa-long-arrow-right"></i></span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Deshes Area End -->
@endsection
@section('modal')


@endsection
