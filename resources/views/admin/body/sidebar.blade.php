<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="/admin/dashboard">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                <a href="/admin/dashboard">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- Brand --}}
            <li class="treeview {{ request()->segment(2) == 'brand' ? 'active' : '' }}">
                <a href="{{ route('brand.index') }}">
                    <i data-feather="grid"></i>
                    <span>Manage Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('brand.index') }}"><i class="ti-more"></i>All Brands</a></li>
                    <li><a href="{{ route('brand.create') }}"><i class="ti-more"></i>Create Brand</a></li>
                </ul>
            </li>
            {{-- Category --}}
            <li class="treeview {{ request()->segment(2) == 'category' ? 'active' : '' }}">
                <a href="{{ route('category.index') }}">
                    <i data-feather="grid"></i>
                    <span>Manage Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('category.index') }}"><i class="ti-more"></i>All Categories</a></li>
                    <li><a href="{{ route('category.create') }}"><i class="ti-more"></i>Create Category</a></li>
                </ul>
            </li>
            {{-- Sub Category --}}
            <li class="treeview {{ request()->segment(2) == 'sub-category' ? 'active' : '' }}">
                <a href="{{ route('sub-category.index') }}">
                    <i data-feather="grid"></i>
                    <span>Manage Sub Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('sub-category.index') }}"><i class="ti-more"></i>All Sub Categories</a></li>
                    <li><a href="{{ route('sub-category.create') }}"><i class="ti-more"></i>Create Sub Category</a>
                    </li>
                </ul>
            </li>
            {{-- Product --}}
            <li class="treeview {{ request()->segment(2) == 'product' ? 'active' : '' }}">
                <a href="{{ route('product.index') }}">
                    <i data-feather="grid"></i>
                    <span>Manage Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('product.index') }}"><i class="ti-more"></i>All Products</a></li>
                    <li><a href="{{ route('product.create') }}"><i class="ti-more"></i>Create Product</a>
                    </li>
                </ul>
            </li>
            {{-- Slider --}}
            <li class="treeview {{ request()->segment(2) == 'slider' ? 'active' : '' }}">
                <a href="{{ route('slider.index') }}">
                    <i data-feather="grid"></i>
                    <span>Manage Sliders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('slider.index') }}"><i class="ti-more"></i>All Sliders</a></li>
                    <li><a href="{{ route('slider.create') }}"><i class="ti-more"></i>Create Slider</a>
                    </li>
                </ul>
            </li>
            {{-- Coupon --}}
            <li class="treeview {{ request()->segment(2) == 'coupon' ? 'active' : '' }}">
                <a href="{{ route('coupon.index') }}">
                    <i data-feather="grid"></i>
                    <span>Manage Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('coupon.index') }}"><i class="ti-more"></i>All Coupons</a></li>
                    <li><a href="{{ route('coupon.create') }}"><i class="ti-more"></i>Create Coupon</a>
                    </li>
                </ul>
            </li>
            {{-- Ship --}}
            <li class="treeview {{ request()->segment(2) == 'ship' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Manage Ships</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('province.index') }}"><i class="ti-more"></i>All Provinces</a>
                    </li>
                    <li>
                        <a href="{{ route('district.index') }}"><i class="ti-more"></i>All Districts</a>
                    </li>
                    <li>
                        <a href="{{ route('ward.index') }}"><i class="ti-more"></i>All Wards</a>
                    </li>
                </ul>
            </li>
            {{-- Order --}}
            <li class="treeview {{ request()->segment(2) == 'order' ? 'active' : '' }}">
                <a href="{{ route('order.pending') }}">
                    <i data-feather="grid"></i>
                    <span>Manage Orders</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('order.pending') }}"><i class="ti-more"></i>All Orders Pending</a></li>
                    </li>

                    <li>
                        <a href="{{ route('order.confirm.index') }}"><i class="ti-more"></i>All Orders Confirm</a></li>
                    </li>
                </ul>
            </li>
            {{-- User --}}
            <li class="treeview {{ request()->segment(2) == 'slider' ? 'active' : '' }}">
                <a href="{{ route('user.backend.index') }}">
                    <i data-feather="grid"></i>
                    <span>Manage Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.backend.index') }}"><i class="ti-more"></i>All Users</a></li>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="/admin/logout">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                    <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                    <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                    <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                    <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                    <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="credit-card"></i>
                    <span>Cards</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
                    <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
                    <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i>
                    <span>Content</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
                    <li><a href="content_media.html"><i class="ti-more"></i>Media</a></li>
                    <li><a href="content_grid.html"><i class="ti-more"></i>Grid</a></li>
                </ul>
            </li>



        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
