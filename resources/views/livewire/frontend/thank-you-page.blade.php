<div class="py-3 py-md-4 ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 text-center">
                @if(session('message'))
                <h4 class="alert">{{ session('message') }}</h4>
                @endif
                <div class="p-4 shadow bg-white">
                    <h3>Thank You for Shopping with Us </h3>
                    <a href="{{ url('collections') }}" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
