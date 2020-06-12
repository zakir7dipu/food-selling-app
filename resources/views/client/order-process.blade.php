@extends('layouts.master-client')
@section('content')
    <section class="section-padding">
        <div class="container">
            <!-- Notification -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Success Message -->
                    @if (session('message'))
                        <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">

                            {{ session('message') }}

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    @endif
                <!-- Error Message -->
                    @if ($errors->any())
                        <div class="alert border-0 alert-danger m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="card col-lg-6 col-md-6 col-sm-12 m-1">
                    <div class="card-body">
                        <form action="{{ route('order-store') }}" method="post" class="col-12">
                            @csrf
                            <div class="form-group">
                                <span class="h3 text-dark">Order No: {{ $order_no }}</span>
                            </div>
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input class="form-control" type="text" name="name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone*</label>
                                <input class="form-control" type="number" name="phone" id="phone">
                            </div>
                            <div class="form-group">
                                <label for="country">Shipping Country*</label>
                                <select class="form-control" name="country" id="country">
                                    <option value="" selected disabled>Select A Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{ $country->name }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="district">Shipping District*</label>
                                <select class="form-control" name="district" id="district">
                                    <option value="" selected disabled>Select A District</option>
                                    @foreach($districts as $district)
                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="thana">Shipping Thana*</label>
                                <select class="form-control" name="thana" id="thana">
                                    <option value="" selected disabled>Select A Thana</option>
                                    @foreach($thanas as $thana)
                                    <option value="{{ $thana->name }}">{{ $thana->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="home">Shipping Address*</label>
                                <input class="form-control" type="text" name="home" id="home">
                            </div>
                            <input type="hidden" name="product_name" value="{{ $product_name }}">
                            <input type="hidden" name="product_image" value="{{ $product_image }}">
                            <input type="hidden" name="product_sku" value="{{ $product_sku }}">
                            <input type="hidden" name="order_number" value="{{ $order_no }}">
                            <input type="hidden" name="order_amount" value="{{ $product_total }}">
                            <input type="hidden" name="order_qty" value="{{ $product_qty }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card col-lg-5 col-md-5 col-sm-12 m-1">
                    <div class="card-body">
                        <div class="row">
                            <img class="order_product_image" src="{{ asset('upload/images/product-images/'.$product_image) }}" alt="" style="width: 100%">
                        </div>
                        <div class="row mt-2">
                            <h4 class="order_product_name text-dark h3">{{ $product_name }}</h4>
                        </div>
                        <div class="row">
                            <h6 class="order_product_qty text-dark h6">Quantity: {{ $product_qty }}</h6>
                        </div>
                        <div class="row">
                            <h6 class="order_product_price text-danger h6">Price: {{ $product_price }}৳</h6>
                        </div>
                        <div class="row">
                            <span class="h4">Total Amount: </span><span class="h4">{{ $product_total }}৳</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
