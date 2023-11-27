<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }

        .font {
            font-size: 15px;
        }

        .authority {
            /*text-align: center;*/
            float: right
        }

        .authority h5 {
            margin-top: -10px;
            color: green;
            /*text-align: center;*/
            margin-left: 35px;
        }

        .thanks p {
            color: green;
            ;
            font-size: 16px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }
    </style>

</head>

<body>
    <table width="100%" style="background:white; padding:2px;""></table>

    <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
        <tr>
            <td>
                <p class="font" style="margin-left: 20px;">
                    <strong>Họ Tên:</strong> {{ $order->ship_name }}<br>
                    <strong>Email:</strong> {{ $order->ship_email }} <br>
                    <strong>SĐT:</strong> {{ $order->ship_phone }} <br>

                    @php
                        $pro = $order->province->province_name;
                        $dis = $order->district->district_name;
                        $ward = $order->ward->ward_name;
                    @endphp

                    <strong>Địa chỉ:</strong> {{ $order->ship_address }},{{ $pro }},{{ $dis }}.{{ $ward }} <br>
                    <strong>Post Code:</strong> {{ $order->post_code }}
                </p>
            </td>
            <td>
                <p class="font">
                <h3><span style="color: green;">Hóa Đơn:</span> #{{ $order->invoice_no }}</h3>
                Ngày Đặt Hàng: {{ $order->order_date }} <br>
                Vận Chuyển Ngày: {{ $order->delivered_date }} <br>
                Thanh Toán Bằng: {{ $order->payment_method }} </span>
                </p>
            </td>
        </tr>
    </table>
    <br />
    <h3>Sản Phẩm</h3>


    <table width="100%">
        <thead style="background-color: green; color:#FFFFFF;">
            <tr class="font">
                <th>Hình Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Size</th>
                <th>Màu</th>
                <th>Code</th>
                <th>Số Lượng</th>
                <th>Giá Sản Phẩm</th>
                <th>Tổng Tiền</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($orderItem as $item)
                <tr class="font">
                    <td align="center">
                        <img src="{{ url('upload/products/' . $item->product->product_thambnail) }}" height="100px;" width="100px;"
                            alt="">
                    </td>
                    <td align="center"> {{ $item->product->product_name_vi }}</td>
                    <td align="center">

                        @if ($item->size == null)
                            ----
                        @else
                            {{ $item->size }}
                        @endif

                    </td>
                    <td align="center">{{ $item->color }}</td>
                    <td align="center">{{ $item->product->product_code }}</td>
                    <td align="center">{{ $item->qty }}</td>
                    <td align="center">{{ number_format($item->price, 0, '.') }}</td>
                    <td align="center">{{ number_format($item->price * $item->qty, 0, '.') }} </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <br>
    <table width="100%" style=" padding:0 10px 0 10px;">
        <tr>
            <td align="right">
                <h2><span style="color: green;">Tổng Tiền:</span>${{ number_format($order->amount, 0, '.') }}</h2>
            </td>
        </tr>
    </table>
</body>

</html>
