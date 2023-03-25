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
                        Add Slider
                        <a href="{{ url('admin/slider') }}" class="btn btn-primary btn-sm float-end">
                           Back </a>
                    </h4>
                </div>
            </div>
            <div class="card-body" style="background-color: white;">
                <form action="{{ url('admin/slider/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">Title</label>
                      <input type="text" class="form-control" name="title">
                      @error('title')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Description</label>
                       <textarea  name="Description" id="" class="form-control" rows="3"></textarea>
                      @error('Description')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Image</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label mb-2" for="exampleCheck1">Status</label><br>
                      <input type="checkbox" name="status" class="form-check-input m-0" id="exampleCheck1"> Checked=hidden, uncheckd=visible
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection