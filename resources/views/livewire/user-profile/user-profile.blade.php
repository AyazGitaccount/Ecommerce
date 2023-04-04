<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            
            <div class="col-md-12">
                @if(session('message'))
                <p class="alert alert-success">{{ session('message') }}</p>
                @endif
                {{-- <h4 class="mb-4">User Profile
                  <a href="{{ url('/change_password') }}" class="btn btn-warning float-end">Change Password</a>
               </h4> --}}
                <div class="underline"></div>
            </div>
            <div class="col-md-12">

                <div class="card py-4 px-5 shadow" style="background-color:rgb(247, 247, 247);">
                    <div class="card-body">
                        <form wire:submit.prevent='update_user_details'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>User name</label>
                                        <input type="text" wire:model.defer='name' value="{{ $user->name ?? '' }}"
                                            class="form-control">
                                        @error('name')<span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="text" readonly wire:model.defer='email'
                                            value="{{ $user->email ?? "" }}" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Phone Number</label>
                                        <input type="text" wire:model.defer='phone' value="{{$user->userDetail->phone ?? '' }}" class="form-control">
                                        @error('phone')<span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Zip/Pin Code</label>
                                        <input type="text" wire:model.defer='zip_code' value="{{ $user->userDetail->zip_code ?? '' }}" class="form-control">
                                        @error('zip_code')<span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>Address</label>
                                        <textarea wire:model.defer='address' value="{{ $user->userDetail->address ?? '' }}" class="form-control" rows="3"></textarea>
                                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>