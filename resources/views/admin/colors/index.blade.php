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
                        Colors List
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm float-end">Add
                            Add colors</a>
                    </h4>
                </div>
            </div>
            <div class="card-body" style="background-color: white;">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Color Name</th>
                            <th scope="col">Color Code</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $color )
                        <tr>
                            <th scope="row">{{ $color->id }}</th>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <td>{{ $color->status == '1' ? 'Hidden':'Visible'}}</td>
                            <td>
                                <a href="{{ url('admin/colors/'.$color->id.'/edit') }}" class="btn btn-success me-2">Edit</a>
                                <a href="{{ url('admin/colors/'.$color->id.'/delete') }}" onclick="return confirm('Are your sure you want to delete this data ?') " class="btn btn-danger" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection