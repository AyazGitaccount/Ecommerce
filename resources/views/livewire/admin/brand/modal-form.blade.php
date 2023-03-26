<!-- Add Brand Modal -->
<div wire:ignore.self class="modal fade" id="addbrandModal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brands</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           
            <form wire:submit.prevent='storeBrand'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select Category</label>
                        <select wire:model.defer="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{ $message }}</small>                 
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand Name</label>
                        <input type="text" wire:model.defer='name' class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Brand Slug</label> <br>
                        <input type="text" wire:model.defer='slug' class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" wire:model.defer='status'> Checked= Hidden, Unchecked= Visible
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
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

<!-- Update Brand Modal-->
<div wire:ignore.self class="modal fade" id="UpdateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
                <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='Update_Brand'>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Select Category</label>
                        <select wire:model.defer="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <small class="text-danger">{{ $message }}</small>                 
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label >Brand Name</label>
                        <input type="text" wire:model.defer='name' class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label >Brand Slug</label> <br>
                        <input type="text" wire:model.defer='slug' class="form-control">
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label >Status</label>
                        <input type="checkbox" wire:model.defer='status'> Checked= Hidden, Unchecked= Visible
                        @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='closeModal'  data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Brand Modal-->
<div wire:ignore.self class="modal fade" id="destoryBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
                <button type="button" wire:click='closeModal' class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent='destory_Brand'>
                <div class="modal-body">
                   <h4>Are you sure you want to delete the data ?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click='closeModal'  data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger text-white" data-bs-dismiss="modal">Yes ! Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>