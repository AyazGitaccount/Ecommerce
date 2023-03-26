{{-- Add users --}}
<div wire:ignore.self class="modal fade" id="add-user-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Users</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent='add_user'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" wire:model.defer='name' class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label> <br>
                        <input type="email" wire:model.defer='email' class="form-control">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" wire:model.defer='password' placeholder="min:8" class="form-control">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Select Role</label>
                        <select wire:model.defer='role' class="form-control">
                            <option value="">Select Role</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                        </select>
                        @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>

                </div>
            </form>

        </div>
    </div>
</div>

{{-- Update User --}}
<div wire:ignore.self class="modal fade" id="Update_user" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
                <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='update_user_details'>
                <div class="modal-body">

                    <div class="mb-3">
                        <label>User Name</label>
                        <input type="text" wire:model.defer='name' class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Email</label> <br>
                        <input type="email" readonly wire:model.defer='email' class="form-control">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="text" wire:model.defer='password' class="form-control">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Select Role</label>
                        <select wire:model.defer='role' class="form-control">
                            <option value="">Select Role</option>
                            <option value="0" {{ $users['role_as']=='0' ? 'selected' :'' }}>User</option>
                            <option value="1" {{ $users['role_as']=='1' ? 'selected' :'' }}>Admin</option>
                        </select>
                        @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='closeModal'
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>

                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete user  --}}
<div wire:ignore.self class="modal fade" id="delete_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
                <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='destory_user'>
                <div class="modal-body">
                   <h4>Are you sure you want to delete the User record ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='closeModal'  data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger text-white" data-bs-dismiss="modal">Yes ! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>