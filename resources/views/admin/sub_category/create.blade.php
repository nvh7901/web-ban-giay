@extends('admin.master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Create Sub Categories</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="mdi mdi-home-outline"></i></a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/sub-category">List Sub
                                        Categories</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Create Sub Category</li>
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
                                    <form action="{{ route('sub-category.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
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
                                                            <option value="" selected disabled>------- Chose Category
                                                                -------</option>
                                                            @foreach ($dataCategories as $category)
                                                                <option value="{{ $category->id }}">
                                                                    {{ $category->category_name_en }}
                                                                </option>
                                                            @endforeach


                                                        </select>
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                @error('sub_category_name_vi')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Sub Category Name Vi <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            name="sub_category_name_vi">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                @error('sub_category_name_en')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <div class="form-group">
                                                    <label>Sub Category Name En <span class="text-danger">*</span></label>

                                                    <div class="input-group">
                                                        <input type="text" class="form-control"
                                                            name="sub_category_name_en">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-right">
                                            <input type="submit" value="Create" class="btn btn-rounded btn-primary">
                                            <a href="/admin/sub-category" class="btn btn-rounded btn-danger">Cancel</a>
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
