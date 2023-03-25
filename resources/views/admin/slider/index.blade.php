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
                        Slider List
                        <a href="{{ url('admin/slider/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Slider</a>
                    </h4>
                </div>

                <div class="card-body" style="background-color: white;">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            @forelse ( $sliders as $slider )
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>
                                    {{ $slider->title }}
                                </td>
                                <td>{{ $slider->description }}</td>
                                <td> <img src="{{ asset("$slider->image")}}" alt="slider" style="width:70px;
                                    height:70px;"></td>
                                <td>{{ $slider->status == '1' ? 'Hidden':'Visible'}}</td>
                                <td>
                                    <a href="{{url('admin/slider/'.$slider->id.'/edit') }}"
                                        class="btn btn-success me-2 btn-sm">Edit</a>
                                    
                                    <a href="{{url('admin/slider/'.$slider->id.'/delete') }}"
                                        onclick="return confirm('Are your sure you want to delete this data ?')"
                                        class="btn btn-sm btn-danger m-2">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No Products Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection