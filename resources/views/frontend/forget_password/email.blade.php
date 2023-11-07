@extends('frontend.main')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Forget Password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div>

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-6 col-sm-6 sign-in">
                        <h4 class="">Forget Password</h4>
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
                                <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
                                <input type="email" name="email" class="form-control unicase-form-control text-input"
                                    id="exampleInputEmail1">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                Send Password Reset Link
                            </button>
                        </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
        </div><!-- /.container -->
    </div>
@endsection
