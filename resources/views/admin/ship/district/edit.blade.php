@extends('admin.master')
@section('title', 'Edit Districts')

@section('admin')
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit District</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin//ship/district">List
                                        District</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Edit District</li>
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
                                    <form action="/admin/ship/district/update/{{ $district->id }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                @error('province_id')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <h5>Province Select<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="province_id" class="form-control">
                                                            <option value="" selected disabled>------- Choose Province
                                                                -------</option>
                                                            @foreach ($dataProvinces as $province)
                                                                <option value="{{ $province->id }}"
                                                                    {{ $province->id == $district->province_id ? 'selected' : '' }}>
                                                                    {{ $province->province_name }}
                                                                </option>
                                                            @endforeach


                                                        </select>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @error('district_name')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>District Name <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="district_name"
                                                            value="{{ $district->district_name }}">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" value="Update" class="btn btn-rounded btn-primary">
                                            <a href="/admin/ship/district" class="btn btn-rounded btn-danger">Cancel</a>
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
@endsection
