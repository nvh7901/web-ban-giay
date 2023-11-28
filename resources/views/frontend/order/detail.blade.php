@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        Detail Order
    @else
        Chi Tiết Hóa Đơn
    @endif
@endsection
@section('content')
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    @include('frontend.components.sidebar_dashboard')
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>

                                @if (session()->get('language') == 'en')
                                    Shipping Details
                                @else
                                    Chi Tiết Vận Chuyển
                                @endif
                            </h4>
                        </div>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Name:
                                        @else
                                            Họ Và Tên:
                                        @endif
                                    </th>
                                    <th> {{ $order->ship_name }} </th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Phone:
                                        @else
                                            Số Điện Thoại:
                                        @endif
                                    </th>
                                    <th> {{ $order->ship_phone }} </th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Email:
                                        @else
                                            Email:
                                        @endif
                                    </th>
                                    <th> {{ $order->ship_email }} </th>
                                </tr>
                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Address:
                                        @else
                                            Địa Chỉ:
                                        @endif
                                    </th>
                                    <th> {{ $order->ship_address }} </th>
                                </tr>
                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Province:
                                        @else
                                            Tỉnh:
                                        @endif
                                    </th>
                                    <th> {{ $order->province->province_name }} </th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            District:
                                        @else
                                            Quận:
                                        @endif
                                    </th>
                                    <th> {{ $order->district->district_name }} </th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Ward:
                                        @else
                                            Huyện:
                                        @endif
                                    </th>
                                    <th>{{ $order->ward->ward_name }} </th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Post Code:
                                        @else
                                            Mã Sản Phẩm:
                                        @endif
                                    </th>
                                    <th> {{ $order->post_code }} </th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Order Date:
                                        @else
                                            Ngày Đặt Hàng:
                                        @endif
                                    </th>
                                    <th> {{ $order->order_date }} </th>
                                </tr>

                            </table>


                        </div>

                    </div>

                </div> <!-- // end col md -5 -->

                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <span class="text-danger">
                                    @if (session()->get('language') == 'en')
                                        Invoice : {{ $order->invoice_no }}
                                    @else
                                        Mã Hóa Đơn: {{ $order->invoice_no }}
                                    @endif
                                </span>
                            </h4>
                        </div>
                        <div class="card-body" style="background: #E9EBEC;">
                            <table class="table">
                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Name:
                                        @else
                                            Tên Người Đặt Hàng
                                        @endif
                                    </th>
                                    <th> {{ $order->user->name }} </th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Phone:
                                        @else
                                            Số Điện Thoại:
                                        @endif
                                    </th>
                                    <th> {{ $order->user->phone }} </th>
                                </tr>

                                <tr>
                                    <th>

                                        @if (session()->get('language') == 'en')
                                            Payment Type:
                                        @else
                                            Hình Thức Thanh Toán :
                                        @endif
                                    </th>
                                    <th>
                                        @if ($order->payment_method == 'Cash')
                                            @if (session()->get('language') == 'en')
                                                Cash
                                            @else
                                                Tiền Mặt
                                            @endif
                                        @else
                                        @endif
                                    </th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Invoice:
                                        @else
                                            Mã Hóa Đơn:
                                        @endif
                                    </th>
                                    <th class="text-danger"> {{ $order->invoice_no }} </th>
                                </tr>

                                <tr>
                                    <th>

                                        @if (session()->get('language') == 'en')
                                            Order Total :
                                        @else
                                            Tổng Tiền:
                                        @endif
                                    </th>
                                    <th>{{ number_format($order->amount, 0, ',', '.') }} đ</th>
                                </tr>

                                <tr>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Status:
                                        @else
                                            Trạng Thái:
                                        @endif
                                    </th>
                                    <th>
                                        @if ($order->status == 'PENDING')
                                            <span class="badge badge-pill badge-warning" style="background: #800080;">
                                                @if (session()->get('language') == 'en')
                                                    PENDING
                                                @else
                                                    Đang Chờ Xử Lý
                                                @endif
                                            </span>
                                        @elseif($order->status == 'CONFIRM')
                                            <span class="badge badge-pill badge-warning"
                                                style="background: #0000FF;">CONFIRM</span>
                                        @elseif($order->status == 'DELIVERED')
                                            <span class="badge badge-pill badge-warning"
                                                style="background: #008000;">DELIVERED</span>

                                            @if ($order->return_order == 1)
                                                <span class="badge badge-pill badge-warning" style="background:red;">Return
                                                    Requested</span>
                                            @endif
                                        @else
                                            <span class="badge badge-pill badge-warning"
                                                style="background: #FF0000;">Cancel</span>
                                        @endif
                                    </th>
                                </tr>



                            </table>


                        </div>

                    </div>

                </div> <!-- // 2ND end col md -5 -->
                <div class="row">



                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>

                                    <tr style="background: #e2e2e2;">
                                        <td class="col-md-1">
                                            <label for="">
                                                @if (session()->get('language') == 'en')
                                                    Image
                                                @else
                                                    Hình Ảnh
                                                @endif
                                            </label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for="">

                                                @if (session()->get('language') == 'en')
                                                    Product Name
                                                @else
                                                    Tên Sản Phẩm
                                                @endif
                                            </label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for="">
                                                @if (session()->get('language') == 'en')
                                                    Product Code
                                                @else
                                                    Mã Sản Phẩm
                                                @endif
                                            </label>
                                        </td>


                                        <td class="col-md-2">
                                            <label for="">
                                                @if (session()->get('language') == 'en')
                                                    Color
                                                @else
                                                    Màu
                                                @endif
                                            </label>
                                        </td>

                                        <td class="col-md-2">
                                            <label for="">
                                                @if (session()->get('language') == 'en')
                                                    Size
                                                @else
                                                    Size
                                                @endif
                                            </label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for="">
                                                @if (session()->get('language') == 'en')
                                                    Quantity
                                                @else
                                                    Số Lượng
                                                @endif
                                            </label>
                                        </td>

                                        <td class="col-md-1">
                                            <label for="">
                                                @if (session()->get('language') == 'en')
                                                    Price
                                                @else
                                                    Giá Tiền
                                                @endif
                                            </label>
                                        </td>
                                    </tr>


                                    @foreach ($orderItem as $item)
                                        <tr>
                                            <td class="col-md-1">
                                                <label for=""><img
                                                        src="{{ url('upload/products/' . $item->product->product_thambnail) }}"
                                                        height="100px;" width="100px;"> </label>
                                            </td>

                                            <td class="col-md-2">
                                                <label for="">
                                                    @if (session()->get('language') == 'en')
                                                        {{ $item->product->product_name_en }}
                                                    @else
                                                        {{ $item->product->product_name_vi }}
                                                    @endif
                                                </label>
                                            </td>


                                            <td class="col-md-2">
                                                <label for=""> {{ $item->product->product_code }}</label>
                                            </td>

                                            <td class="col-md-2">
                                                <label for="">
                                                    {{ $item->color }}
                                                </label>
                                            </td>

                                            <td class="col-md-2">
                                                <label for=""> {{ $item->size }}</label>
                                            </td>

                                            <td class="col-md-2">
                                                <label for=""> {{ $item->qty }}</label>
                                            </td>

                                            <td class="col-md-2">
                                                <label for="">
                                                    {{ number_format($item->price, 0, ',', '.') }} đ
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach





                                </tbody>

                            </table>

                        </div>


                    </div> <!-- / end col md 8 -->

                </div> <!-- // END ORDER ITEM ROW -->
            </div> <!-- // end row -->
        </div>
    </div>
@endsection
