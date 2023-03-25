<div class="container ">
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-center my-5">
        <div class="col-md-6 ">
            <div class="card py-4 px-5 shadow" style="background-color:rgb(247, 247, 247);">
                <div class="card-body ">
                    <div class="d-flex justify-content-center">
                        <h2>LOG IN</h2>
                    </div>
                    <form class="pt-3" wire:submit.prevent="login">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" wire:model="email" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @error('email') <span class="text-danger">{{ $message }} @enderror</span>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" wire:model="password" id="exampleInputPassword1">
                            @error('password')<span class="text-danger">{{ $message }} @enderror</span>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 form-control">Login</button>
                        {{-- <a class="btn btn-outline-primary  mx-2" href="/register" role="button">Register</a> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
