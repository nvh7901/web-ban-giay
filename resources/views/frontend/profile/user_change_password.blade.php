@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        Update Password
    @else
        Cập Nhật Mật Khẩu
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
                        <div class="col-md-6 col-sm-6 ">
                            <form class="register-form outer-top-xs" method="POST"
                                action="{{ route('user.post.change-password') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">
                                        @if (session()->get('language') == 'en')
                                            Current Password
                                        @else
                                            Mật Khẩu Cũ
                                        @endif
                                        <span>*</span>
                                    </label>
                                    <input type="password" id="current_password" name="oldpassword"
                                        class="form-control unicase-form-control text-input">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">
                                        @if (session()->get('language') == 'en')
                                            New Password
                                        @else
                                            Mật Khẩu Mới
                                        @endif
                                        <span>*</span>
                                    </label>
                                    <input type="password" name="password"
                                        class="form-control unicase-form-control text-input">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">
                                        @if (session()->get('language') == 'en')
                                            Confirm Password
                                        @else
                                            Xác nhận mật khẩu
                                        @endif
                                        <span>*</span>
                                    </label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control unicase-form-control text-input">
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                    @if (session()->get('language') == 'en')
                                        Update
                                    @else
                                        Cập Nhật
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
