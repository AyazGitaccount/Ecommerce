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
                
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <label for="">Filter by Date</label>
                            <input type="date" name="date" value="{{Request::get('date') ?? date('Y-m-d') }}" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Filter by Status</label>
                           <select name="status" class="form-select">
                            <option value="">Select All Status</option>
                            <option value="in progress" {{ Request::get('status')=='in progress' ? 'selected':'' }}>In progress</option>
                            <option value="completed" {{ Request::get('status')=='completed' ? 'selected':'' }}>Completed</option>
                            <option value="pending"{{ Request::get('status')=='pending' ? 'selected':'' }}>Pending</option>
                            <option value="cancelled"{{ Request::get('status')=='cancelled' ? 'selected':'' }}>Cancelled</option>
                            <option value="out-for-delivery"{{ Request::get('status')=='out-for-delivery' ? 'selected':'' }}>Out for delivery</option>
                           </select>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
               <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Order ID</th>
                            <th>Tracking NO</th>
                            <th>Username</th>
                            <th>Payment Mode</th>
                            <th>Ordered Date</th>
                            <th>Status Message</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->tracking_no }}</td>
                                <td>{{ $order->fullname }}</td>
                                <td>{{ $order->payment_mode }}</td>
                                <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                <td>{{ $order->status_message }}</td>
                                <td><a href="{{ url('/admin/orders/'.$order->id) }}"
                                        class="btn btn-primary btn-sm ms-3">View</a></td>
                            </tr>
                            @empty
                            <tr colspan="7">
                                No Orders available
                            </tr>
                            @endforelse


                        </tbody>
                    </table>
                    <div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection