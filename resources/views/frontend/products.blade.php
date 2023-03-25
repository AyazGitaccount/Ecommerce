@extends('layouts.app')
@section('title','Products')

<div>
    <livewire:frontend.products :products="$products":category="$category">
</div>

@endsection