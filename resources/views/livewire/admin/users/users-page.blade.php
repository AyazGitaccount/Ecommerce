<div>
    @include('livewire.admin.users.add-users')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
                @if($errors->any())
                <ul class="alert alert-warning">
                  @foreach ($errors->all() as $error )
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Users List
                            <a href="{{url('admin/add-users')}}" class="btn btn-primary btn-sm float-end"  data-bs-toggle="modal" data-bs-target="#add-user-modal">Add User</a>
                        </h4>
                    </div>
                    <div class="card-boady m-3">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->role_as == '0')
                                         <label class="btn btn-primary btn-sm">User</label>
                                        @elseif ($user->role_as == '1')
                                         <label class="btn btn-success btn-sm">Admin</label>
                                        @else
                                         <label class="btn btn-danger btn-sm">none</label>
                                        @endif
                                    </td>
                                    <td>
                                        <a  wire:click='edit_user({{ $user->id }})'  data-bs-toggle="modal" 
                                            data-bs-target="#Update_user"  class="btn btn-success me-2  btn-sm">
                                            Edit
                                        </a>
                                        <a  wire:click='delete_user({{ $user->id }})' class="btn  btn-danger" 
                                            data-bs-toggle="modal" data-bs-target="#delete_user">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                 <tr>
                                    <td colspan="5">No users avilable</td>
                                 </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="mt-2">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
