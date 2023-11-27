@extends('frontend.main')
@section('title', 'List Orders')
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
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Invoice</th>
                                    <th>Order</th>
                                    <th>Payment</th>
                                    <th>Action</th>
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
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: #800080;">PENDING</span>
                                            @elseif($order->status == 'CONFIRM')
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: #0000FF;">CONFIRM</span>
                                            @elseif($order->status == 'PROCESSING')
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: #FFA500;">PROCESSING</span>
                                            @elseif($order->status == 'PICKED')
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: #808000;">PICKED</span>
                                            @elseif($order->status == 'SHIPPED')
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: #808080;">SHIPPED</span>
                                            @elseif($order->status == 'DELIVERED')
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: #008000;">DELIVERED</span>

                                                @if ($order->return_order == 1)
                                                    <span class="badge badge-pill badge-warning"
                                                        style="background:red;">Return Requested</span>
                                                @endif
                                            @else
                                                <span class="badge badge-pill badge-warning"
                                                    style="background: #FF0000;">Cancel</span>
                                            @endif
                                        </td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>
                                            <a href="{{ url('user/invoice_download/' . $order->id) }}"
                                                class="btn btn-sm btn-danger">
                                                <i class="fa fa-download" style="color: white;"></i> Invoice
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
