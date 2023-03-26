<div>
    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="footer-heading">{{ $app_setting->website_name }} E-Commerce</h4>
                    <div class="footer-underline"></div>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                    </p>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Quick Links</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/home') }}" class="text-white">Home</a></div>
                    <div class="mb-2"><a href="{{ url('/about_us') }}" class="text-white">About Us</a></div>
                    <div class="mb-2"><a href="{{ url('/contact') }}" class="text-white">Contact Us</a></div>
                    <div class="mb-2"><a href="{{ url('/blogs') }}" class="text-white">Blogs</a></div>
                    {{-- <div class="mb-2"><a href="{{ url('/home') }}" class="text-white">Sitemaps</a></div> --}}
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Shop Now</h4>
                    <div class="footer-underline"></div>
                    <div class="mb-2"><a href="{{ url('/collections') }}" class="text-white">Collections</a></div>
                    <div class="mb-2"><a href="{{ url('') }}" class="text-white">Trending Products</a></div>
                    <div class="mb-2"><a href="{{ url('//new_arrival') }}" class="text-white">New Arrivals Products</a></div>
                    <div class="mb-2"><a href="{{ url('/featured-products') }}" class="text-white">Featured Products</a></div>
                    <div class="mb-2"><a href="{{ url('/cartlist') }}" class="text-white">Cart</a></div>
                </div>
                <div class="col-md-3">
                    <h4 class="footer-heading">Reach Us</h4>
                    <div class="footer-underline"></div>
                    {{-- <div class="mb-2">
                        <p>
                            <i class="fa fa-map-marker"></i> {{ $app_setting->website_name ?? 'Address' }}
                        </p>
                    </div> --}}
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-phone"></i> {{ $app_setting->phone1 ?? 'Phone' }}
                        </a>
                    </div>
                    <div class="mb-2">
                        <a href="" class="text-white">
                            <i class="fa fa-envelope"></i> {{ $app_setting->emaiil1 ?? 'email' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class=""> &copy; 2023 - Ecom - Ecommerce. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <div class="social-media">
                        Get Connected:
                        @if($app_setting->facebook)
                        <a href="{{ $app_setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        @endif
                        @if($app_setting->twitter)
                        <a href="{{ $app_setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        @endif
                        @if($app_setting->instagram)
                        <a href="{{ $app_setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        @endif
                        @if($app_setting->youtube)
                        <a href="{{ $app_setting->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
