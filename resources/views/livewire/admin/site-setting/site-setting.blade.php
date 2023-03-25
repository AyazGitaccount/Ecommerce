<div class="row">
    <div class="col-md-12 grid-margin">
        
        <form wire:submit.prevent='store'>
            @csrf
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Website Name</label>
                            <input type="text" wire:model.defer="website_name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Website URL</label>
                            <input type="text" wire:model.defer="website_url" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Page Title</label>
                            <input type="text" wire:model.defer="title" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Meta keywords</label>
                            <input type="text" wire:model.defer="meta_keywords" class="form-control">
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label>Meta Description</label>
                            <input type="text" wire:model.defer="meta_description" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website - Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea  wire:model.defer="address" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 1 *</label>
                            <input type="text" wire:model.defer="phone1" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Phone No.2</label>
                            <input type="text" wire:model.defer="phone2" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Email 1 *</label>
                            <input type="text" wire:model.defer="email1" class="form-control">
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label>Email 2</label>
                            <input type="text" wire:model.defer="email2" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website - Social Media</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Facebook (Optional)</label>
                            <input type="text" wire:model.defer="facebook" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Twitter (Optional)</label>
                            <input type="text" wire:model.defer="twitter" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Instagram (Optional)</label>
                            <input type="text" wire:model.defer="instagram" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Youtube (Optional)</label>
                            <input type="text" wire:model.defer="youtube" class="form-control">
                        </div> 
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary text-white">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
   
    </div>
</div>
