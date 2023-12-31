@extends('frontend.main')
@section('title', 'Flipmart Shose')
@section('content')
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                    <!-- ============================================== SIDEBAR Categories ============================================== -->
                    @include('frontend.components.sidebar_category')
                    <!-- /.side-menu -->

                    <!-- ============================================== SIDEBAR Categories ============================================== -->
                    @include('frontend.components.tag_product')


                </div>

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">

                    <!-- ========================================== SLIDER ========================================= -->
                    @include('frontend.components.slider')



                    <!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">
                                @if (session()->get('language') == 'en')
                                    New Products
                                @else
                                    Sản Phẩm Mới
                                @endif
                            </h3>
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                        @foreach ($products as $product)
                                            <div class="item item-carousel">
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
                                                            @php
                                                                $discount = (100 - $product->discount_price) / 100;
                                                                $sellingPrice = $product->product_price * $discount;
                                                            @endphp
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
                                                            <div class="description">
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

                                                        </div>
                                                        <!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon" type="button"
                                                                            data-toggle="modal" data-target="#exampleModal"
                                                                            onclick="productView(this.id)"
                                                                            id="{{ $product->id }}">
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </button>


                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">
                                                                            Add to cart
                                                                        </button>
                                                                    </li>
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-danger" title="Wishlist"
                                                                            type="button" id="{{ $product->id }}"
                                                                            onclick="addToWishList(this.id)">
                                                                            <i class="icon fa fa-heart"></i>
                                                                        </button>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a data-toggle="tooltip" class="add-to-cart"
                                                                            href="#" title="Compare">
                                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                                        </a>
                                                                    </li>
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
                                            <!-- /.item -->
                                        @endforeach

                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">

                            @if (session()->get('language') == 'en')
                                Featured Products
                            @else
                                Sản Phẩm Nổi Bật
                            @endif
                        </h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @foreach ($featured as $productFeatured)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    @if (session()->get('language') == 'en')
                                                        <a
                                                            href="/product/detail/{{ $productFeatured->id }}/{{ $productFeatured->product_slug_en }}">
                                                            <img src="{{ url('upload/products/' . $productFeatured->product_thambnail) }}"
                                                                alt="">
                                                        </a>
                                                    @else
                                                        <a
                                                            href="/product/detail/{{ $productFeatured->id }}/{{ $productFeatured->product_slug_vi }}">
                                                            <img src="{{ url('upload/products/' . $productFeatured->product_thambnail) }}"
                                                                alt="">
                                                        </a>
                                                    @endif
                                                </div>
                                                @php
                                                    $discount = (100 - $productFeatured->discount_price) / 100;
                                                    $sellingPrice = $productFeatured->product_price * $discount;
                                                @endphp
                                                <!-- /.image -->
                                                @if ($productFeatured->discount_price == null)
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
                                                            - {{ $productFeatured->discount_price }}%
                                                        </span>
                                                    </div>
                                                @endif

                                            </div>
                                            <!-- /.product-image -->

                                            <div class="product-info text-left">
                                                <h3 class="name">
                                                    @if (session()->get('language') == 'en')
                                                        <a
                                                            href="/product/detail/{{ $productFeatured->id }}/{{ $productFeatured->product_slug_en }}">
                                                            {{ $productFeatured->product_name_en }}
                                                        </a>
                                                    @else
                                                        <a
                                                            href="/product/detail/{{ $productFeatured->id }}/{{ $productFeatured->product_slug_vi }}">
                                                            {{ $productFeatured->product_name_vi }}
                                                        </a>
                                                    @endif
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description">
                                                    @if (session()->get('language') == 'en')
                                                        {!! $product->short_desciption_en !!}
                                                    @else
                                                        {!! $product->short_desciption_vi !!}
                                                    @endif
                                                </div>
                                                @if ($productFeatured->discount_price == null)
                                                    <div class="product-price">
                                                        <span class="price">
                                                            {{ number_format($productFeatured->product_price, 0, '.') }}₫
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="product-price">
                                                        <span class="price">
                                                            {{ number_format($sellingPrice, 0, '.') }}₫
                                                        </span>
                                                        <span class="price-before-discount">
                                                            {{ number_format($productFeatured->product_price, 0, '.') }}₫

                                                        </span>
                                                    </div>
                                                @endif

                                            </div>
                                            <!-- /.product-info -->
                                            <div class="cart clearfix animate-effect">
                                                <div class="action">
                                                    <ul class="list-unstyled">
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-primary icon" type="button"
                                                                title="Add Cart" data-toggle="modal"
                                                                data-target="#exampleModal" id="{{ $productFeatured->id }}"
                                                                onclick="productView(this.id)"> <i
                                                                    class="fa fa-shopping-cart"></i> </button>


                                                            <button class="btn btn-primary cart-btn" type="button">
                                                                Add to cart
                                                            </button>
                                                        </li>
                                                        <li class="add-cart-button btn-group">
                                                            <button class="btn btn-danger" title="Wishlist"
                                                                type="button" id="{{ $productFeatured->id }}"
                                                                onclick="addToWishList(this.id)">
                                                                <i class="icon fa fa-heart"></i>
                                                            </button>
                                                        </li>
                                                        <li class="lnk">
                                                            <a data-toggle="tooltip" class="add-to-cart"
                                                                href="#" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        </li>
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
                        <!-- /.home-owl-carousel -->
                    </section>
                    <!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
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
