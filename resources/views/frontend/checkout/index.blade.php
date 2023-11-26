@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        Checkout
    @else
        Thanh toán giỏ hàng
    @endif
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="checkout-box ">
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">

                                <!-- panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion"
                                            href="#collapseOne">
                                            <span>#</span>
                                            @if (session()->get('language') == 'en')
                                                Fill In Order Information
                                            @else
                                                Điền Thông Tin Đặt Hàng
                                            @endif
                                        </a>
                                    </h4>
                                </div>
                                <!-- panel-heading -->

                                <div id="collapseOne" class="panel-collapse collapse in">

                                    <!-- panel-body  -->
                                    <div class="panel-body">
                                        <div class="row">
                                            <form class="register-form" method="POST"
                                                action="{{ route('checkout.store') }}">
                                                @csrf
                                                <div class="col-md-6 col-sm-6 guest-login">
                                                    <!-- radio-form  -->
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    Name
                                                                @else
                                                                    Họ và tên
                                                                @endif
                                                            </b>
                                                            <span>*</span>
                                                        </label>
                                                        <input type="text" name="ship_name"
                                                            class="form-control unicase-form-control text-input"
                                                            id="exampleInputEmail1" value="{{ Auth::user()->name }}"
                                                            required="">
                                                    </div> <!-- // end form group  -->

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    Email
                                                                @else
                                                                    Email
                                                                @endif
                                                            </b>
                                                            <span>*</span>
                                                        </label>
                                                        <input type="email" name="ship_email"
                                                            class="form-control unicase-form-control text-input"
                                                            id="exampleInputEmail1" value="{{ Auth::user()->email }}"
                                                            required="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    Phone
                                                                @else
                                                                    Số Điện Thoại
                                                                @endif
                                                            </b>
                                                            <span>*</span>
                                                        </label>
                                                        <input type="number" name="ship_phone"
                                                            class="form-control unicase-form-control text-input"
                                                            id="exampleInputEmail1" value="{{ Auth::user()->phone }}"
                                                            required="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    Notes
                                                                @else
                                                                    Ghi Chú
                                                                @endif
                                                            </b>
                                                            <span>*</span>
                                                        </label>
                                                        <textarea class="form-control" cols="30" rows="5" name="notes"></textarea>
                                                    </div> <!-- // end form group  -->

                                                    <!-- radio-form  -->

                                                </div>

                                                <div class="col-md-6 col-sm-6 guest-login">
                                                    <!-- radio-form  -->
                                                    <div class="form-group">
                                                        <label class="info-title" for="exampleInputEmail1">
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    Address
                                                                @else
                                                                    Địa Chỉ
                                                                @endif
                                                            </b>
                                                            <span>*</span>
                                                        </label>
                                                        <input type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="exampleInputEmail1" name="ship_address">
                                                    </div>
                                                    <div class="form-group">
                                                        <h5>
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    Province Select
                                                                @else
                                                                    Chọn Tỉnh, Thành Phố
                                                                @endif
                                                            </b>
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <select name="province_id" class="form-control" required="">
                                                                <option value="" selected="" disabled="">
                                                                    @if (session()->get('language') == 'en')
                                                                        ---------- Province Select ----------
                                                                    @else
                                                                        ---------- Chọn Tỉnh, Thành Phố ----------
                                                                    @endif
                                                                </option>
                                                                @foreach ($dataProvinces as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->province_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <h5>
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    District Select
                                                                @else
                                                                    Chọn Quận
                                                                @endif
                                                            </b>
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <select name="district_id" class="form-control" required="">
                                                                <option value="" selected="" disabled="">
                                                                    @if (session()->get('language') == 'en')
                                                                        ---------- District Select ----------
                                                                    @else
                                                                        ---------- Chọn Quận ----------
                                                                    @endif
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div> <!-- // end form group -->

                                                    <div class="form-group">
                                                        <h5>
                                                            <b>
                                                                @if (session()->get('language') == 'en')
                                                                    Ward Select
                                                                @else
                                                                    Chọn Huyện
                                                                @endif
                                                            </b>
                                                            <span class="text-danger">*</span>
                                                        </h5>
                                                        <div class="controls">
                                                            <select name="ward_id" class="form-control" required="">
                                                                <option value="" selected="" disabled="">
                                                                    @if (session()->get('language') == 'en')
                                                                        ---------- Ward Select ----------
                                                                    @else
                                                                        ---------- Chọn Huyện ----------
                                                                    @endif
                                                                </option>

                                                            </select>
                                                        </div>
                                                    </div> <!-- // end form group -->
                                                </div>

                                                <div class="col-md-6 col-sm-6 guest-login">
                                                    <!-- checkout-progress-sidebar -->
                                                    <div class="checkout-progress-sidebar ">
                                                        <div class="panel-group">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading">
                                                                    <h4 class="unicase-checkout-title">
                                                                        @if (session()->get('language') == 'en')
                                                                            Select Payment Method
                                                                        @else
                                                                            Chọn phương thức thanh toán
                                                                        @endif
                                                                    </h4>
                                                                </div>


                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <label for="">
                                                                            @if (session()->get('language') == 'en')
                                                                                Cash
                                                                            @else
                                                                                Tiền Mặt
                                                                            @endif
                                                                        </label>
                                                                        <input type="radio" name="payment_method"
                                                                            value="cash">
                                                                        <img
                                                                            src="{{ asset('frontend/assets/images/payments/5.png') }}">
                                                                    </div> <!-- end col md 4 -->


                                                                </div> <!-- // end row  -->
                                                                <hr>
                                                                <button type="submit"
                                                                    class="btn-upper btn btn-primary checkout-page-button">Thanh
                                                                    Toán</button>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- checkout-progress-sidebar -->
                                                </div>
                                                <!-- guest-login -->
                                            </form>
                                        </div>
                                    </div>
                                    <!-- panel-body  -->

                                </div><!-- row -->
                            </div>
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">
                                            <strong>
                                                @if (session()->get('language') == 'en')
                                                    List Product:
                                                @else
                                                    Danh Sách Sản Phẩm:
                                                @endif
                                            </strong>
                                        </h4>
                                    </div>
                                    <div class="checkout-products">
                                        <ul class="list-unstyled">
                                            @foreach ($carts as $item)
                                                <li class="checkout-product">
                                                    <div class="product-details">
                                                        <div class="product-image">
                                                            <img src="upload/products/{{ $item->options->image }}"
                                                                alt="Product Image" style="height: 100px; width: 100px;">
                                                        </div>
                                                        <div class="product-info">
                                                            <div>
                                                                <strong>
                                                                    @if (session()->get('language') == 'en')
                                                                        Qty:
                                                                    @else
                                                                        Số lượng:
                                                                    @endif
                                                                </strong>
                                                                {{ $item->qty }}
                                                            </div>
                                                            <div>
                                                                <strong>
                                                                    @if (session()->get('language') == 'en')
                                                                        Color:
                                                                    @else
                                                                        Màu:
                                                                    @endif
                                                                </strong>
                                                                {{ $item->options->color }}
                                                            </div>
                                                            <div>
                                                                <strong>
                                                                    @if (session()->get('language') == 'en')
                                                                        Size:
                                                                    @else
                                                                        Size:
                                                                    @endif
                                                                </strong>{{ $item->options->size }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li>


                                            </li>
                                        </ul>
                                    </div>

                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">
                                            @if (Session::has('coupon'))
                                                <strong>
                                                    @if (session()->get('language') == 'en')
                                                        SubTotal:
                                                    @else
                                                        Tổng Tiền:
                                                    @endif
                                                </strong>

                                                {{ $cartTotal }} đ
                                                <hr>

                                                <strong>
                                                    @if (session()->get('language') == 'en')
                                                        Coupon Name :
                                                    @else
                                                        Tên Mã Giảm Giá:
                                                    @endif
                                                </strong>
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                <hr>

                                                <strong>

                                                    @if (session()->get('language') == 'en')
                                                        Coupon Discount:
                                                    @else
                                                        Số Tiền Giảm Giá:
                                                    @endif
                                                </strong>
                                                {{ number_format(session()->get('coupon')['discount_amount'], 0, ',', '.') }}
                                                đ
                                                <hr>
                                                <strong>
                                                    @if (session()->get('language') == 'en')
                                                        Grand Total:
                                                    @else
                                                        Số Tiền Trả:
                                                    @endif
                                                </strong>
                                                {{ number_format(session()->get('coupon')['total_amount'], 0, ',', '.') }}
                                                đ
                                            @else
                                                <strong>
                                                    @if (session()->get('language') == 'en')
                                                        SubTotal:
                                                    @else
                                                        Tổng Tiền:
                                                    @endif
                                                </strong>{{ $cartTotal }} đ
                                                <hr>
                                                <strong>
                                                    @if (session()->get('language') == 'en')
                                                        Grand Total:
                                                    @else
                                                        Số Tiền Trả:
                                                    @endif
                                                </strong>
                                                {{ $cartTotal }} đ
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>



                </div><!-- /.row -->
            </div><!-- /.checkout-box -->
        </div><!-- /.container -->
    </div>
    <style>
        .checkout-products {
            border-bottom: 1px #e5e5e5 solid;
            margin-bottom: 15px
        }

        .checkout-product {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .product-details {
            display: flex;
            align-items: center;
        }

        .product-image img {
            height: 100px;
            width: 100px;
            margin-right: 20px;
        }

        .product-info div {
            margin-bottom: 5px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('select[name="province_id"]').on('change', function() {
                var province_id = $(this).val();
                if (province_id) {
                    $.ajax({
                        url: "{{ url('/district') }}/" + province_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="ward_id"]').empty();
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });

        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/ward') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="ward_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="ward_id"]').append('<option value="' + value.id +
                                '">' + value.ward_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script>
@endsection
