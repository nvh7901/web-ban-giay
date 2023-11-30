@extends('admin.master')
@section('title', 'List Products')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">List Products</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">List Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="app-page-title">
                                <div class="page-title-wrapper">
                                    <div class="page-title-actions">
                                        <a href="/admin/product/create"
                                            class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                                <i class="fa fa-plus fa-w-20"></i>
                                            </span>
                                            Add New
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <div id="example1_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="example1_length"><label>Show <select
                                                        name="example1_length" aria-controls="example1"
                                                        class="form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div id="example1_filter" class="dataTables_filter"><label>Search:<input
                                                        type="search" class="form-control form-control-sm" placeholder=""
                                                        aria-controls="example1"></label></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped dataTable"
                                                role="grid" aria-describedby="example1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending">ID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Age: activate to sort column ascending">Image</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending">Product
                                                            Name Vi</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending">Product
                                                            Name En</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending">Product
                                                            Price</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending">Status
                                                        </th>

                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 130.25px;">Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $product)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $product->id }}</td>
                                                            <td>
                                                                <img src="{{ url('upload/products/' . $product->product_thambnail) }}"
                                                                    style="width: 100px; height: 100px;">
                                                            </td>
                                                            <td>{{ $product->product_name_vi }}</td>
                                                            <td>{{ $product->product_name_en }}</td>
                                                            <td>{{ number_format($product->product_price, 0, '.') }} ₫</td>
                                                            <td>
                                                                @if ($product->status == 1)
                                                                    <span class="badge badge-pill badge-success"> Active
                                                                    </span>
                                                                @else
                                                                    <span class="badge badge-pill badge-danger"> InActive
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="/admin/product/edit/{{ $product->id }}"
                                                                    class="btn btn-info border-0">
                                                                    <span class="btn-icon-wrapper opacity-8">
                                                                        <i class="fa fa-edit fa-w-20"></i>
                                                                    </span>
                                                                </a>

                                                                <a href="{{ route('product.delete', $product->id) }}"
                                                                    class="btn btn-danger border-0" id="delete">
                                                                    <span class="btn-icon-wrapper opacity-8">
                                                                        <i class="fa fa-trash fa-w-20"></i>
                                                                    </span>
                                                                </a>

                                                                {{-- Acctive and Inactive --}}
                                                                @if ($product->status == 1)
                                                                    <a href="/admin/product/in-active/{{ $product->id }}"
                                                                        class="btn btn-primary border-0"
                                                                        title="Inactive Now">
                                                                        <span class="btn-icon-wrapper opacity-8">
                                                                            <i class="fa fa-arrow-down fa-w-20"></i>
                                                                        </span>
                                                                    </a>
                                                                @else
                                                                    <a href="/admin/product/active/{{ $product->id }}"
                                                                        class="btn btn-success border-0"
                                                                        title="Active Now">
                                                                        <span class="btn-icon-wrapper opacity-8">
                                                                            <i class="fa fa-arrow-up fa-w-20"></i>
                                                                        </span>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $data->links('admin.components.paginate_custom') }}
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
