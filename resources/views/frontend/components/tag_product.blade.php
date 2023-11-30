<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">
        @if (session()->get('language') == 'en')
            hot deals
        @else
            Ưu đãi lớn
        @endif
    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach ($hotDeals as $productHotDeals)
            <div class="item">
                @php
                    $discount = (100 - $productHotDeals->discount_price) / 100;
                    $sellingPrice = $productHotDeals->product_price * $discount;
                @endphp
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <img src="{{ url('upload/products/' . $productHotDeals->product_thambnail) }}">
                        </div>
                        @if ($productHotDeals->discount_price == null)
                            <div class="sale-new-tag">
                                <span>New<br>
                                    Item
                                </span>
                            </div>
                        @else
                            <div class="sale-offer-tag">
                                <span>- {{ $productHotDeals->discount_price }}%<br>
                                    off
                                </span>
                            </div>
                        @endif

                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name">
                            @if (session()->get('language') == 'en')
                                <a
                                    href="/product/detail/{{ $productHotDeals->id }}/{{ $productHotDeals->product_slug_en }}">
                                    {{ $productHotDeals->product_name_en }}
                                </a>
                            @else
                                <a
                                    href="/product/detail/{{ $productHotDeals->id }}/{{ $productHotDeals->product_slug_vi }}">
                                    {{ $productHotDeals->product_name_vi }}
                                </a>
                            @endif
                        </h3>
                        <div class="rating rateit-small"></div>
                        <div class="description">
                            @if (session()->get('language') == 'en')
                                {!! $productHotDeals->short_desciption_en !!}
                            @else
                                {!! $productHotDeals->short_desciption_vi !!}
                            @endif
                        </div>
                        @if ($productHotDeals->discount_price == null)
                            <div class="product-price">
                                <span class="price">
                                    {{ number_format($productHotDeals->product_price, 0, '.') }}₫
                                </span>
                            </div>
                        @else
                            <div class="product-price">
                                <span class="price">
                                    {{ number_format($sellingPrice, 0, '.') }}₫
                                </span>
                                <span class="price-before-discount">
                                    {{ number_format($productHotDeals->product_price, 0, '.') }}₫

                                </span>
                            </div>
                        @endif
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" data-toggle="modal"
                                    data-target="#exampleModal" onclick="productView(this.id)"
                                    id="{{ $productHotDeals->id }}">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach


    </div>
    <!-- /.sidebar-widget -->
</div>
<!-- ============================================== HOT DEALS: END ============================================== -->

<!-- ============================================== SPECIAL OFFER ============================================== -->

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">
        @if (session()->get('language') == 'en')
            Special Offers Today
        @else
            Ưu đãi hôm nay
        @endif
    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach ($specialOffer as $productSpecialOffer)
            <div class="item">
                @php
                    $discount = (100 - $productSpecialOffer->discount_price) / 100;
                    $sellingPrice = $productSpecialOffer->product_price * $discount;
                @endphp
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <img src="{{ url('upload/products/' . $productSpecialOffer->product_thambnail) }}">
                        </div>
                        @if ($productSpecialOffer->discount_price == null)
                            <div class="sale-new-tag">
                                <span>New<br>
                                    Item
                                </span>
                            </div>
                        @else
                            <div class="sale-offer-tag">
                                <span>- {{ $productSpecialOffer->discount_price }}%<br>
                                    off
                                </span>
                            </div>
                        @endif

                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name">
                            @if (session()->get('language') == 'en')
                                <a
                                    href="/product/detail/{{ $productSpecialOffer->id }}/{{ $productSpecialOffer->product_slug_en }}">
                                    {{ $productSpecialOffer->product_name_en }}
                                </a>
                            @else
                                <a
                                    href="/product/detail/{{ $productSpecialOffer->id }}/{{ $productSpecialOffer->product_slug_vi }}">
                                    {{ $productSpecialOffer->product_name_vi }}
                                </a>
                            @endif
                        </h3>
                        <div class="rating rateit-small"></div>
                        <div class="description">
                            @if (session()->get('language') == 'en')
                                {!! $productSpecialOffer->short_desciption_en !!}
                            @else
                                {!! $productSpecialOffer->short_desciption_vi !!}
                            @endif
                        </div>
                        @if ($productSpecialOffer->discount_price == null)
                            <div class="product-price">
                                <span class="price">
                                    {{ number_format($productSpecialOffer->product_price, 0, '.') }}₫
                                </span>
                            </div>
                        @else
                            <div class="product-price">
                                <span class="price">
                                    {{ number_format($sellingPrice, 0, '.') }}₫
                                </span>
                                <span class="price-before-discount">
                                    {{ number_format($productSpecialOffer->product_price, 0, '.') }}₫

                                </span>
                            </div>
                        @endif
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" data-toggle="modal"
                                    data-target="#exampleModal" onclick="productView(this.id)"
                                    id="{{ $productSpecialOffer->id }}">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach


    </div>
    <!-- /.sidebar-widget -->
</div>
<!-- /.sidebar-widget -->
<!-- ============================================== SPECIAL OFFER : END ============================================== -->
<!-- ============================================== SPECIAL DEALS ============================================== -->

<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">
        @if (session()->get('language') == 'en')
            Special Deals
        @else
            Ưu đãi đặc biệt
        @endif
    </h3>
    <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
        @foreach ($pecialDeal as $productSpecialDeal)
            <div class="item">
                @php
                    $discount = (100 - $productSpecialDeal->discount_price) / 100;
                    $sellingPrice = $productSpecialDeal->product_price * $discount;
                @endphp
                <div class="products">
                    <div class="hot-deal-wrapper">
                        <div class="image">
                            <img src="{{ url('upload/products/' . $productSpecialDeal->product_thambnail) }}">
                        </div>
                        @if ($productSpecialDeal->discount_price == null)
                            <div class="sale-new-tag">
                                <span>New<br>
                                    Item
                                </span>
                            </div>
                        @else
                            <div class="sale-offer-tag">
                                <span>- {{ $productSpecialDeal->discount_price }}%<br>
                                    off
                                </span>
                            </div>
                        @endif

                    </div>
                    <!-- /.hot-deal-wrapper -->

                    <div class="product-info text-left m-t-20">
                        <h3 class="name">
                            @if (session()->get('language') == 'en')
                                <a
                                    href="/product/detail/{{ $productSpecialDeal->id }}/{{ $productSpecialDeal->product_slug_en }}">
                                    {{ $productSpecialDeal->product_name_en }}
                                </a>
                            @else
                                <a
                                    href="/product/detail/{{ $productSpecialDeal->id }}/{{ $productSpecialDeal->product_slug_vi }}">
                                    {{ $productSpecialDeal->product_name_vi }}
                                </a>
                            @endif
                        </h3>
                        <div class="rating rateit-small"></div>
                        <div class="description">
                            @if (session()->get('language') == 'en')
                                {!! $productSpecialDeal->short_desciption_en !!}
                            @else
                                {!! $productSpecialDeal->short_desciption_vi !!}
                            @endif
                        </div>
                        @if ($productSpecialDeal->discount_price == null)
                            <div class="product-price">
                                <span class="price">
                                    {{ number_format($productSpecialDeal->product_price, 0, '.') }}₫
                                </span>
                            </div>
                        @else
                            <div class="product-price">
                                <span class="price">
                                    {{ number_format($sellingPrice, 0, '.') }}₫
                                </span>
                                <span class="price-before-discount">
                                    {{ number_format($productSpecialDeal->product_price, 0, '.') }}₫

                                </span>
                            </div>
                        @endif
                        <!-- /.product-price -->

                    </div>
                    <!-- /.product-info -->

                    <div class="cart clearfix animate-effect">
                        <div class="action">
                            <div class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" type="button" data-toggle="modal"
                                    data-target="#exampleModal" onclick="productView(this.id)"
                                    id="{{ $productSpecialDeal->id }}">
                                    <i class="fa fa-shopping-cart"></i>
                                </button>
                                
                            </div>
                        </div>
                        <!-- /.action -->
                    </div>
                    <!-- /.cart -->
                </div>
            </div>
        @endforeach


    </div>
    <!-- /.sidebar-widget -->
</div>
<!-- /.sidebar-widget -->
<!-- ============================================== SPECIAL DEALS : END ============================================== -->
