@extends('layouts.master-admin')
@section('content')
    <div class="container mt-5">
        <!-- Notification -->
        <div class="row">
            <div class="col-md-12">
                <!-- Success Message -->
                @if (session('message'))
                    <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">

                        {{ session('message') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fas fa-times"></i>
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
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <!-- end row -->
        <div class="row tm-content-row">
            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mx-auto tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">PRODUCT NAME</th>
                                <th scope="col">PRODUCT SKU</th>
                                <th scope="col">IN STOCK</th>
                                <th scope="col">UNIT PRICE</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row"><input type="checkbox" class="all_product_id" value="{{ $product->id }}" name="all_product_id"/></th>
                                <td class="tm-product-name"><a href="javascript:void(0)" class="product_edit_btn text-light" id="{{ $product->id }}">{{ $product->name }}</a></td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                                <td>
                                    <a href="javascript:void(0)" class="tm-product-delete-link" id="product_delete_btn">
                                        <i class="far fa-trash-alt tm-product-delete-icon" id="{{ $product->id }}"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->
                    <a href="{{ route('proudct.create') }}" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
                    <button class="btn btn-primary btn-block text-uppercase bulk_delete">
                        Delete selected products
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Edit Modal ok-->
    <div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="productEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-0 m-0">
                <div class="modal-body p-0 m-0">
                    <div class="container p-0 m-0">
                        <div class="row p-0 m-0">
                            <div class="col-12 p-0 m-0">
                                <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="tm-block-title d-inline-block">Update Product</h2>
                                        </div>
                                    </div>
                                    <div class="row tm-edit-product-row">
                                        <form action="" class="tm-edit-product-form col-12" method="post" enctype="multipart/form-data">
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
                                                    <div class="form-group">
                                                        <img class="product_image img-fluid" src="" alt="" style="width: 100%;">
                                                    </div>
                                                    <div class="input-field form-group">
                                                        <label for="product_image">Product Photo*</label>
                                                        <div class="edit-product-image bg-secondary" id="product_image" style="padding-top: .5rem;"></div>
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
                                                    <button type="submit" class="btn btn-primary btn-block text-uppercase">Update Product Now</button>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Edit Modal End -->
    <!-- Product Delete Modal ok-->
    <div class="modal fade" id="productDeleteCenter" tabindex="-1" role="dialog" aria-labelledby="productDeleteCenterCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Product Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="delete-form">
                    @csrf
                    <div class="modal-body">
                        <h5>Are You Sure! You Want To <span class="text-danger">Delete</span> This Product. ......</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Product Delete Modal End -->
    <!-- Product Bulk Delete Modal ok-->
    <div class="modal fade" id="productBulkDeleteCenter" tabindex="-1" role="dialog" aria-labelledby="productBulkDeleteCenterCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Products Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="bulk-delete-form">
                    @csrf
                    <div class="modal-body">
                        <h5>Are You Sure! You Want To <span class="text-danger">Delete</span> Those Products. ......</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger bulk-delete-ok">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Product Delete Modal End -->
@endsection
@section('script')
    <script>
        $(function () {
            $('.edit-product-image').imageUploader({
                imagesInputName: 'product_image',
                maxFiles: 1
            });

            $('.product_edit_btn').on('click',function () {
                var id = $(this).attr('id');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                   type:'Post',
                    url:'/proudct-edit',
                    data: {
                        'id': id
                    },
                    success: function (data) {
                        // console.log(data);
                        var product_name = data['data'][0].name;
                        var product_description = data['data'][0].description;
                        var product_price = data['data'][0].price;
                        var product_stock = data['data'][0].stock;
                        var product_image = data['data'][0].image;
                        var product_sku = data['data'][0].sku;

                        $('#name').val(product_name);
                        $('#description').val(product_description);
                        $('#price').val(product_price);
                        $('#stock').val(product_stock);
                        $('.product_image').attr('src','/upload/images/product-images/'+product_image)
                        $('#sku').val(product_sku);
                        $('.tm-edit-product-form').attr('action','/proudct-update/'+id);

                        $('#productEditModal').modal('show');
                    }
                });
            });

            $('#product_delete_btn').on('click',function () {
                var id = $(this).find('i').attr('id');

                $('.delete-form').attr('action','/proudct-destroy/'+id);

                $('#productDeleteCenter').modal('show');
            });

            $('.bulk_delete').on('click',function () {
                var ids = [];
                $.each($("input[name='all_product_id']:checked"), function () {
                    ids.push($(this).val());
                });
                $('#productBulkDeleteCenter').modal('show');

                $('.bulk-delete-ok').on('click', function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'Post',
                        url: '/proudcts-bulk-destroy',
                        data: {
                            'id': ids,
                        },
                        success: function (data) {
                            // console.log(data);

                        }
                    });
                });
            });
        });
    </script>
@endsection
