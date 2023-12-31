@extends('admin.master')
@section('title', 'List Districts')

@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">List Districts</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">List Districts</li>
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
                                        <a href="/admin/ship/district/create"
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
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 10px;">ID</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 167.062px;">Province</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 167.062px;">District Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 114.25px;">Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $district)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $district->id }}</td>
                                                            <td>{{ $district->province->province_name }}</td>
                                                            <td>{{ $district->district_name }}</td>
                                                            <td>
                                                                <a href="/admin/ship/district/edit/{{ $district->id }}"
                                                                    class="btn btn-info border-0">
                                                                    <span class="btn-icon-wrapper opacity-8">
                                                                        <i class="fa fa-edit fa-w-20"></i>
                                                                    </span>
                                                                </a>

                                                                <a href="{{ route('district.delete', $district->id) }}"
                                                                    class="btn btn-danger border-0" id="delete">
                                                                    <span class="btn-icon-wrapper opacity-8">
                                                                        <i class="fa fa-trash fa-w-20"></i>
                                                                    </span>
                                                                </a>
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
