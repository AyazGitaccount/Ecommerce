<div class="row">
    <div class="col-md-12 grid-margin ">
        <div class="mx-4 my-4">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <form wire:submit.prevent='store' class="mx-3 my-3">
            @csrf
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Website Name</label>
                            <input type="text" wire:model.defer="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Website URL</label>
                            <input type="text" wire:model.defer="webiste_url" value="{{ $setting->webiste_url ?? '' }}" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Page Title</label>
                            <input type="text" wire:model.defer="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Meta keywords</label>
                            <input type="text" wire:model.defer="meta_keyword" value="{{ $setting->meta_keyword ?? '' }}" class="form-control">
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label>Meta Description</label>
                            <input type="text" wire:model.defer="meta_description" value="{{ $setting->meta_description ?? '' }}" class="form-control">
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
                            <textarea  wire:model.defer="address" value="{{ $setting['address'] ?? '' }}" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 1 *</label>
                            <input type="text" wire:model.defer="phone1" value="{{ $setting['phone1'] ?? '' }}" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Phone No.2</label>
                            <input type="text" wire:model.defer="phone2" value="{{ $setting['phone2'] ?? '' }}" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Email 1 *</label>
                            <input type="text" wire:model.defer="email1" value="{{ $setting['email1'] ?? '' }}" class="form-control">
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label>Email 2</label>
                            <input type="text" wire:model.defer="email2" value ="{{ $setting['email2'] }}" class="form-control">
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
                            <input type="text" wire:model.defer="facebook" value ="{{ $setting['facebook'] }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Twitter (Optional)</label>
                            <input type="text" wire:model.defer="twitter" value ="{{ $setting['twitter'] }}" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Instagram (Optional)</label>
                            <input type="text" wire:model.defer="instagram" value ="{{ $setting['instagram'] }}" class="form-control">
                        </div>
                         <div class="col-md-6 mb-3">
                            <label>Youtube (Optional)</label>
                            <input type="text" wire:model.defer="youtube"  value ="{{ $setting['youtube'] }}" class="form-control">
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
