<div class="container mb-5"  style="min-height: 100vh;" >
    <div class="row justify-content-center mt-5" >
        <div class="col-md-6 ">
            <div class="card py-4 px-5 shadow" style="background-color:rgb(247, 247, 247);">
                <div class="card-body ">
                    <div class="d-flex justify-content-center">
                        <h2>Register</h2>
                    </div>
                    <form class="pt-3 mb-4" wire:submit.prevent='register'>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" wire:model="name" id="name">
                            @error('name')<span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" wire:model="email" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            @error('email')<span class="text-danger">{{ $message }}</span> @enderror

                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model="password" id="password">
                            @error('password')<span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" wire:model="password_confirmation">
                        </div>

                        <button type="submit" class="btn btn-primary form-control ">Register</button>
                        {{-- <a class="btn btn-outline-primary  mx-2" href="/login" role="button">Login</a> --}}
                    </form>
                    <hr>
                    <p class="text-lead text-center mt-4">Already have account ? <a href="{{ url('/login') }}" class="text-decoration-none">Login</a></p>

                    
                </div>
            </div>
        </div>
    </div>
</div>