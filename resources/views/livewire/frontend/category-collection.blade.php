<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>
            @forelse ($category as $cat_item )
            <div class="col-6 col-md-3">
                    <div class="category-card">
                    <a href="{{ url('/collections/'.$cat_item->slug) }}">
                        <div class="category-card-img">
                            <img src="{{ asset("$cat_item->image") }}" class="w-100" style="height:155px" alt="category_image">
                        </div>
                        <div class="category-card-body">
                            <h5>{{ $cat_item->name}}</h5>
                        </div>
                    </a>
                </div>                
            </div>
           @empty
               <div class="col-md-12">
                <h5>No Category Avilable</h5>
               </div>     
           @endforelse
        </div>
    </div>
</div>