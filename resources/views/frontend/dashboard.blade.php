@extends('frontend.main')
@section('title', 'Dashboard')
@section('content')
    <div class="body-content outer-top-xs">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    @include('frontend.components.sidebar_dashboard')
                </div>

                <div class="col-md-1">

                </div>

                <div class="col-md-9">
                    <div class="card">
                        <h3 class="text-center">
                            Hi <span class="text-danger">{{ Auth::user()->name }}</span> Welcome to Flipmart Shose
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
