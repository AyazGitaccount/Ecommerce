<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/orders') }}">
                <i class="mdi mdi-sale menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/category') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-shape menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category/create') }}">Add Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category') }}">View Category</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#product" aria-expanded="false"
                aria-controls="product">
                    <i class="mdi mdi-plus-circle menu-icon"></i>
                    <span class="menu-title">Products</span>
                    <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="product">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products/create') }}">Add Product</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">View Product</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item {{ Request::is('admin/brands') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('/admin/brands') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/colors') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('/admin/colors') }}">
                <i class="mdi mdi-palette menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item {{ Request::is('admin/users') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/users') }}">
                <i class="mdi mdi-account  menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item {{ Request::is('admin/add-users') ? 'active':'' }}"> <a class="nav-link" href="{{ '/admin/add-users' }}"> Add User </a></li>
                    <li class="nav-item > <a class="nav-link" > View User </a></li>
                </ul>
            </div>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/slider') ? 'active':'' }}" href="{{ url('admin/slider') }}">
                <i class="mdi mdi-view-carousel menu-icon"></i>
                <span class="menu-title">Home Slider</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/setting') ? 'active':'' }}" href="{{ url('admin/setting') }}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Setting</span>
            </a>
        </li>
    </ul>
</nav>