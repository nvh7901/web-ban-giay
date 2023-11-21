@extends('admin.master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Product</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/product">List Products</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                                    <form method="POST" action="/admin/ship/ward/update/{{ $ward->id }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                @error('province_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <h5>Province Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="province_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                Province</option>
                                                            @foreach ($dataProvinces as $province)
                                                                <option value="{{ $province->id }}"
                                                                    {{ $province->id == $ward->province_id ? 'selected' : '' }}>
                                                                    {{ $province->province_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                @error('district_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <h5>District Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="district_id" class="form-control">
                                                            <option value="" selected="" disabled="">Select
                                                                District</option>
                                                            @foreach ($dataDistricts as $district)
                                                                <option value="{{ $district->id }}"
                                                                    {{ $district->id == $ward->district_id ? 'selected' : '' }}>
                                                                    {{ $district->district_name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                @error('ward_name')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Ward Name <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="ward_name" value="{{ $ward->ward_name }}">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>


                                        <div class="text-xs-right">
                                            <button type="submit" class="btn btn-rounded btn-primary">Update</button>
                                            <a href="/admin/ship/ward" class="btn btn-rounded btn-danger">Cancel</a>
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
            $('select[name="province_id"]').on('change', function() {
                var province_id = $(this).val();
                if (province_id) {
                    $.ajax({
                        url: "{{ url('/admin/ship/district') }}/" + province_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            // $('select[name="sub_category_id"]').html('');
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
