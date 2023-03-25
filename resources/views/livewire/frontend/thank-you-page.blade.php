<div class="py-3 py-md-4 ">
    <div class="container">
        <div class="row ">
            <div class="col-md-12 text-center ">
                @if(session('message'))
                <h4 class="alert">{{ session('message') }}</h4>
                @endif
                <div class="p-4 shadow bg-white">
                    <h2>Logo</h2>
                    <h4>Thank You for Shopping with Us</h4>
                    <a href="{{ url('collections') }}" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
    
</div>
