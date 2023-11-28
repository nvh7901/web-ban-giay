@extends('admin.master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Detail Order: {{ $orders->invoice_no }}</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/order/confirm">List Order
                                        Confirm</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong> </h4>
                        </div>


                        <table class="table">
                            <tr>
                                <th> Shipping Name : </th>
                                <th> {{ $orders->ship_name }} </th>
                            </tr>

                            <tr>
                                <th> Shipping Phone : </th>
                                <th> {{ $orders->ship_phone }} </th>
                            </tr>

                            <tr>
                                <th> Shipping Email : </th>
                                <th> {{ $orders->ship_email }} </th>
                            </tr>
                            <tr>
                                <th> Shipping Address : </th>
                                <th> {{ $orders->ship_address }} </th>
                            </tr>
                            <tr>
                                <th> Province : </th>
                                <th> {{ $orders->province->province_name }} </th>
                            </tr>

                            <tr>
                                <th> District : </th>
                                <th> {{ $orders->district->district_name }} </th>
                            </tr>

                            <tr>
                                <th> Ward : </th>
                                <th>{{ $orders->ward->ward_name }} </th>
                            </tr>

                            <tr>
                                <th> Post Code : </th>
                                <th> {{ $orders->post_code }} </th>
                            </tr>

                            <tr>
                                <th> Order Date : </th>
                                <th> {{ $orders->order_date }} </th>
                            </tr>

                        </table>



                    </div>
                </div> <!--  // cod md -6 -->


                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                            <h4 class="box-title"><span class="text-danger"> Invoice :
                                    {{ $orders->invoice_no }}</span></h4>
                        </div>


                        <table class="table">
                            <tr>
                                <th> Name : </th>
                                <th> {{ $orders->user->name }} </th>
                            </tr>

                            <tr>
                                <th> Phone : </th>
                                <th> {{ $orders->user->phone }} </th>
                            </tr>

                            <tr>
                                <th> Payment Type : </th>
                                <th> {{ $orders->payment_method }} </th>
                            </tr>

                            <tr>
                                <th> Invoice : </th>
                                <th class="text-danger"> {{ $orders->invoice_no }} </th>
                            </tr>

                            <tr>
                                <th> Order Total : </th>
                                <th>{{ number_format($orders->amount, 0, ',', '.') }} đ</th>
                            </tr>

                            <tr>
                                <th> Order : </th>
                                <th>
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #418DB9;">{{ $orders->status }} </span>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div> <!--  // cod md -6 -->





                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">

                        </div>



                        <table class="table">
                            <tbody>

                                <tr>
                                    <td width="10%">
                                        <label for=""> Image</label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Product Name </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Product Code</label>
                                    </td>


                                    <td width="10%">
                                        <label for=""> Color </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Size </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Quantity </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Price </label>
                                    </td>

                                </tr>


                                @foreach ($orderItems as $item)
                                    <tr>
                                        <td width="10%">
                                            <label for=""><img
                                                    src="{{ url('upload/products/' . $item->product->product_thambnail) }}"
                                                    height="100px;" width="100px;"> </label>
                                        </td>

                                        <td width="10%">
                                            <label for="">
                                                {{ $item->product->product_name_en }}
                                            </label>
                                        </td>


                                        <td width="10%">
                                            <label for="">{{ $item->product->product_code }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for="">{{ $item->color }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for="">{{ $item->size }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for="">{{ $item->qty }}</label>
                                        </td>

                                        <td width="10%">
                                            {{ number_format($item->price, 0, ',', '.') }} đ
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!--  // cod md -12 -->
            </div>
            <!-- /. end row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
