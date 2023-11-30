@extends('admin.master')
@section('title', 'Edit Slider')

@section('admin')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Slider</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/slider">List Sliders</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
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
                                    <form method="POST" action="/admin/slider/update/{{ $slider->id }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="old_image" value="{{ $slider->slider_image }}">
                                        {{-- Title Slider --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('slider_title_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Slider Title Vi <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="slider_title_vi"
                                                            value="{{ $slider->slider_title_vi }}">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @error('slider_title_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Slider Title En <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="slider_title_en"
                                                            value="{{ $slider->slider_title_en }}">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Description --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('slider_description_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Slider Description Vi <span class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <textarea id="editor1" name="slider_description_vi" rows="10" cols="80">
                                                            {!! $slider->slider_description_vi !!}
                                                        </textarea>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                @error('slider_description_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Slider Description En <span class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <textarea id="editor2" name="slider_description_en" rows="10" cols="80">
                                                            {!! $slider->slider_description_en !!}
                                                        </textarea>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Image --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('slider_image')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Image <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="slider_image"
                                                            onchange="imageUpload(this)">

                                                    </div>
                                                    <img src="{{ url('upload/slider/' . $slider->slider_image) }}"
                                                        width="100px" height="100px" id="showImage"
                                                        style="margin-top: 15px">
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            {{-- <button type="submit" value="Create" class="btn btn-rounded btn-primary"> --}}
                                            <button type="submit" class="btn btn-rounded btn-primary">Update</button>
                                            <a href="/admin/slider" class="btn btn-rounded btn-danger">Cancel</a>
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

    {{-- Change Image Upload --}}
    <script>
        function imageUpload(input) {
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
