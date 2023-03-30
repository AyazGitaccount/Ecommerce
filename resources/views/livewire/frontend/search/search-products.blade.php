<div class="py-5 bg-white">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <h4 class="mb-4">Search Result</h4>
                <div class="underline"></div>
            </div>
            @forelse ( $search_result as $item)
            <div class="col-md-3">
                <div class="product-card shadow">
                    <div class="product-card-img">
                        <label class="stock bg-danger">New</label>
                        @if($item->productImages->count()>0)
                        <a href="{{ url('/collections/'.$item->category->slug.'/'.$item->slug) }}">
                            <img src="{{ asset($item->productImages[0]->image) }}" class="w-100" style="height:155px"
                                alt="{{ $item->name }}">
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
            <div class="col-md-12 p-2">
                <h4>No Product Avilable</h4>
            </div>
            @endforelse

        </div>
        <div>
            {{ $search_result->links() }}
        </div>
    </div>
</div>