@extends('frontend.main')
@section('title')
    @if (session()->get('language') == 'en')
        Update Profile
    @else
        Cập Nhật Hồ Sơ
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
                                action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">
                                        @if (session()->get('language') == 'en')
                                            Name
                                        @else
                                            Họ Và Tên
                                        @endif
                                        <span>*</span>
                                    </label>
                                    <input type="text" name="name"
                                        class="form-control unicase-form-control text-input" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">
                                        @if (session()->get('language') == 'en')
                                            Email
                                        @else
                                            Email
                                        @endif
                                        <span>*</span>
                                    </label>
                                    <input type="email" name="email"
                                        class="form-control unicase-form-control text-input" value="{{ $user->email }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">
                                        @if (session()->get('language') == 'en')
                                            Phone
                                        @else
                                            Số Điện Thoại
                                        @endif
                                        <span>*</span>
                                    </label>
                                    <input type="text" name="phone"
                                        class="form-control unicase-form-control text-input" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">
                                        @if (session()->get('language') == 'en')
                                            Avatar
                                        @else
                                            Ảnh Đại Diện
                                        @endif
                                        <span>*</span>
                                    </label>
                                    <input type="file" name="avatar" class="form-control" id="image">
                                    <img src="{{ !empty($user->avatar) ? url('upload/user_images/' . $user->avatar) : url('upload/no_images.jpg') }}"
                                        width="100px" height="100px" id="showImage" style="margin-top: 15px;">
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
