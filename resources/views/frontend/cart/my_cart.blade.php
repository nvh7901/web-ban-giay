@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        My Cart
    @else
        Giỏ hàng của tôi
    @endif
@endsection
@section('content')
    <div class="body-content outer-top-xs" style="margin-bottom: 20px">
        <div class="container">
            <div class="row">
                <div class="shopping-cart">
                    <div class="shopping-cart-table ">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-romove item">
                                            @if (session()->get('language') == 'en')
                                                Image
                                            @else
                                                Hình Ảnh
                                            @endif
                                        </th>
                                        <th class="cart-description item">
                                            @if (session()->get('language') == 'en')
                                                Product Name
                                            @else
                                                Tên Sản Phẩm
                                            @endif
                                        </th>
                                        <th class="cart-product-name item">
                                            @if (session()->get('language') == 'en')
                                                Color
                                            @else
                                                Màu
                                            @endif
                                        </th>
                                        <th class="cart-edit item">
                                            @if (session()->get('language') == 'en')
                                                Size
                                            @else
                                                Size
                                            @endif
                                        </th>
                                        <th class="cart-qty item">
                                            @if (session()->get('language') == 'en')
                                                Quantity
                                            @else
                                                Số Lượng
                                            @endif
                                        </th>
                                        <th class="cart-sub-total item">
                                            @if (session()->get('language') == 'en')
                                                Sub Total
                                            @else
                                                Tổng Tiền
                                            @endif
                                        </th>
                                        <th class="cart-total last-item">
                                            @if (session()->get('language') == 'en')
                                                Action
                                            @else
                                                Thao Tác
                                            @endif
                                        </th>
                                    </tr>
                                </thead>

                                <tbody id="myCart">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    </div>
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                        @if (Session::has('coupon'))
                        @else
                            <table class="table" id="couponField">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="estimate-title">
                                                @if (session()->get('language') == 'en')
                                                    Discount Code
                                                @else
                                                    Mã giảm giá
                                                @endif
                                            </span>
                                            <p>
                                                @if (session()->get('language') == 'en')
                                                    Enter your coupon code if you have one..
                                                @else
                                                    Nhập mã phiếu giảm giá của bạn nếu bạn có..
                                                @endif
                                            </p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control unicase-form-control text-input"
                                                    id="coupon_name">
                                            </div>
                                            <div class="clearfix pull-right">
                                                <button type="submit" class="btn-upper btn btn-primary"
                                                    onclick="applyCoupon()">
                                                    @if (session()->get('language') == 'en')
                                                        APPLY COUPON
                                                    @else
                                                        ÁP DỤNG PHIẾU GIẢM GIÁ
                                                    @endif
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody><!-- /tbody -->
                            </table><!-- /table -->
                        @endif


                    </div><!-- /.estimate-ship-tax -->





                    <div class="col-md-4 col-sm-12 cart-shopping-total">
                        <table class="table">
                            <thead id="couponCalField">

                            </thead><!-- /thead -->
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="cart-checkout-btn pull-right">
                                            <a href="{{ route('checkout') }}" type="submit" class="btn btn-primary checkout-btn">

                                                @if (session()->get('language') == 'en')
                                                    CHEKOUT
                                                @else
                                                    ĐẶT HÀNG
                                                @endif
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.cart-shopping-total -->
                </div><!-- /.row -->


            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div>
@endsection
