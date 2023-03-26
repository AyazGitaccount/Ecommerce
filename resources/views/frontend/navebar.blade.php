<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <h5 class="brand-name">{{ $app_setting->website_name ?? 'website name' }}</h5>
                </div>
                <div class="col-md-5 my-auto">
                    <form wire:submit.prevent='register'  role="search">
                        <div class="input-group">
                            <input type="search" wire:model="search" value="" placeholder="Search your product" class="form-control" />
                            <a href="{{ url('/search') }}" class="btn bg-white"  type="submit">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">
                                <i class="fa fa-shopping-cart"></i> Cart (<livewire:frontend.cart-count>)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('wishlist') }}">
                                <i class="fa fa-heart"></i> Wishlist (<livewire:frontend.wishlist-count>)
                            </a>
                        </li>

                        @guest
                            @if(Route::has('login'))
                               <li class="nav-item">
                                   <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </i>
                            @endif
                        @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </i>
                            @endif
                            @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user" style="margin-right: 3px"> </i>{{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="{{ url('/orders') }}"><i class="fa fa-list"></i> My Orders</a></li>
                                </li>
                                <li>
                                    {{-- <a class="dropdown-item" href="#"> Logout</a> --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out">{{ __('Logut') }}</i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Funda Ecom
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/collections') }}">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/new_arrival') }}">New Arrivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/featured-products') }}">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Electronics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Fashions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accessories</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Appliances</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


{{-- <li class="nav-item dropdown">
    <a id="navebarDropdown" class="nav-link dropdwon-toggle" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">{{ Auth::user()->name }}
    </a>


    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();"></a>

        <form id="logout-form" action="{{ route('logut') }}">
            @csrf
        </form>

    </div>
</li> --}}