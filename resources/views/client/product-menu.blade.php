@extends('layouts.master-client')
@section('content')
    <!-- Banner Area Starts -->
    <section class="banner-area2 menu-bg text-center">
        <div class="container">
            @include('layouts.client-navbar')
            @if(auth()->user())
                <div class="row m-0 p-0">
                    <button class="btn btn-sm btn-warning banner-area2_edit_dtn"><i class="fa fa-edit"></i></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <h1><i>Our Menu</i></h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Food Area starts -->
    <section class="food-area section-padding">
        <div class="container">
            <div class="row">
                    @foreach($products as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="single-food mt-5 mt-sm-0">
                        <a href="javascript:void(0)" class="product-quick-view" id="{{ $product->id }}">
                            <div class="food-img">
                                <img src="{{ asset('upload/images/product-images/'.$product->image) }}" class="img-fluid" alt="">
                            </div>
                            <div class="food-content">
                                <div class="d-flex justify-content-between">
                                    <h5>{{ $product->name }}</h5>
                                    <span class="style-change">{{ $product->price }}৳</span>
                                </div>
                                <p class="pt-3">{{ $product->description }}</p>
                            </div>
                        </a>
                    </div>
                </div>
                    @endforeach
            </div>
            <div class="row mx-1 my-5 float-right">
                {{ $products->links() }}
            </div>
        </div>
    </section>
    <!-- Food Area End -->
@endsection
