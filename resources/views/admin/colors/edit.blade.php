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
                        Update colors
                        <a href="{{ url('admin/colors') }}" class="btn btn-primary btn-sm float-end">
                           Back </a>
                    </h4>
                </div>
            </div>
            <div class="card-body" style="background-color: white;">
                <form action="{{ url('admin/colors/'.$color->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                      <label  class="form-label">Color Name</label>
                      <input type="text" class="form-control" value="{{ $color->name }}" name="name">
                      @error('name')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Color Code</label>
                      <input type="text" class="form-control" value="{{ $color->code }}" name="code">
                      @error('code')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-check-label mb-2" for="exampleCheck1">Status</label><br>
                      <input type="checkbox" name="status" {{ $color->status ? 'checked':'' }} class="form-check-input m-0" id="exampleCheck1"> Checked=hidden, uncheckd=visible
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
            </div>
        </div>
    </div>
</div>
@endsection