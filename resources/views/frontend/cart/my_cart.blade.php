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
                                        <th class="cart-romove item">Image</th>
                                        <th class="cart-description item">Product Name</th>
                                        <th class="cart-product-name item">Color</th>
                                        <th class="cart-edit item">Size</th>
                                        <th class="cart-qty item">Quantity</th>
                                        <th class="cart-sub-total item">Subtotal</th>
                                        <th class="cart-total last-item">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="myCart">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div>
@endsection
