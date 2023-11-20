@extends('frontend.main')
@section('title', 'Flipmart Shose')
@section('content')
    <div class="body-content outer-top-xs" style="margin-bottom: 20px">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="heading-title">
                                            @if (session()->get('language') == 'en')
                                                My Wishlist
                                            @else
                                                Sản Phẩm Yêu Thích
                                            @endif
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="wishlist">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div>
@endsection
