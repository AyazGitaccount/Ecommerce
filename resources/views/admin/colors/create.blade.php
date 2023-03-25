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
                        Add colors
                        <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm float-end">
                           Back </a>
                    </h4>
                </div>
            </div>
            <div class="card-body" style="background-color: white;">
                <form action="{{ url('admin/colors/create') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">Color Name</label>
                      <input type="text" class="form-control" name="name">
                      @error('name')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Color Code</label>
                      <input type="text" class="form-control" name="code">
                      @error('code')<span class="text-danger">{{ $message }}</span> @enderror
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