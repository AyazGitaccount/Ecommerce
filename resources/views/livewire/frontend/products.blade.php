<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if($category->brands)
                <div class="card shadow">
                    <div class="card-header">
                        <H4>Brands</H4>
                    </div>
                    <div class="card-body">
                        @foreach ($category->brands as $item)
                         <label class="d-block">
                            <input type="checkbox" wire:model='brandInputs' value="{{ $item->name }}"> {{ $item->name }}
                        </label>   
                        @endforeach               
                    </div>
                </div>
                @endif
                <div class="card mt-3 shadow">
                    <div class="card-header">
                        <H4>Price</H4>
                    </div>
                    <div class="card-body">
                         <label class="d-block">
                            <input type="radio" name="piceSort"  wire:model='priceInput' value="high-to-low"> High to Low
                        </label> 
                        <label class="d-block">
                            <input type="radio" name="piceSort" wire:model='priceInput' value="low-to-high">Low To High
                        </label>            
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Our Products</h4>
                    </div>
                   
                    @forelse ( $products as $item)
                    <div class="col-md-4">
                        <div class="product-card shadow">
                            <div class="product-card-img">
                                @if ($item->quantity > 0)
                                <label class="stock bg-success">In Stock</label>
                                @else
                                <label class="stock bg-danger">Out of Stock</label>
                                @endif

                                @if($item->productImages->count()>0)
                                <a href="{{ url('/collections/'.$item->category->slug.'/'.$item->slug) }}">
                                    <img src="{{ asset($item->productImages[0]->image) }}" class="w-100" style="height:155px" alt="{{ $item->name }}">
                                </a>
                                @endif
                                
                            </div>
                            <div class="product-card-body">
                                <p class="product-brand">{{ $item->brand }}</p>
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$item->category->slug.'/'.$item->slug) }}">
                                        {{ $item->name }}
                                    </a>
                                </h5>
                                <div>
                                    <span class="selling-price">{{ $item->selling_price }}</span>
                                    <span class="original-price">{{ $item->selling_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <h4 class="mb-4">No Product Avilable for {{ $category->name }}</h4>
                    </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</div>