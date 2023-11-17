<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        @foreach ($sliders as $slider)
            <div class="item" style="background-image: url({{ 'upload/slider/' . $slider->slider_image }});">
                <div class="container-fluid">
                    <div class="caption bg-color vertical-center text-left">
                        <div class="big-text fadeInDown-1">
                            @if (session()->get('language') == 'en')
                                {{ $slider->slider_title_en }}
                            @else
                                {{ $slider->slider_title_vi }}
                            @endif
                        </div>
                        <div class="excerpt fadeInDown-2 hidden-xs">
                            <span>
                                @if (session()->get('language') == 'en')
                                    {!! $slider->slider_description_en !!}
                                @else
                                    {!! $slider->slider_description_vi !!}
                                @endif

                            </span>
                        </div>
                        <div class="button-holder fadeInDown-3">
                            <a href="index.php?page=single-product"
                                class="btn-lg btn btn-uppercase btn-primary shop-now-button">

                                @if (session()->get('language') == 'en')
                                    Shop Now
                                @else
                                    Mua Hàng Ngay
                                @endif
                            </a>
                        </div>
                    </div>
                    <!-- /.caption -->
                </div>
                <!-- /.container-fluid -->
            </div>
        @endforeach
        <!-- /.item -->
    </div>
    <!-- /.owl-carousel -->
</div>

<!-- ============================================== INFO BOXES ============================================== -->
<div class="info-boxes wow fadeInUp">
    <div class="info-boxes-inner">
        <div class="row">
            <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="info-box-heading green">
                                @if (session()->get('language') == 'en')
                                    Money back
                                @else
                                    Hoàn lại tiền
                                @endif
                            </h4>
                        </div>
                    </div>
                    <h6 class="text">

                        @if (session()->get('language') == 'en')
                            30 Days Money Back Guarantee
                        @else
                            Đảm bảo hoàn tiền trong 30 ngày
                        @endif
                    </h6>
                </div>
            </div>
            <!-- .col -->

            <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="info-box-heading green">
                                @if (session()->get('language') == 'en')
                                    Free shipping
                                @else
                                    Vận chuyển cho đơn hàng trên 500.000đ
                                @endif
                            </h4>
                        </div>
                    </div>
                    <h6 class="text">
                        @if (session()->get('language') == 'en')
                            Shipping on orders over $99
                        @else
                            Miễn phí vận chuyển
                        @endif

                    </h6>
                </div>
            </div>
            <!-- .col -->

            <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                    <div class="row">
                        <div class="col-xs-12">
                            <h4 class="info-box-heading green">

                                @if (session()->get('language') == 'en')
                                    Special Sale
                                @else
                                    Giảm giá đặc biệt
                                @endif
                            </h4>
                        </div>
                    </div>
                    <h6 class="text">

                        @if (session()->get('language') == 'en')
                            Extra $5 off on all items
                        @else
                            Giảm thêm 200.000đ cho tất cả các mặt hàng
                        @endif
                    </h6>
                </div>
            </div>
            <!-- .col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.info-boxes-inner -->

</div>
