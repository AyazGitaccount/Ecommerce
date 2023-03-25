<div>
    @include('livewire.admin.brand.modal-form')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Brand List
                            <a href="{{route('create')}}" class="btn btn-primary btn-sm float-end"  data-bs-toggle="modal" data-bs-target="#addbrandModal">Add Brand</a>
                        </h4>
                    </div>
                    <div class="card-boady m-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brand as $item )
                                <tr>
                                    <td scope="row">{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                    @if($item->category)
                                    {{ $item->category->name }}
                                     @else
                                     No Category avilable
                                     @endif
                                    </td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="#" wire:click='edit_Brand({{ $item->id }})'  data-bs-toggle="modal" data-bs-target="#UpdateBrandModal"  class="btn btn-success me-2">Edit</a>
                                        <a  wire:click='delete_brand({{ $item->id }})' class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#destoryBrandModal">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $brand->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
