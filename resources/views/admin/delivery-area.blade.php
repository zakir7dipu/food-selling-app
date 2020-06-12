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
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mx-auto tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">Country</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $country)
                            <tr>
                                <th scope="row"><input type="checkbox" class="all_country_id" value="{{ $country->id }}" name="all_country_id"/></th>
                                <td class="tm-product-name">{{ $country->name }}</td>

                                <td>
                                    <a href="javascript:void(0)" class="tm-product-delete-link" id="country_delete_btn">
                                        <i class="far fa-trash-alt tm-product-delete-icon" id="{{ $country->id }}"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->
                    <a href="javascript:void(0)" class="btn btn-primary btn-block text-uppercase mb-3 add_new_country_btn">Add new Country</a>
                    <button class="btn btn-primary btn-block text-uppercase country_bulk_delete">
                        Delete selected Countries
                    </button>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mx-auto tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">District</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($districts as $district)
                            <tr>
                                <th scope="row"><input type="checkbox" class="all_district_id" value="{{ $district->id }}" name="all_district_id"/></th>
                                <td class="tm-product-name">{{ $district->name }}</td>

                                <td>
                                    <a href="javascript:void(0)" class="tm-product-delete-link" id="district_delete_btn">
                                        <i class="far fa-trash-alt tm-product-delete-icon" id="{{ $district->id }}"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->
                    <a href="javascript:void(0)" class="btn btn-primary btn-block text-uppercase mb-3 add_new_district_btn">Add new District</a>
                    <button class="btn btn-primary btn-block text-uppercase district_bulk_delete">
                        Delete selected Districts
                    </button>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mx-auto tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <div class="tm-product-table-container">
                        <table class="table table-hover tm-table-small tm-product-table">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Thana</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($thanas as $thana)
                            <tr>
                                <th scope="row"><input type="checkbox" class="all_thana_id" value="{{ $thana->id }}" name="all_thana_id"/></th>
                                <td class="tm-product-name">{{ $thana->name }}</td>

                                <td>
                                    <a href="javascript:void(0)" class="tm-product-delete-link" id="thana_delete_btn">
                                        <i class="far fa-trash-alt tm-product-delete-icon" id="{{ $thana->id }}"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- table container -->
                    <a href="javascript:void(0)" class="btn btn-primary btn-block text-uppercase mb-3 add_new_thana_btn">Add new Thana</a>
                    <button class="btn btn-primary btn-block text-uppercase thana_bulk_delete">
                        Delete selected Thanas
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- country add Modal ok-->
    <div class="modal fade" id="countryAddModal" tabindex="-1" role="dialog" aria-labelledby="ecountryAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #435c70">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Add New Country</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delivery-countrystore') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="country_name">Country Name</label>
                            <input class="form-control" type="text" name="country_name" id="country_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- country add Modal End -->
    <!-- district add Modal ok-->
    <div class="modal fade" id="districtAddModal" tabindex="-1" role="dialog" aria-labelledby="districtAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #435c70">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Add New District</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delivery-districtstore') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="district_name">District Name</label>
                            <input class="form-control" type="text" name="district_name" id="district_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- district add Modal End -->
    <!-- thana add Modal ok-->
    <div class="modal fade" id="thanaAddModal" tabindex="-1" role="dialog" aria-labelledby="thanaAddLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background-color: #435c70">
                <div class="modal-header">
                    <h5 class="modal-title text-light" id="exampleModalLabel">Add New Thana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('delivery-thanastore') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="thana_name">Thana Name</label>
                            <input class="form-control" type="text" name="thana_name" id="thana_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- thana add Modal End -->
    <!-- country Delete Modal ok-->
    <div class="modal fade" id="countryDeleteCenter" tabindex="-1" role="dialog" aria-labelledby="countryDeleteCenterCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Country Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="delete-country-form">
                    @csrf
                    <div class="modal-body">
                        <h5>Are You Sure! You Want To <span class="text-danger">Delete</span> This Country. ......</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- country Delete Modal End -->
    <!-- district Delete Modal ok-->
    <div class="modal fade" id="districtDeleteCenter" tabindex="-1" role="dialog" aria-labelledby="districtDeleteCenterCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">District Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="delete-district-form">
                    @csrf
                    <div class="modal-body">
                        <h5>Are You Sure! You Want To <span class="text-danger">Delete</span> This District. ......</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- district Delete Modal End -->
    <!-- thana Delete Modal ok-->
    <div class="modal fade" id="thanaDeleteCenter" tabindex="-1" role="dialog" aria-labelledby="thanaDeleteCenterCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thana Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" class="delete-thana-form">
                    @csrf
                    <div class="modal-body">
                        <h5>Are You Sure! You Want To <span class="text-danger">Delete</span> This Thana. ......</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- district Delete Modal End -->
    <!-- country Bulk Delete Modal ok-->
    <div class="modal fade" id="countryBulkDeleteCenter" tabindex="-1" role="dialog" aria-labelledby="countryBulkDeleteCenterCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Countries Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @csrf
                    <div class="modal-body">
                        <h5>Are You Sure! You Want To <span class="text-danger">Delete</span> those Countries. ......</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger country-bulk-delete-ok" data-dismiss="modal">Yes</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- country Delete Modal End -->
    <!-- district Bulk Delete Modal -->
    <div class="modal fade" id="districtBulkDeleteCenter" tabindex="-1" role="dialog" aria-labelledby="districtBulkDeleteCenterCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Districts Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @csrf
                    <div class="modal-body">
                        <h5>Are You Sure! You Want To <span class="text-danger">Delete</span> those Districts. ......</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger district-bulk-delete-ok" data-dismiss="modal">Yes</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- country Delete Modal End -->
    <!-- district Bulk Delete Modal -->
    <div class="modal fade" id="thanaBulkDeleteCenter" tabindex="-1" role="dialog" aria-labelledby="thanaBulkDeleteCenterCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Thanas Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @csrf
                    <div class="modal-body">
                        <h5>Are You Sure! You Want To <span class="text-danger">Delete</span> those Thanas. ......</h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                        <button type="submit" class="btn btn-danger thana-bulk-delete-ok" data-dismiss="modal">Yes</button>
                    </div>
            </div>
        </div>
    </div>
    <!-- country Delete Modal End -->
@endsection
@section('script')
    <script>
        $(function () {
            $('.add_new_country_btn').on('click',function () {
                $('#countryAddModal').modal('show');
            });

            $('.add_new_district_btn').on('click',function () {
                $('#districtAddModal').modal('show');
            });

            $('.add_new_thana_btn').on('click',function () {
                $('#thanaAddModal').modal('show');
            });

            $('#country_delete_btn').on('click',function () {
                var id = $(this).find('i').attr('id');

                $('.delete-country-form').attr('action','/delivery-countrydestroy/'+id);

                $('#countryDeleteCenter').modal('show');
            });

            $('#district_delete_btn').on('click',function () {
                var id = $(this).find('i').attr('id');

                $('.delete-district-form').attr('action','/delivery-districtdestroy/'+id);

                $('#districtDeleteCenter').modal('show');
            });

            $('#thana_delete_btn').on('click',function () {
                var id = $(this).find('i').attr('id');

                $('.delete-thana-form').attr('action','/delivery-thanadestroy/'+id);

                $('#thanaDeleteCenter').modal('show');
            });

            $('.country_bulk_delete').on('click',function () {
                var ids = [];
                $.each($("input[name='all_country_id']:checked"), function () {
                    ids.push($(this).val());
                });
                $('#countryBulkDeleteCenter').modal('show');

                $('.country-bulk-delete-ok').on('click', function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'Post',
                        url: '/countrybulkdestroy',
                        data: {
                            'id': ids,
                        },
                        success: function (data) {
                            // console.log(data);
                            window.location.replace('/delivery-area');
                        }
                    });
                });
            });

            $('.district_bulk_delete').on('click',function () {
                var ids = [];
                $.each($("input[name='all_district_id']:checked"), function () {
                    ids.push($(this).val());
                });
                $('#districtBulkDeleteCenter').modal('show');

                $('.district-bulk-delete-ok').on('click', function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'Post',
                        url: '/districtbulkdestroy',
                        data: {
                            'id': ids,
                        },
                        success: function (data) {
                            // console.log(data);
                            window.location.replace('/delivery-area');
                        }
                    });
                });
            });

            $('.thana_bulk_delete').on('click',function () {
                var ids = [];
                $.each($("input[name='all_thana_id']:checked"), function () {
                    ids.push($(this).val());
                });
                $('#thanaBulkDeleteCenter').modal('show');

                $('.thana-bulk-delete-ok').on('click', function () {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: 'Post',
                        url: '/thanabulkdestroy',
                        data: {
                            'id': ids,
                        },
                        success: function (data) {
                            // console.log(data);
                            window.location.replace('/delivery-area');
                        }
                    });
                });
            });
        });
    </script>
@endsection
