@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        {{ $product->product_name_vi }}
    @else
        {{ $product->product_name_en }}
    @endif
@endsection
@section('content')
    <div style="margin-top: 20px">
        <div class="container">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/">
                            @if (session()->get('language') == 'en')
                                Home
                            @else
                                Trang chủ
                            @endif
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        @if (session()->get('language') == 'en')
                            {{ $product->product_name_en }}
                        @else
                            {{ $product->product_name_vi }}
                        @endif
                    </li>
                </ol>
            </nav>

        </div>
    </div>

    <div class="body-content">
        <div class="container">
            <div class="row single-product">
                <div class="col-md-3 sidebar">
                    @include('frontend.components.tag_product')
                </div><!-- /.sidebar -->
                <div class="col-md-9">
                    <div class="detail-block">
                        <div class="row  wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product" class="owl-carousel owl-theme"
                                        style="opacity: 1; display: block;">
                                        <div class="owl-wrapper-outer">
                                            <div class="owl-wrapper" style="width: 5742px; left: 0px; display: block;">
                                                <div class="owl-item" style="width: 319px;">
                                                    <div class="single-product-gallery-item" id="slide1">
                                                        <a data-lightbox="image-1" data-title="Gallery" href="">
                                                            <img class="img-responsive" alt=""
                                                                src="{{ url('upload/products/' . $product->product_thambnail) }}">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="owl-controls clickable">
                                            <div class="owl-pagination">
                                                <div class="owl-page active"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                                <div class="owl-page"><span class=""></span></div>
                                            </div>
                                        </div>
                                    </div><!-- /.single-product-slider -->
                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class="col-sm-6 col-md-7 product-info-block">
                                <div class="product-info">
                                    <h1 class="name" id="pname">
                                        @if (session()->get('language') == 'en')
                                            {{ $product->product_name_en }}
                                        @else
                                            {{ $product->product_name_vi }}
                                        @endif
                                    </h1>

                                    @php
                                        $reviewcount = App\Models\Review::where('product_id', $product->id)
                                            ->latest()
                                            ->get();

                                        $avarage = App\Models\Review::where('product_id', $product->id)->avg('rating');

                                    @endphp
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                @if ($avarage == 0)
                                                    No Rating Yet
                                                @elseif($avarage == 1 || $avarage < 2)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 2 || $avarage < 3)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 3 || $avarage < 4)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 4 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                @elseif($avarage == 5 || $avarage < 5)
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                @endif
                                                <div class="rating rateit-small riatet">
                                                    <button id="rateit-reset-5"
                                                        data-role="none" class="rateit-reset" aria-label="reset rating"
                                                        aria-controls="rateit-range-4" style="display: none;">
                                                    </button>
                                                </div>

                                            </div>



                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">
                                                        ({{ count($reviewcount) }} Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="description-container m-t-20">
                                        @if (session()->get('language') == 'en')
                                            {!! $product->short_desciption_en !!}
                                        @else
                                            {!! $product->short_desciption_en !!}
                                        @endif
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">

                                            @php
                                                $discount = (100 - $product->discount_price) / 100;
                                                $sellingPrice = $product->product_price * $discount;
                                            @endphp
                                            <div class="col-sm-6">
                                                @if ($product->discount_price == null)
                                                    <div class="price-box">
                                                        <span class="price">
                                                            {{ number_format($product->product_price, 0, '.') }}₫
                                                        </span>
                                                    </div>
                                                @else
                                                    <div class="price-box">
                                                        <span class="price">
                                                            {{ number_format($sellingPrice, 0, '.') }}₫
                                                        </span>
                                                        <span class="price-strike">
                                                            {{ number_format($product->product_price, 0, '.') }}₫
                                                        </span>
                                                    </div>
                                                @endif

                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="right" title="" href="#"
                                                        data-original-title="Wishlist">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="right" title="" href="#"
                                                        data-original-title="Add to Compare">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                        data-placement="right" title="" href="#"
                                                        data-original-title="E-mail">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    {{-- Choose color and size --}}
                                    <div class="price-container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="info-title control-label">

                                                        @if (session()->get('language') == 'en')
                                                            Choose Color
                                                        @else
                                                            Chọn Màu Sắc
                                                        @endif

                                                    </label>
                                                    <select class="form-control unicase-form-control selectpicker"
                                                        style="display: none;" id="color">
                                                        @if (session()->get('language') == 'en')
                                                            <option selected="" disabled="">-- Choose Color --
                                                            </option>
                                                            @foreach ($productColorEn as $color)
                                                                <option value="{{ $color }}">{{ ucwords($color) }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                            <option selected="" disabled="">-- Chọn màu sắc --
                                                            </option>
                                                            @foreach ($productColorVi as $color)
                                                                <option value="{{ $color }}">{{ ucwords($color) }}
                                                                </option>
                                                            @endforeach
                                                        @endif


                                                    </select>

                                                </div> <!-- // end form group -->
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="info-title control-label">

                                                        @if (session()->get('language') == 'en')
                                                            Choose Size
                                                        @else
                                                            Chọn Size
                                                        @endif

                                                    </label>
                                                    <select class="form-control unicase-form-control selectpicker"
                                                        style="display: none;" id="size">
                                                        @if (session()->get('language') == 'en')
                                                            <option selected="" disabled="">-- Choose Size --
                                                            </option>
                                                            @foreach ($productSizeEn as $size)
                                                                <option value="{{ $size }}">{{ ucwords($size) }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                            <option selected="" disabled="">-- Chọn Size --</option>
                                                            @foreach ($productSizeVi as $size)
                                                                <option value="{{ $size }}">{{ ucwords($size) }}
                                                                </option>
                                                            @endforeach
                                                        @endif


                                                    </select>

                                                </div> <!-- // end form group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">

                                                    @if (session()->get('language') == 'en')
                                                        Qty :
                                                    @else
                                                        Số lượng:
                                                    @endif
                                                </span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="hidden" id="product_id" value="{{ $product->id }}"
                                                min="1">
                                            <div class="col-sm-7">
                                                <button type="submit" onclick="addCart()" class="btn btn-primary">
                                                    <i class="fa fa-shopping-cart inner-right-vs"></i>
                                                    @if (session()->get('language') == 'en')
                                                        ADD TO CART
                                                    @else
                                                        THÊM VÀO GIỎ HÀNG
                                                    @endif
                                                </button>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->






                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp"
                        style="visibility: hidden; animation-name: none;">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active">
                                        <a data-toggle="tab" href="#description">
                                            @if (session()->get('language') == 'en')
                                                DESCRIPTION
                                            @else
                                                Mô Tả
                                            @endif
                                        </a>
                                    </li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                @if (session()->get('language') == 'en')
                                                    {!! $product->long_desciption_en !!}
                                                @else
                                                    {!! $product->long_desciption_vi !!}
                                                @endif
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                @php
                                                    $reviews = App\Models\Review::where('product_id', $product->id)
                                                        ->latest()
                                                        ->limit(5)
                                                        ->get();
                                                @endphp

                                                <div class="reviews">

                                                    @foreach ($reviews as $item)
                                                        <div class="review">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <img style="border-radius: 50%"
                                                                        src="{{ !empty($item->user->avatar) ? url('upload/user_images/' . $item->user->avatar) : url('upload/no_image.jpg') }}"
                                                                        width="60px;" height="60px;"><b>
                                                                        {{ $item->user->name }}</b>


                                                                    @if ($item->rating == null)
                                                                    @elseif($item->rating == 1)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    @elseif($item->rating == 2)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    @elseif($item->rating == 3)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    @elseif($item->rating == 4)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    @elseif($item->rating == 5)
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                        <span class="fa fa-star checked"></span>
                                                                    @endif


                                                                </div>

                                                                <div class="col-md-6">

                                                                </div>
                                                            </div> <!-- // end row -->
                                                            <div class="review-title"><span
                                                                    class="summary">{{ $item->summary }}</span><span
                                                                    class="date"><i class="fa fa-calendar"></i><span>
                                                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                                    </span></span></div>
                                                            <div class="text">"{{ $item->comment }}"</div>
                                                        </div>
                                                    @endforeach
                                                </div><!-- /.reviews -->


                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <div class="review-table">

                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    @guest
                                                        <p>
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    For Add Product Review. You Need to Login First
                                                                @else
                                                                    Để Thêm Đánh Giá Sản Phẩm. Bạn Cần Phải Đăng Nhập Đầu Tiên
                                                                @endif
                                                                <a href="/login">Login Here</a>
                                                            </b>
                                                        </p>
                                                    @else
                                                        <div class="form-container">

                                                            <form role="form" class="cnt-form" method="post"
                                                                action="{{ route('review.store') }}">
                                                                @csrf

                                                                <input type="hidden" name="product_id"
                                                                    value="{{ $product->id }}">


                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="cell-label">&nbsp;</th>
                                                                            <th>1 star</th>
                                                                            <th>2 stars</th>
                                                                            <th>3 stars</th>
                                                                            <th>4 stars</th>
                                                                            <th>5 stars</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="cell-label">Quality</td>
                                                                            <td><input type="radio" name="quality"
                                                                                    class="radio" value="1"></td>
                                                                            <td><input type="radio" name="quality"
                                                                                    class="radio" value="2"></td>
                                                                            <td><input type="radio" name="quality"
                                                                                    class="radio" value="3"></td>
                                                                            <td><input type="radio" name="quality"
                                                                                    class="radio" value="4"></td>
                                                                            <td><input type="radio" name="quality"
                                                                                    class="radio" value="5"></td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>




                                                                <div class="row">
                                                                    <div class="col-sm-6">

                                                                        <div class="form-group">
                                                                            <label for="exampleInputSummary">Summary <span
                                                                                    class="astk">*</span></label>
                                                                            <input type="text" name="summary"
                                                                                class="form-control txt"
                                                                                id="exampleInputSummary" placeholder="">
                                                                        </div><!-- /.form-group -->
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="exampleInputReview">Review <span
                                                                                    class="astk">*</span></label>
                                                                            <textarea class="form-control txt txt-review" name="comment" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                        </div><!-- /.form-group -->
                                                                    </div>
                                                                </div><!-- /.row -->

                                                                <div class="action text-right">
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-upper">SUBMIT
                                                                        REVIEW</button>
                                                                </div><!-- /.action -->

                                                            </form><!-- /.cnt-form -->
                                                        </div><!-- /.form-container -->

                                                    @endguest


                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->
                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag"
                                                            class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD
                                                        TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use
                                                        single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">
                                @if (session()->get('language') == 'en')
                                    Related Products
                                @else
                                    Sản Phẩm Liên Quan
                                @endif
                            </h3>
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                        @foreach ($relatedProducts as $product)
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
                                                                        <button data-toggle="tooltip"
                                                                            class="btn btn-primary icon" type="button"
                                                                            title="Add Cart"> <i
                                                                                class="fa fa-shopping-cart"></i> </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">Add to cart</button>
                                                                    </li>
                                                                    <li class="lnk wishlist">
                                                                        <a data-toggle="tooltip" class="add-to-cart"
                                                                            href="detail.html" title="Wishlist">
                                                                            <i class="icon fa fa-heart"></i>
                                                                        </a>
                                                                    </li>
                                                                    <li class="lnk">
                                                                        <a data-toggle="tooltip" class="add-to-cart"
                                                                            href="detail.html" title="Compare">
                                                                            <i class="fa fa-signal"
                                                                                aria-hidden="true"></i>
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
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div>
                <div class="clearfix"></div>
            </div><!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div>
@endsection
