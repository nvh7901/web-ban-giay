<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Login Admin</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


</head>

<body class="hold-transition theme-primary bg-gradient-primary">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="content-top-agile p-10">
                            <h2 class="text-white">Get started with Us</h2>
                            <p class="text-white-50">Sign in to start your session</p>
                        </div>
                        <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                            @if (session('notification'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('notification') }}
                                </div>
                            @endif
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent text-white"><i
                                                    class="ti-user"></i></span>
                                        </div>
                                        <input type="email" name="email"
                                            class="form-control pl-15 bg-transparent text-white plc-white"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text  bg-transparent text-white"><i
                                                    class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" name="password"
                                            class="form-control pl-15 bg-transparent text-white plc-white"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="row">
                                    {{-- <div class="col-6">
                                        <div class="checkbox text-white">
                                            <input type="checkbox" id="basic_checkbox_1">
                                            <label for="basic_checkbox_1">Remember Me</label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <div class="fog-pwd text-right">
                                            <a href="javascript:void(0)" class="text-white hover-info"><i
                                                    class="ion ion-locked"></i> Forgot pwd?</a><br>
                                        </div>
                                    </div> --}}
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                            {{-- <div class="text-center text-white">
                                <p class="mt-20">- Sign With -</p>
                                <p class="gap-items-2 mb-20">
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                            class="fa fa-facebook"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                            class="fa fa-twitter"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                            class="fa fa-google-plus"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i
                                            class="fa fa-instagram"></i></a>
                                </p>
                            </div>

                            <div class="text-center">
                                <p class="mt-15 mb-0 text-white">Don't have an account? <a href="auth_register.html"
                                        class="text-info ml-5">Sign Up</a></p>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
</body>

</html>
