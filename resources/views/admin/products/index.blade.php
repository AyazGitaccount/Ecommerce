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
                        Products
                        <a href="{{ url('admin/products/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Product</a>
                    </h4>
                </div>
            </div>
            <div class="card-body" style="background-color: white;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Name</th>
                            <th scope="col">Selling Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $products as $product )
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>
                                @if($product->category)
                                {{ $product->category->name }}
                                @else
                                No Category
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{ url('admin/products/'.$product->id.'/edit'  ) }}"  class="btn btn-success btn-sm m-2">Edit</a>
                                <a href="{{url('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are your sure you want to delete this data ?')" class="btn btn-sm btn-danger m-2">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No Products Available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{-- <div class="mt-2">
                    {{ $products->links() }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection