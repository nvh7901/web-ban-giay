@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        Reset Password
    @else
        Đặt Lại Mật Khẩu
    @endif
@endsection
@section('content')
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">
                            @if (session()->get('language') == 'en')
                                Forget Password
                            @else
                                Quên Mật Khẩu
                            @endif
                        </h4>
                        @if (session('notification'))
                            <div class="alert alert-success" role="alert">
                                {{ session('notification') }}
                            </div>
                        @endif
                        <form class="register-form outer-top-xs" role="form" method="POST"
                            action="{{ route('user.post.forget-password') }}">
                            @csrf

                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">
                                    @if (session()->get('language') == 'en')
                                        Email
                                    @else
                                        Email
                                    @endif
                                    <span>*</span>
                                </label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">

                                @if (session()->get('language') == 'en')
                                    Send Password Reset Link
                                @else
                                    Gửi Liên Kết Đặt Lại Mật Khẩu
                                @endif
                            </button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div>
@endsection
