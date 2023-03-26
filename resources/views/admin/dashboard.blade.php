@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin">

    <div class="me-md-3 me-xl-5">
      <h2>Welcome back,</h2>
      <p class="mb-md-0">Your analytics dashboard template.</p>
    <hr>
    </div>

    <div class="row">
      <div class="col-md-3">
        <div class="card card-body bg-primary text-white mb-3">
          <label>Total Orders</label>
          <h1>{{ $total_orders }}</h1>
          <a href="{{ url('admin/orders') }}" class="text-white">view</a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card card-body bg-success text-white mb-3">
          <label>Today Orders</label>
          <h1>{{ $today_orders }}</h1>
          <a href="{{ url('admin/orders') }}" class="text-white">view</a>
        </div>
      </div>
     
      <div class="col-md-3">
        <div class="card card-body bg-warning text-white mb-3">
          <label>This Month Orders</label>
          <h1>{{ $this_month}}</h1>
          <a href="{{ url('admin/orders') }}" class="text-white">view</a>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="card card-body bg-danger text-white mb-3">
          <label>This Year Orders</label>
          <h1>{{ $this_year }}</h1>
          <a href="{{ url('admin/orders') }}" class="text-white">view</a>
        </div>
      </div>

    </div>
    <hr>

    <div class="row">
      <div class="col-md-4">
        <div class="card card-body bg-info text-white mb-3">
          <label>Total Products</label>
          <h1>{{ $total_products }}</h1>
          <a href="{{ url('admin/products') }}" class="text-white">view</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-body bg-danger text-white mb-3">
          <label>Total Categories</label>
          <h1>{{ $total_cats }}</h1>
          <a href="{{ url('admin/categories') }}" class="text-white">view</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-body bg-primary text-white mb-3">
          <label>Total Brands</label>
          <h1>{{ $total_brands }}</h1>
          <a href="{{ url('admin/products') }}" class="text-white">view</a>
        </div>
      </div>

    </div>
    <hr>
  
    <div class="row">
      <div class="col-md-4">
        <div class="card card-body bg-warning text-white mb-3">
          <label>All Users</label>
          <h1>{{ $total_all_users }}</h1>
          <a href="{{ url('admin/users') }}" class="text-white">view</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-body bg-secondary text-white mb-3">
          <label>Users</label>
          <h1>{{ $total_users_normal }}</h1>
          <a href="{{ url('admin/users') }}" class="text-white">view</a>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card card-body bg-success text-white mb-3">
          <label>Admins</label>
          <h1>{{ $total_admin }}</h1>
          <a href="{{ url('admin/users') }}" class="text-white">view</a>
        </div>
      </div>
    </div>
  
  
  </div>
</div>
</div>@endsection