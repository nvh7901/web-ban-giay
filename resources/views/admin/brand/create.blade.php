@extends('admin.master')
@section('admin')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Create Brand</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">List Brands</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
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
                                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="brand_slug_vi">
                                        <input type="hidden" name="brand_slug_en">

                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('brand_name_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Brand Name Vi <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="brand_name_vi">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @error('brand_name_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Brand Name En <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="brand_name_en">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('brand_image')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Image <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="brand_image"
                                                            onchange="brandImage(this)">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <img src="{{ url('upload/no_images.jpg') }}" width="100px" height="100px"
                                                    id="showImage">
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" value="Create" class="btn btn-rounded btn-primary">
                                            <a href="/admin/brand" class="btn btn-rounded btn-danger">Cancel</a>
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

    <script>
        function brandImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result).width(100).height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
