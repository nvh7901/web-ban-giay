@extends('admin.master')
@section('title', 'Profile')
@section('admin')
    <div class="container-full">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="box box-inverse bg-img" data-overlay="2">
                    <div class="flexbox px-20 pt-20">
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-rounded btn-success md-5">Edit Profile</a>

                    </div>

                    <div class="box-body text-center pb-50">
                        <a href="#">
                            <img class="avatar avatar-xxl avatar-bordered"
                                src="{{ !empty($adminData->avatar) ? url('upload/admin_images/' . $adminData->avatar) : url('upload/no_images.jpg') }}"
                                alt="">
                        </a>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">Admin Name:
                                {{ $adminData->name }}</a></h4>
                        <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">Admin Email:
                                {{ $adminData->email }}</a></h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
