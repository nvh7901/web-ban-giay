@extends('frontend.main')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="/">Home</a></li>
                    <li class="active">DashBoard User</li>
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

                <div class="col-md-9">
                    <div class="card">
                        <h3 class="text-center">
                            Hi <span class="text-danger">{{ Auth::user()->name }}</span> Welcome to Flipmart Shose
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
