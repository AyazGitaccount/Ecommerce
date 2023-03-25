@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Edit Product
                    <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
                @endif
                @if($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error )
                    <div>{{ $error }}</div>
                    @endforeach
                    @endif
                </div>
                <form action="{{ url('/admin/products/'.$product->id) }}" class="mx-3" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo-tab-pane"
                                type="button" role="tab" aria-controls="seo-tab-pane" aria-selected="false">SEO
                                Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                data-bs-target="#details-tab-pane" type="button" role="tab"
                                aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane"
                                aria-selected="false">Product Images</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane"
                                aria-selected="false">Product Color</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="my-3">
                                <label class="form-label"> Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ?
                                        'selected':'' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Product name</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Product slug</label>
                                <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Select Brand</label>
                                <select name="brand" class="form-control">
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}" {{ $brand->name == $product->brand ?
                                        'selected':'' }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Small Description (500 words)</label>
                                <textarea name="small_description" class="form-control"
                                    rows="4">{{ $product->small_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control"
                                    rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="seo-tab-pane" role="tabpanel" aria-labelledby="seo-tab"
                            tabindex="0">
                            <div class="my-3">
                                <label class="form-label"> Meta Title</label>
                                <input type="text" name="meta_title" value="{{ $product->meta_title }}"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Description (500 words)</label>
                                <textarea name="meta_description" class="form-control"
                                    rows="4">{{ $product->meta_description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta keyword</label>
                                <textarea name="meta_keyword" class="form-control"
                                    rows="4">{{ $product->meta_keyword }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                            tabindex="0">
                            <div class="row my-3">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Original Price</label>
                                        <input type="text" value="{{ $product->original_price }}" name="original_price"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Selling Price</label>
                                        <input type="text" value="{{ $product->selling_price }}" name="selling_price"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" value="{{ $product->quantity }}" name="quantity"
                                            class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input mx-0" {{ $product->trending == '1' ? 'checked':''
                                        }} name="trending" type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Trending </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input mx-0" {{ $product->featured == '1' ? 'checked':''
                                        }} name="featured" type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Featured </label>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-check">
                                        <input class="form-check-input mx-0" {{ $product->status == '1' ? 'checked':''
                                        }} name="status" type="checkbox" value=""
                                        id="flexCheckDefault2">
                                        <label class="form-check-label" for="flexCheckDefault2">
                                            Status
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab"
                            tabindex="0">
                            <div class="mb-3">
                                <label class="form-label">Product Images</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                            <div>
                                @if($product->productImages)
                                <div class="row">
                                    @foreach ($product->productImages as $image)
                                    <div class="col-md-2 m-2">
                                        <img src="{{ asset($image->image) }}" class="m-3 border"
                                            style="width:80px; height:80px;" alt="images">
                                        <a href="{{ url('admin/product-image/'.$image->id.'/delete') }}"
                                            class="m-3">Remove</a>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <h5>No images Added</h5>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab"
                            tabindex="0">
                            <div class="mb-3">
                                <label class="form-label m-2">Select color </label>
                                <hr class="mt-0">
                                <div class="row">
                                    @forelse ($colors as $color)
                                    <div class="col-md-3">
                                        <div class="p-2 border border-white">
                                            Color: <input type="checkbox" name="colors[{{ $color->id }}]"
                                                value="{{ $color->id }}" class="form-check-input m-2"
                                                value="{{ $color->id }}">{{ $color->name }} <br>
                                            Quantity: <input type="number" name="color_quantity[{{ $color->id }}]"
                                                style="width:70px; border:1px solid">
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h2>No color found</h2>
                                    </div>
                                    @endforelse
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Color Name </th>
                                                <th>Quantity</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($product->productColors as $color_item)
                                            <tr class="prod-color-tr">
                                                <td>
                                                    @if($color_item->color)
                                                    {{ $color_item->color->name}}</td>
                                                @else
                                                No Color Found
                                                @endif
                                                <td>
                                                    <div class="input-group mb-3" style="width:150px">
                                                        <input type="text" value="{{ $color_item->quantity}}"
                                                            class="productColorQuantity form-control form-control-sm">
                                                        <button type="button" value="{{ $color_item->color_id}}"
                                                            class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                    </div>
                                                </td>

                                                <td>
                                                    <button type="button" value="{{ $color_item->id }}"
                                                        class="deleteProductColorBtn btn btn-danger btn-sm">
                                                        Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary mb-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
            $(document).ready( function(){
                $.ajaxSetup({
                    headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                });
        
           $(document).on('click', '.updateProductColorBtn', function(){
            
            var product_id = "{{ $product->id }}"
            var prod_color_id = $(this).val();
            var quantity = $(this).closest('.prod-color-tr').find('.productColorQuantity').val();
            // alert(prod_color_id);

            if(quantity <=0){
                alert('Quantity is required');
                return false;
            }

            var data = {
                'product_id': product_id,
                'quantity': quantity
            };

            $.ajax({
                type: "POST",
                url: "/admin/product-color/"+prod_color_id,
                data: data,
                success: function(response){
                    alert(response.message)
                }
            });
        });

        $(document).on('click', '.deleteProductColorBtn', function(){
            
            var prod_color_id =  $(this).val();
            var thisClick = $(this);
            $.ajax({
                type: "GET",
                url: "/admin/product-color/"+prod_color_id+"/delete",
                success: function(response){
                    thisClick.closest('.prod-color-tr').remove();
                    alert(response.message);
                }
            });
        });
    });
</script>
@endsection