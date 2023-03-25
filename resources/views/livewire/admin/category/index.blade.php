<div>
    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='destoryCategory'>
                    <div class="modal-body">
                        <h6>Are you shure you want to delete ?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Yes ! Delete</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

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
                            Category
                            <a href="{{route('create')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $cat )
                                <tr>
                                    <th scope="row">{{ $cat->id }}</th>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->status == '1' ? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="{{ url('admin/category/'.$cat->id.'/edit') }}"
                                            class="btn btn-success me-2">Edit</a>
                                        <a  wire:click='deleteCategory({{ $cat->id }})' class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
