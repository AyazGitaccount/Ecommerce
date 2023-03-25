<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                       @endif
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Products</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Quantity</h4>
                                </div>
                                <div class="col-md-1">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Remove</h4>
                                </div>
                            </div>
                        </div>
                        @forelse ($cart as $cartitem)
                        @if($cartitem->product)
                        <div class="cart-item border " style="">
                            <div class="row">
                                <div class="col-md-6 my-auto">
                                    <a
                                        href="{{url('/collections/'.$cartitem->product->category->slug.'/'.$cartitem->product->slug)}}">
                                        <label class="product-name">
                                            @if ($cartitem->product->productImages)
                                            <img src="{{ asset($cartitem->product->productImages[0]->image) }}"
                                                style="width: 50px; height: 50px" alt="">
                                            @endif
                                            {{ $cartitem->product->name }}
                                            @if($cartitem->productColor)
                                            @if ($cartitem->productColor->color)
                                            <span>- Color : {{ $cartitem->productColor->color->name }}</span>
                                            @endif
                                            @endif
                                        </label>

                                    </a>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">{{ $cartitem->product->selling_price }} </label>
                                </div>
                                <div class="col-md-2 col-7 my-auto">
                                    <div class="quantity">
                                        <div class="input-group">
                                            <button type="button" wire:loading.attr='disabled'
                                                wire:click='decrementQuantity({{ $cartitem->id }})' class="btn btn1"><i
                                                    class="fa fa-minus"></i></button>
                                            <input type="text" value="{{ $cartitem->quantity }}"
                                                class="input-quantity" />
                                            <button type="button" wire:loading.attr='disabled'
                                                wire:click='incrementQuantity({{ $cartitem->id }})' class="btn btn1"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 my-auto">
                                    <label class="price">{{ $cartitem->product->selling_price *  $cartitem->quantity }} </label>
                                   @php
                                       $total_price += $cartitem->product->selling_price *  $cartitem->quantity
                                   @endphp
                                </div>
                                <div class="col-md-2 col-5 my-auto">
                                    <div class="remove">
                                        <button type="button" wire:loading.attr='disabled' wire:click='remove_cart_item({{ $cartitem->id }})' class="btn btn-danger btn-sm">
                                            <span wire:loading.remove wire:target='remove_cart_item({{ $cartitem->id }})'><i class="fa fa-trash"></i> Remove </span>
                                            <span wire:loading wire:target='remove_cart_item({{ $cartitem->id }})'><i class="fa fa-trash"></i> Removeing </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @empty
                        <div>
                            <h3>No Product Avilable in Cart</h3>
                        </div>
                        @endforelse

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 my-md-auto mt-3">
                 <h4>
                    Get the best deals & offers <a href="{{ url('/collections') }}" class="text-decoration-none">shop now</a>
                 </h4>
                </div>
                <div class="col-md-4 mt-3">
                    <div class="shadow-sm bg-white p-3">
                        <h4> Total:
                            <span class="float-end">${{ $total_price }}</span>
                        </h4>
                        <hr>
                        <a href="{{ url('/checkout') }}" class="btn btn-warning w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>