@extends('layouts.app')
@section('title','Your Order')
<div>
    <livewire:frontend.orders.orders-list :order_id="$order_id">
</div>
@endsection