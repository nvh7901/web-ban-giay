@extends('admin.master')
@section('admin')
    <div class="container-full">

        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Profile Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $editData->name }}">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $editData->email }}">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Avatar <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="avatar" class="form-control" id="image">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <img src="{{ !empty($editData->avatar) ? url('upload/admin_images/' . $editData->avatar) : url('upload/no_images.jpg') }}"
                                            width="100px" height="100px" id="showImage">
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" value="Update" class="btn btn-rounded btn-info">
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
    </div>

    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
