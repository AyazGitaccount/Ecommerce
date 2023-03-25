<div class="py-3 py-md-5 bg-light">
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-5 mt-3">
                <div class="bg-white border" wire:ignore>
                    @if($product->productImages->count()>0)
                    <img src="{{ asset($product->productImages[0]->image) }}" style="height:350px" class="w-100"
                        alt="Img">
                        {{-- <div class="exzoom" id="exzoom">
                            <div class="exzoom_img_box">
                              <ul class='exzoom_img_ul'>
                                @foreach ($product->productImages as $image)
                                 <li><img src="{{ asset($image->image) }}"/></li>
                                @endforeach    
                              </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                            </p>
                          </div> --}}
                    @else
                     No image addes
                    @endif
                </div>
            </div>
            <div class="col-md-7 mt-3">
                <div class="product-view">
                    <h4 class="product-name">
                        {{ $product->name }}
                    </h4>
                    <hr>
                    <p class="product-path">
                        Home / {{ $product->category->name }} /{{ $product->name }}
                    </p>
                    <div>
                        <span class="selling-price">${{ $product->selling_price }}</span>
                        <span class="original-price">${{ $product->original_price }}</span>
                    </div>
                    <div class="mt-2 mb-2">
                    </div>
                    <div>
                        @if($product->productColors->count()>0 && $product->quantity >0)
                            @if($product->productColors)
                                @foreach ($product->productColors as $color_item )
                                {{-- <input type="radio" name="colorSelection" value="{{ $color_item->id }}"/> {{ $color_item->color->name }} --}}
                                <label class="colorSelectionLabel" style="background-color:{{ $color_item->color->code }}" wire:click='colorSelected({{ $color_item->id }})'>
                                    {{ $color_item->color->name }}
                                </label>
                                @endforeach
                            @endif
                           
                            @if ($this->prod_color_selected_quantity=='outOfStock')
                            <label class="btn-sm  text-white btn btn-danger">Out of Stock</label>                                
                            
                            @elseif($this->prod_color_selected_quantity> 0)
                            <label class="text-white btn btn-success btn-sm">In Stock</label>
                            @endif
                         
                        @else 
                            @if($product->quantity >0)
                            <label class="text-white btn btn-success btn-sm">In Stock</label>
                            @else
                            <label class="btn-sm  text-white btn btn-danger">Out of Stock</label>
                            @endif   
                        @endif
                        
                    </div>
                    @if($product->quantity >0)
                    
                    <div class="mt-2">
                        <div class="input-group">
                            <span class="btn btn1" wire:click='decrementQuantity'><i class="fa fa-minus"></i></span>
                            <input type="text" wire:model='quantityCount' value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                            <span class="btn btn1" wire:click='incrementQuantity'><i class="fa fa-plus"></i></span>
                        </div>
                    </div>
                   
                        <div class="mt-2">
                            <button type="button" wire:click='addToCart({{$product->id}})' class="btn btn1">
                                <span  wire:loading.remove wire:target='addToCart'>
                                    <i class="fa fa-shopping-cart"></i> Add To Cart                            
                                </span>
                                <span wire:loading wire:target='addToCart'>Adding... </span>
                            </button>
                            
                            <button type="button" wire:click='addToWhishlist({{  $product->id }})' class="btn btn1">  
                                <span wire:loading.remove wire:target='addToWhishlist'>
                                    <i class="fa fa-heart"></i> Add To Wishlist
                                </span>
                                <span wire:loading wire:target='addToWhishlist'>Adding... </span>
                        </button>
                       </div>
                    
                    @endif
                    <div class="mt-3">
                        <h5 class="mb-0">Small Description</h5>
                        <p>
                            {!!$product->small_description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-header bg-white">
                        <h4>Description</h4>
                    </div>
                    <div class="card-body">
                        <p>
                            {!!$product->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(function(){
            $("#exzoom").exzoom({
        
            // thumbnail nav options
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,
        
            // autoplay
            "autoPlay": false,
        
            // autoplay interval in milliseconds
            "autoPlayTimeout": 2000
            
            });
        
        });
    </script>
@endpush