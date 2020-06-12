@extends('layouts.master-admin')
@section('content')
    <div class="container tm-mt-big tm-mb-big">
        <!-- Notification -->
        <div class="row">
            <div class="col-md-12">
                <!-- Success Message -->
                @if (session('message'))
                    <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">

                        {{ session('message') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ti ti-close"></i>
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
                            <i class="ti ti-close"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="tm-block-title d-inline-block">Add Product</h2>
                        </div>
                    </div>
                    <div class="row tm-edit-product-row">
                        <form action="{{ route('proudct.store') }}" class="tm-edit-product-form col-12" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group mb-3">
                                        <label
                                            for="name"
                                        >Product Name*
                                        </label>
                                        <input
                                            id="name"
                                            name="name"
                                            type="text"
                                            class="form-control validate"
                                            required
                                        />
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="description"
                                        >Description*</label
                                        >
                                        <textarea
                                            class="form-control validate"
                                            rows="3"
                                            required
                                            name="description"
                                            id="description"
                                            required
                                        ></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="price"
                                        >Price*</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control validate"
                                            name="price"
                                            id="price"
                                            required
                                        >
                                    </div>
                                    <div class="form-group mb-3">
                                        <label
                                            for="stock"
                                        >Units In Stock*
                                        </label>
                                        <input
                                            id="stock"
                                            name="stock"
                                            type="text"
                                            class="form-control validate"
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                                    <div class="input-field form-group">
                                        <label for="product_image">Product Photo*</label>
                                        <div class="input-product-image bg-secondary" id="product_image" style="padding-top: .5rem;"></div>
                                    </div>
                                    <div class="form-group my-2 mb-3">
                                        <label
                                            for="sku"
                                        >Product SKU*
                                        </label>
                                        <input
                                            id="sku"
                                            name="sku"
                                            type="text"
                                            class="form-control validate"
                                            required
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $('.input-product-image').imageUploader({
                imagesInputName: 'product_image',
                maxFiles: 1
            });
        });
    </script>
@endsection
