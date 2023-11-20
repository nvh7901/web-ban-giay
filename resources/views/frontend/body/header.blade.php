<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li>
                            <a href="/user/dashboard">
                                <i class="icon fa fa-user"></i>
                                @if (session()->get('language') == 'en')
                                    My Account
                                @else
                                    Trang cá nhân
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="/wishlist">
                                <i class="icon fa fa-heart">
                                </i>

                                @if (session()->get('language') == 'en')
                                    Wishlist
                                @else
                                    Yêu Thích
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon fa fa-shopping-cart"></i>
                                @if (session()->get('language') == 'en')
                                    Cart
                                @else
                                    Giỏ hàng
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon fa fa-check"></i>
                                @if (session()->get('language') == 'en')
                                    Checkout
                                @else
                                    Thanh toán
                                @endif
                            </a>
                        </li>
                        <li>
                            @if (Auth::check())
                                <a href="/log-out">
                                    <i class="icon fa fa-lock"></i>
                                    @if (session()->get('language') == 'en')
                                        Logout
                                    @else
                                        Đăng xuất
                                    @endif
                                </a>
                            @else
                                <a href="/login">
                                    <i class="icon fa fa-lock"></i>
                                    @if (session()->get('language') == 'en')
                                        Login
                                    @else
                                        Đăng nhập
                                    @endif
                                </a>
                            @endif
                        </li>
                        <li>
                            @if (Auth::check())
                            @else
                                <a href="/register">
                                    <i class="icon fa fa-lock"></i>
                                    @if (session()->get('language') == 'en')
                                        Register
                                    @else
                                        Đăng ký
                                    @endif
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                <span class="value">
                                    @if (session()->get('language') == 'en')
                                        Language
                                    @else
                                        Ngôn ngữ
                                    @endif
                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('language.en') }}">English</a></li>
                                <li><a href="{{ route('language.vi') }}">Việt Nam</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-2 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo"> <a href="/"> <img src="{{ asset('frontend/assets/images/logo.png') }}"
                                alt="logo"> </a>
                    </div>
                    <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="total-price-basket">
                                    <span class="lbl">
                                        @if (session()->get('language') == 'en')
                                            cart -
                                        @else
                                            Giỏ hàng -
                                        @endif
                                    </span>
                                    <span class="total-price">
                                        <span class="value" id="cartSubTotal"></span>
                                        <span class="sign">đ</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div id="miniCart">

                                </div>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">
                                            @if (session()->get('language') == 'en')
                                                Sub Total :
                                            @else
                                                Tổng tiền :
                                            @endif
                                        </span>
                                        <span class='price' id="cartSubTotal"> </span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">
                                        @if (session()->get('language') == 'en')
                                            Checkout
                                        @else
                                            Đặt hàng
                                        @endif
                                    </a>
                                </div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
                </div>
                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="/" data-hover="dropdown" class="dropdown-toggle">
                                        @if (session()->get('language') == 'en')
                                            Home
                                        @else
                                            Trang chủ
                                        @endif
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu">
                                        <a href="/product/category/{{ $category->id }}/{{ $category->category_slug_en }}"
                                            data-hover="dropdown" class="dropdown-toggle">
                                            @if (session()->get('language') == 'en')
                                                {{ $category->category_name_en }}
                                            @else
                                                {{ $category->category_name_vi }}
                                            @endif
                                        </a>

                                        @php
                                            $subCategories = App\Models\SubCategory::where('category_id', $category->id)
                                                ->orderBy('id', 'ASC')
                                                ->get();
                                        @endphp

                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        @foreach ($subCategories as $sub_category)
                                                            <div class="col-xs-12 col-sm-6 col-md-3 col-menu">
                                                                <h2 class="title">
                                                                    <a
                                                                        href="{{ url('product/sub-category/' . $sub_category->id . '/' . $sub_category->sub_category_slug_en) }}">
                                                                        @if (session()->get('language') == 'en')
                                                                            {{ $sub_category->sub_category_name_en }}
                                                                        @else
                                                                            {{ $sub_category->sub_category_name_vi }}
                                                                        @endif

                                                                    </a>
                                                                </h2>
                                                            </div>
                                                        @endforeach

                                                        <!-- /.col -->


                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    <!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
