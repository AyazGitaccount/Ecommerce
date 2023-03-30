<section>
  <div class="container-fluid m-0 p-0 " style="min-height: 100vh;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
      <div class="carousel-inner">
        @foreach ($slider as $key => $item)
        <div class="carousel-item {{ $key == 0 ? 'active':'' }}">
          @if($item->image)
          <img src="{{ asset($item->image) }}" class="d-block w-100 " style="height:500px" alt="Slider Image">
          @endif
          <div class="carousel-caption d-none d-md-block">
            <div class="custom-carousel-content">
              <h1>
                <span>{{ $item->title }}
              </h1>
              <p>
                {{ $item->description }}
              </p>
              <div>
                <a href="#" class="btn btn-slider">
                  Get Now
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="py-5 bg-white">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8 text-center">
            <h4>Welcome to Ecom </h4>
            <div class="underline"></div>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex veniam veritatis deleniti error blanditiis.
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="py-5 bg-white">
      <div class="container">
        <div class="row ">
          <div class="col-md-12">
            <h4 class="mb-4">Trending Products</h4>
            <div class="underline"></div>
          </div>
          @if($trending_products)
          <div class="col-md-12">
            <div class="owl-carousel owl-theme four-carousel" style="display: block">
              @foreach ( $trending_products as $item)
              <div class="item">
                <div class="product-card shadow">
                  <div class="product-card-img">
                    <label class="stock bg-success">New</label>
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
              @endforeach
            </div>
          </div>
          @else
          <div class="col-md-12">
            <div class="p-2">
              <h4 class="mb-4">No Product Avilable</h4>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>

    <div class="py-5 bg-white">
      <div class="container">
        <div class="row ">
          <div class="col-md-12">
            <h4 class="mb-4">New Arrival
              <a href="{{ url('/new_arrival') }}" class="btn btn-warning btn-sm">View More</a>

            </h4>
            <div class="underline"></div>
          </div>

          @if($new_arrival)
          <div class="col-md-12">
            <div class="owl-carousel owl-theme four-carousel" style="display: block">
              @foreach ( $new_arrival as $item)
              <div class="item">
                <div class="product-card shadow">
                  <div class="product-card-img">
                    <label class="stock bg-success">New</label>
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
              @endforeach
            </div>
          </div>
          @else
          <div class="col-md-12">
            <div class="p-2">
              <h4 class="mb-4">No New Arrival Avilable</h4>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>

    <div class="py-5 bg-white">
      <div class="container">
        <div class="row ">
          <div class="col-md-12">
            <h4 class="mb-4">Featured Products
              <a href="{{ url('/featured-products') }}" class="btn btn-warning btn-sm">View More</a>
            </h4>
            <div class="underline"></div>
          </div>

          @if($featured_products)
          <div class="col-md-12">
            <div class="owl-carousel owl-theme four-carousel" style="display: block">
              @foreach ( $featured_products as $item)
              <div class="item">
                <div class="product-card shadow">
                  <div class="product-card-img">
                    <label class="stock bg-success">New</label>
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
              @endforeach
            </div>
          </div>
          @else
          <div class="col-md-12">
            <div class="p-2">
              <h4 class="mb-4">No Product Avilable</h4>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
{{-- @endsection --}}
@push('scripts') 
<script>
  $('.four-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots:false,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endpush()
