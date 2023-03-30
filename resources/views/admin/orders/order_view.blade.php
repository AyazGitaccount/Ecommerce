@extends('layouts.admin')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>
                        Orders
                    </h4>
                </div>
            </div>
            <div class="card-body" style="background-color: white;">
                <div class="shadow bg-white p-3">
                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> My Order Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-danger btn-sm float-end ms-1">Back</a>
                        <a href="{{ url('admin/invoice/'.$order->id) }}" class="btn btn-primary btn-sm float-end mx-1">Download inovice</a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/generate') }}" target='_blank' class="btn btn-warning btn-sm float-end me-1">View inovice</a>
                        <a href="{{ url('admin/invoice/'.$order->id.'/mail') }}" target='_blank' class="btn btn-info btn-sm float-end me-1">Send Inovice View Mail</a>
                    </h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order ID: {{ $order->id }}</h6>
                            <h6>Tracking Id/No.:{{ $order->tracking_id }}</h6>
                            <h6>Order Created: {{ $order->created_at->format('d-m-Y h:i A') }} </h6>
                            <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">Order Status Message: <span class="text-uppercase">{{
                                    $order->status_message }}</span> </h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $order->fullname }} </h6>
                            <h6>Email: {{ $order->email }}</h6>
                            <h6>Phone:{{ $order->phone}} </h6>
                            <h6>Address: {{ $order->address }}</h6>
                            <h6>Pin code: {{ $order->pincode }} </h6>
                        </div>
                    </div>
                    <br>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Item ID</th>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </thead>
                            <tbody>
                                @php
                                $total_Price =0;
                                @endphp
                                @foreach ($order->order_items as $items)
                                <tr>
                                    <td width="10%">{{ $items->id }}</td>
                                    <td width="10%">
                                        @if ($items->product->productImages)
                                        <img src="{{ asset($items->product->productImages[0]->image) }}"
                                            style="width: 50px; height: 50px" alt="">
                                        @endif

                                    </td>
                                    <td>
                                        {{ $items->product->name }}
                                        @if($items->productColor)
                                        @if ($items->productColor->color)
                                        <span>- Color : {{ $items->productColor->color->name }}</span>
                                        @endif
                                        @endif
                                    </td>
                                    <td width="10%">${{ $items->price }}</td>
                                    <td width="10%">{{ $items->quantity }}</td>
                                    <td width="10%" class="fw-bold">${{ $items->quantity * $items->price }}</td>
                                    @php
                                    $total_Price += $items->quantity * $items->price ;
                                    @endphp
                                </tr>
                                @endforeach
                                <td colspan="5" class="fw-bold">Total Price</td>
                                <td colspan="1" class="fw-bold">${{ $total_Price }}</td>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body">
                    <h4>Order Process (Order Status Updates)</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{ url('admin/orders/'.$order->id.'/update') }}" method="POST">
                                @csrf
                                @method('PUT')

                                <label> Update Your Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class='form-select'>
                                        <option value="">Select Order Status</option>
                                        <option value="in progress" {{ Request::get('status')=='in progress'
                                            ? 'selected' :'' }}>In progress</option>
                                        <option value="completed" {{ Request::get('status')=='completed' ? 'selected'
                                            :'' }}>Completed</option>
                                        <option value="pending" {{ Request::get('status')=='pending' ? 'selected' :''
                                            }}>Pending</option>
                                        <option value="cancelled" {{ Request::get('status')=='cancelled' ? 'selected'
                                            :'' }}>Cancelled</option>
                                        <option value="out-for-delivery" {{ Request::get('status')=='out-for-delivery'
                                            ? 'selected' :'' }}>Out for delivery</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary text-white">Update</button>

                                </div>
                            </form>
                        </div>
                        <div class="col-md-7">
                            <br>
                            <h4 class="mt-3">Current Order Status: <span class="text-uppercase">{{ $order->status_message }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection