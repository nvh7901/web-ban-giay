@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        Category
    @else
        Loại sản phẩm
    @endif
@endsection
@section('content')
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-3 sidebar">
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    @include('frontend.components.sidebar_category')
                    <!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->
                </div>
                <!-- /.sidebar -->
                <div class="col-md-9">



                    <div class="clearfix filters-container">
                        <div class="row">
                            <div class="col col-sm-6 col-md-2">
                                <div class="filter-tabs">
                                    <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                        <li class="active">
                                            <a data-toggle="tab" href="#grid-container">
                                                <i class="icon fa fa-th-large"></i>

                                                @if (session()->get('language') == 'en')
                                                    Grid
                                                @else
                                                    Lưới
                                                @endif
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#list-container">
                                                <i class="icon fa fa-th-list"></i>
                                                @if (session()->get('language') == 'en')
                                                    List
                                                @else
                                                    Danh sách
                                                @endif
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- /.filter-tabs -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="search-result-container ">
                        <div id="myTabContent" class="tab-content category-list">
                            <div class="tab-pane active " id="grid-container">
                                <div class="category-product">
                                    <div class="row">
                                        @foreach ($products as $product)
                                            <div class="col-sm-6 col-md-4 wow fadeInUp animated"
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                @if (session()->get('language') == 'en')
                                                                    <a
                                                                        href="/product/detail/{{ $product->id }}/{{ $product->product_slug_en }}">
                                                                        <img src="{{ url('upload/products/' . $product->product_thambnail) }}"
                                                                            alt="">
                                                                    </a>
                                                                @else
                                                                    <a
                                                                        href="/product/detail/{{ $product->id }}/{{ $product->product_slug_vi }}">
                                                                        <img src="{{ url('upload/products/' . $product->product_thambnail) }}"
                                                                            alt="">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <!-- /.image -->

                                                            @if ($product->discount_price == null)
                                                                <div class="tag new">
                                                                    <span>
                                                                        @if (session()->get('language') == 'en')
                                                                            New
                                                                        @else
                                                                            Mới
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            @else
                                                                <div class="tag hot">
                                                                    <span>
                                                                        - {{ $product->discount_price }}%
                                                                    </span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <!-- /.product-image -->
                                                        @php
                                                            $discount = (100 - $product->discount_price) / 100;
                                                            $sellingPrice = $product->product_price * $discount;
                                                        @endphp
                                                        <div class="product-info text-left">
                                                            <h3 class="name">
                                                                @if (session()->get('language') == 'en')
                                                                    <a
                                                                        href="/product/detail/{{ $product->id }}/{{ $product->product_slug_en }}">
                                                                        {{ $product->product_name_en }}
                                                                    </a>
                                                                @else
                                                                    <a
                                                                        href="/product/detail/{{ $product->id }}/{{ $product->product_slug_vi }}">
                                                                        {{ $product->product_name_vi }}
                                                                    </a>
                                                                @endif
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description m-t-10">
                                                                @if (session()->get('language') == 'en')
                                                                    {!! $product->short_desciption_en !!}
                                                                @else
                                                                    {!! $product->short_desciption_vi !!}
                                                                @endif
                                                            </div>
                                                            @if ($product->discount_price == null)
                                                                <div class="product-price">
                                                                    <span class="price">
                                                                        {{ number_format($product->product_price, 0, '.') }}₫
                                                                    </span>
                                                                </div>
                                                            @else
                                                                <div class="product-price">
                                                                    <span class="price">
                                                                        {{ number_format($sellingPrice, 0, '.') }}₫
                                                                    </span>
                                                                    <span class="price-before-discount">
                                                                        {{ number_format($product->product_price, 0, '.') }}₫

                                                                    </span>
                                                                </div>
                                                            @endif
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon"
                                                                            data-toggle="dropdown" type="button"> <i
                                                                                class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">Add to cart</button>
                                                                    </li>
                                                                    <li class="lnk wishlist"> <a class="add-to-cart"
                                                                            href="detail.html" title="Wishlist"> <i
                                                                                class="icon fa fa-heart"></i> </a> </li>
                                                                    <li class="lnk"> <a class="add-to-cart"
                                                                            href="detail.html" title="Compare"> <i
                                                                                class="fa fa-signal"></i> </a> </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->

                                                </div>
                                                <!-- /.products -->
                                            </div>
                                        @endforeach

                                        <!-- /.item -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.category-product -->

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane " id="list-container">
                                <div class="category-product">
                                    @foreach ($products as $product)
                                        <div class="category-product-inner wow fadeInUp animated"
                                            style="visibility: visible; animation-name: fadeInUp;">
                                            <div class="products">
                                                <div class="product-list product">
                                                    <div class="row product-list-row">
                                                        <div class="col col-sm-4 col-lg-4">
                                                            <div class="product-image">
                                                                @if (session()->get('language') == 'en')
                                                                    <a
                                                                        href="/product/detail/{{ $product->id }}/{{ $product->product_slug_en }}">
                                                                        <img src="{{ url('upload/products/' . $product->product_thambnail) }}"
                                                                            alt="">
                                                                    </a>
                                                                @else
                                                                    <a
                                                                        href="/product/detail/{{ $product->id }}/{{ $product->product_slug_vi }}">
                                                                        <img src="{{ url('upload/products/' . $product->product_thambnail) }}"
                                                                            alt="">
                                                                    </a>
                                                                @endif
                                                            </div>
                                                            <!-- /.product-image -->
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col col-sm-8 col-lg-8">
                                                            <div class="product-info">
                                                                <h3 class="name">
                                                                    @if (session()->get('language') == 'en')
                                                                        <a
                                                                            href="/product/detail/{{ $product->id }}/{{ $product->product_slug_en }}">
                                                                            {{ $product->product_name_en }}
                                                                        </a>
                                                                    @else
                                                                        <a
                                                                            href="/product/detail/{{ $product->id }}/{{ $product->product_slug_vi }}">
                                                                            {{ $product->product_name_vi }}
                                                                        </a>
                                                                    @endif
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                @if ($product->discount_price == null)
                                                                    <div class="product-price">
                                                                        <span class="price">
                                                                            {{ number_format($product->product_price, 0, '.') }}₫
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="product-price">
                                                                        <span class="price">
                                                                            {{ number_format($sellingPrice, 0, '.') }}₫
                                                                        </span>
                                                                        <span class="price-before-discount">
                                                                            {{ number_format($product->product_price, 0, '.') }}₫

                                                                        </span>
                                                                    </div>
                                                                @endif
                                                                <!-- /.product-price -->
                                                                <div class="description m-t-10">
                                                                    @if (session()->get('language') == 'en')
                                                                        {!! $product->short_desciption_en !!}
                                                                    @else
                                                                        {!! $product->short_desciption_vi !!}
                                                                    @endif
                                                                </div>
                                                                <div class="cart clearfix animate-effect">
                                                                    <div class="action">
                                                                        <ul class="list-unstyled">
                                                                            <li class="add-cart-button btn-group">
                                                                                <button class="btn btn-primary icon"
                                                                                    data-toggle="dropdown" type="button">
                                                                                    <i class="fa fa-shopping-cart"></i>
                                                                                </button>
                                                                                <button class="btn btn-primary cart-btn"
                                                                                    type="button">Add to cart</button>
                                                                            </li>
                                                                            <li class="lnk wishlist"> <a
                                                                                    class="add-to-cart" href="detail.html"
                                                                                    title="Wishlist"> <i
                                                                                        class="icon fa fa-heart"></i> </a>
                                                                            </li>
                                                                            <li class="lnk"> <a class="add-to-cart"
                                                                                    href="detail.html" title="Compare"> <i
                                                                                        class="fa fa-signal"></i> </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <!-- /.action -->
                                                                </div>
                                                                <!-- /.cart -->

                                                            </div>
                                                            <!-- /.product-info -->
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.product-list-row -->
                                                    @if ($product->discount_price == null)
                                                        <div class="tag new">
                                                            <span>
                                                                @if (session()->get('language') == 'en')
                                                                    New
                                                                @else
                                                                    Mới
                                                                @endif
                                                            </span>
                                                        </div>
                                                    @else
                                                        <div class="tag hot">
                                                            <span>
                                                                - {{ $product->discount_price }}%
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                                <!-- /.product-list -->
                                            </div>
                                            <!-- /.products -->
                                        </div>
                                    @endforeach
                                    <!-- /.category-product-inner -->
                                </div>
                                <!-- /.category-product -->
                            </div>
                            <!-- /.tab-pane #list-container -->
                        </div>
                        <!-- /.tab-content -->
                        {{ $products->links('frontend.components.paginate') }}

                        <!-- /.filters-container -->

                    </div>
                    <!-- /.search-result-container -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.components.brands')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div>
        <!-- /.container -->

    </div>
@endsection
