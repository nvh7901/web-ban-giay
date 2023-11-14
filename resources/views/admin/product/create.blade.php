@extends('admin.master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Create Product</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/sub-category">List
                                        Products</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Create Product</li>
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
                                    <form method="POST" action="{{ route('product.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            {{-- Brand --}}
                                            <div class="col-md-4">
                                                @error('brand_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <h5>Brand Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="brand_id" class="form-control">
                                                            <option value="" selected>------- Choose Brand
                                                                -------</option>
                                                            @foreach ($dataBrands as $brand)
                                                                <option value="{{ $brand->id }}">
                                                                    {{ $brand->brand_name_en }}
                                                                </option>
                                                            @endforeach


                                                        </select>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- Category --}}
                                            <div class="col-md-4">
                                                @error('category_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <h5>Category Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected="" disabled="">-------
                                                                Choose Category
                                                                -------</option>
                                                            @foreach ($dataCategories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name_en }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                @error('sub_category_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <h5>Sub Category Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="sub_category_id" class="form-control">
                                                            <option value="" selected="" disabled="">-------
                                                                Choose Sub Category
                                                                -------</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Name Product --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('product_name_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Name Vi <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="product_name_vi">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @error('product_name_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Name En <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="product_name_en">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Code and Quantity --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('product_code')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Code <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="product_code">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @error('product_qty')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Quantity <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="product_qty">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Tag --}}
                                        <div class="row">
                                            {{-- Tag --}}
                                            <div class="col-md-2">
                                                @error('product_tag_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Tag Name Vi <span class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <input type="text" name="product_tag_vi" class="form-control"
                                                            data-role="tagsinput" value="Mới" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                @error('product_tag_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Tag En <span class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <input type="text" name="product_tag_en" class="form-control"
                                                            value="New" data-role="tagsinput" required="">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            {{-- Color --}}
                                            <div class="col-md-2">
                                                @error('product_color_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Color Vi <span class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <input type="text" name="product_color_vi"
                                                            class="form-control" value="Đỏ, Xanh, Hồng"
                                                            data-role="tagsinput" required="">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                @error('product_color_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Color En <span class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <input type="text" name="product_color_en"
                                                            class="form-control" value="Red, Blue, Pink"
                                                            data-role="tagsinput" required="">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            {{-- Size --}}
                                            <div class="col-md-2">
                                                @error('product_size_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Size Vi <span class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <input type="text" name="product_size_vi" class="form-control"
                                                            value="37, 38, 39, 40, 41, 42" data-role="tagsinput"
                                                            required="">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                @error('product_size_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Color En <span class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <input type="text" name="product_size_en" class="form-control"
                                                            value="37, 38, 39, 40, 41, 42" data-role="tagsinput"
                                                            required="">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Selling and Discount --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('selling_price')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Selling Price <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="selling_price">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @error('discount_price')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Discount Price <span
                                                            class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="discount_price">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Short Description --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('short_desciption_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Short Description Vi <span
                                                            class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <textarea class="form-control" aria-invalid="false" style="height: 78px;" name="short_desciption_vi"></textarea>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @error('short_desciption_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Short Description En <span
                                                            class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <textarea class="form-control" aria-invalid="false" style="height: 78px;" name="short_desciption_en"></textarea>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Long Description --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('long_desciption_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Long Description Vi <span
                                                            class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <textarea id="editor1" name="long_desciption_vi" rows="10" cols="80"></textarea>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                @error('long_desciption_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Product Long Description En <span
                                                            class="text-danger">*</span></label>

                                                    <div class="controls">
                                                        <textarea id="editor2" name="long_desciption_en" rows="10" cols="80"></textarea>
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Image --}}
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('product_thambnail')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Image <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="file" class="form-control"
                                                            name="product_thambnail" onchange="imageUpload(this)">

                                                    </div>
                                                    <img src="{{ url('upload/no_images.jpg') }}" width="100px"
                                                        height="100px" id="showImage">
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <div class="controls">
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_2" name="hot_deals"
                                                                value="1">
                                                            <label for="checkbox_2">Hot Deals</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_3" name="featured"
                                                                value="1">
                                                            <label for="checkbox_3">Featured</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_4" name="special_offer"
                                                                value="1">
                                                            <label for="checkbox_4">Special Offer</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="checkbox_5" name="special_deals"
                                                                value="1">
                                                            <label for="checkbox_5">Special Deals</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            {{-- <button type="submit" value="Create" class="btn btn-rounded btn-primary"> --}}
                                            <button type="submit" class="btn btn-rounded btn-primary">Create</button>
                                            <a href="/admin/product" class="btn btn-rounded btn-danger">Cancel</a>
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
    {{-- Get dropdown sub-category --}}
    <script>
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/sub-category') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // $('select[name="sub_category_id"]').html('');
                            var d = $('select[name="sub_category_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="sub_category_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .sub_category_name_en + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
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
