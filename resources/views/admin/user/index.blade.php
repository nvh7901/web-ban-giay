@extends('admin.master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">List Users</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="/admin/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">List Users</li>
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
                                                            aria-label="Age: activate to sort column ascending">Avatar</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending">Name
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending">Email
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example1"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending">Phone
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $user)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{ $user->id }}</td>
                                                            <td>
                                                                <img src="{{ url('upload/user_images/' . $user->avatar) }}"
                                                                    style="width: 100px; height: 100px;">
                                                            </td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>{{ $user->phone }}</td>

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
