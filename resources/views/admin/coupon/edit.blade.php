@extends('admin.master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Coupon</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/coupon">List Coupons</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <div class="col">
                                    <form method="POST" action="/admin/coupon/update/{{ $coupon->id }}">
                                        @csrf
                                        {{-- Title Slider --}}
                                        <div class="row">
                                            <div class="col-md-4">
                                                @error('coupon_name')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Coupon Name <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="coupon_name" value="{{ $coupon->coupon_name }}">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                @error('coupon_discount')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Coupon Discount (%) <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="coupon_discount" value="{{ $coupon->coupon_discount }}">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                @error('coupon_date')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Coupon Date <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="date" class="form-control" name="coupon_date"
                                                            min="{{ Carbon\Carbon::now()->format('d-m-Y') }}" value="{{ $coupon->coupon_date }}">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            {{-- <button type="submit" value="Create" class="btn btn-rounded btn-primary"> --}}
                                            <button type="submit" class="btn btn-rounded btn-primary">Update</button>
                                            <a href="/admin/coupon" class="btn btn-rounded btn-danger">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
