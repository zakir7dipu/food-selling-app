@extends('layouts.master-admin')
@section('content')
<div class="container-fluid">
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
    <div class="row m-5">
        <div class="col">
            <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
            <span class="text-light"><div class="tm-status-circle"></div><b>ORDER STATUS:</b> <br><div class="tm-status-circle pending"></div> Pending<br><div class="tm-status-circle moving"></div> Moving<br><div class="tm-status-circle cancelled"></div> Cancelled</span>
        </div>
    </div>
    <!-- row -->
    <div class="row tm-content-row m-5">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Orders List</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ORDER NO.</th>
                        <th scope="col">ORDER ITEM</th>
                        <th scope="col">ORDER QTY</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">OPERATORS</th>
                        <th scope="col">LOCATION</th>
                        <th scope="col">DESTINATION</th>
                        <th scope="col">PHONE NUMBER</th>
                        <th scope="col">START DATE</th>
                        <th scope="col">ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <th scope="row">
                            @if($order->approval == null)
                                <div class="tm-status-circle pending">
                                </div>
                            @elseif($order->approval == 1)
                                <div class="tm-status-circle moving">
                                </div>
                            @else
                                <div class="tm-status-circle cancelled">
                                </div>
                            @endif
                            <b>{{ $order->order_no }}</b>
                        </th>
                        <td><b>{{ $order->product_name }}</b></td>
                        <td><b>{{ $order->order_qty }}</b></td>
                        <td><b>{{ $order->order_amount }}</b></td>
                        <td><b>{{ $order->name }}</b></td>
                        <td><b>{{ $order->country }}, {{ $order->district }}, {{ $order->thana }}</b></td>
                        <td><b>{{ $order->home }}</b></td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ date("d/m/Y", strtotime($order->created_at)) }}<br>{{'('.date("l", strtotime($order->created_at)).')' }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm action_btn" id="{{ $order->id }}">Action</button></td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- approval modal -->
<div class="modal fade" id="approvalAddModal" tabindex="-1" role="dialog" aria-labelledby="approvalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #435c70">
            <div class="modal-header">
                <h5 class="modal-title text-light" id="exampleModalLabel">Approve Your Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" class="approval-form">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="approval">Approval</label>
                        <select class="form-control" name="approval" id="approval">
                            <option value="" selected disabled>Select One</option>
                            <option value="1">Approve</option>
                            <option value="2">Cancel</option>
                            <option value="3">Delete</option>
                        </select>
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
<!-- approval modal end -->

@endsection
@section('script')
    <script>
        $(function () {
            $('.action_btn').on('click',function () {
                var id = $(this).attr('id');
                $('.approval-form').attr('action','/order-approve/'+id);
                $("#approvalAddModal").modal('show');
            })
        })
    </script>
@endsection
