@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        List Orders
    @else
        Danh Sách Hóa Đơn
    @endif
@endsection
@section('content')
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    @include('frontend.components.sidebar_dashboard')
                </div>

                <div class="col-md-1">

                </div>

                <div class="col-md-9 align-center">
                    <div class="row" style="margin-bottom: 30px">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Date
                                        @else
                                            Ngày Đặt
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Total
                                        @else
                                            Tổng Tiền
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Invoice
                                        @else
                                            Mã Hóa Đơn
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Status
                                        @else
                                            Trang Thái
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Payment
                                        @else
                                            Thanh Toán Bằng
                                        @endif
                                    </th>
                                    <th>
                                        @if (session()->get('language') == 'en')
                                            Action
                                        @else
                                            Thao Tác
                                        @endif
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="text-left">{{ $order->id }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ number_format($order->amount, 0, ',', '.') }}đ</td>
                                        <td>{{ $order->invoice_no }}</td>
                                        <td>
                                            @if ($order->status == 'PENDING')
                                                <span class="badge badge-pill badge-warning" style="background: #800080;">
                                                    @if (session()->get('language') == 'en')
                                                        PENDING
                                                    @else
                                                        Đang Chờ Xử Lý
                                                    @endif
                                                </span>
                                            @elseif($order->status == 'CONFIRM')
                                                <span class="badge badge-pill badge-warning" style="background: #0000FF;">
                                                    @if (session()->get('language') == 'en')
                                                        CONFIRM
                                                    @else
                                                        XÁC NHẬN
                                                    @endif
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>
                                            <a href="/user/order/detail/{{ $order->id }}"
                                                class="btn btn-sm btn-primary"><i class="fa fa-eye"></i>
                                                @if (session()->get('language') == 'en')
                                                    View
                                                @else
                                                    Chi Tiết
                                                @endif
                                            </a>
                                            <a href="/user/order/invoice-dowload/{{ $order->id }}"
                                                class="btn btn-sm btn-danger">
                                                <i class="fa fa-download" style="color: white;"></i>
                                                @if (session()->get('language') == 'en')
                                                    Invoice
                                                @else
                                                    In Hóa Đơn
                                                @endif
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                    {{ $orders->links('frontend.components.paginate_order') }}
                </div>
            </div>
        </div>
    </div>

    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
@endsection
