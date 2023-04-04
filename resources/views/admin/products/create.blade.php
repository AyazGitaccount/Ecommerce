@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>
                    Add Product
                    <a href="{{ url('admin/products') }}" class="btn btn-primary btn-sm float-end">Back</a>
                </h4>
            </div>
        </div>
        <div class="card-body p-0">
            @if($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error )
                <div>{{ $error }}</div>
                @endforeach
                @endif
            </div>
            <form action="{{ url('/admin/products') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <ul class="nav nav-tabs" style="border:2px solid rgb(215, 212, 212);" id="myTab" role="tablist">
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
                            data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane"
                            aria-selected="false">Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane"
                            type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product
                            Images</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane"
                            type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product
                            Color</button>
                    </li>

                </ul>
                <div class="tab-content" style="border:1px solid rgb(215, 212, 212);" id="myTabContent">
                    <div class="tab-pane fade show active p-3" style="border:2px solid rgb(215, 212, 212);"
                        id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="my-3">
                            <label class="form-label"> Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Product name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Product slug</label>
                            <input type="text" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"> Select Brand</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $brand)
                                <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Small Description (500 words)</label>
                            <textarea name="small_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3" id="seo-tab-pane" style="border:2px solid rgb(215, 212, 212);"
                        role="tabpanel" aria-labelledby="seo-tab" tabindex="0">
                        <div class="my-3">
                            <label class="form-label"> Meta Title</label>
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Description (500 words)</label>
                            <textarea name="meta_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3" id="details-tab-pane" style="border:2px solid rgb(215, 212, 212);"
                        role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="row my-3">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Original Price</label>
                                    <input type="text" name="original_price" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Selling Price</label>
                                    <input type="text" name="selling_price" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input mx-0" name="trending" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Trending </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input mx-0" name="featured" type="checkbox" value=""
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">Featured </label>
                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <div class="form-check">
                                    <input class="form-check-input mx-0" name="status" type="checkbox" value=""
                                        id="flexCheckDefault2">
                                    <label class="form-check-label" for="flexCheckDefault2">
                                        Status
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade  p-3" id="image-tab-pane"
                        style="border:2px solid rgb(215, 212, 212);" role="tabpanel" aria-labelledby="image-tab"
                        tabindex="0">
                        <div class="mb-3">
                            <label class="form-label">Product Images</label>
                            <input type="file" name="image[]" multiple class="form-control">
                        </div>
                    </div>
                    <div class="tab-pane fade  p-3"  id="color-tab-pane"
                        style="border:2px solid rgb(215, 212, 212);" role="tabpanel" aria-labelledby="color-tab"
                        tabindex="0">
                        <div class="mb-3">
                            <label class="form-label">Product color</label>
                            <div class="row">
                                @forelse ($colors as $color)
                                <div class="col-md-3">
                                    <div class="p-2 border border-white">
                                        Color: <input type="checkbox" name="colors[{{ $color->id }}]"  value="{{ $color->id }}" class="form-check-input m-2"
                                        value="{{ $color->id }}">{{ $color->name }} <br>
                                        Quantity: <input type="number" name="color_quantity[{{ $color->id }}]" style="width:70px; border:1px solid">
                                    </div>
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <h2>No color found</h2>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection