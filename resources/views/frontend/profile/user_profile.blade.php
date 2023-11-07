@extends('frontend.main')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class="active">Update Profile</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ !empty($user->avatar) ? url('upload/user_images/' . $user->avatar) : url('upload/no_images.jpg') }}"
                        class="card-img-top center" style="margin: 0 0 15px 30px; border-radius: 50%" height="100px"
                        width="100px">

                    <ul class="list-group list-group-flush">
                        <a href="/" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="/user/profile" class="btn btn-primary btn-sm btn-block">Update Profile</a>
                        <a href="/user/change-password" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="/log-out" class="btn btn-danger btn-sm btn-block">Logout</a>
                    </ul>
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
                                    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                    <input type="text" name="name"
                                        class="form-control unicase-form-control text-input" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                                    <input type="email" name="email"
                                        class="form-control unicase-form-control text-input" value="{{ $user->email }}">
                                </div>

                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label>
                                    <input type="text" name="phone"
                                        class="form-control unicase-form-control text-input" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Avatar <span>*</span></label>
                                    <input type="file" name="avatar" class="form-control" id="image">
                                    <img src="{{ !empty($user->avatar) ? url('upload/user_images/' . $user->avatar) : url('upload/no_images.jpg') }}"
                                        width="100px" height="100px" id="showImage" style="margin-top: 15px;">
                                </div>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                    Update
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
