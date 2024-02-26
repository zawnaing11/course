@extends('backend.layouts.main')
@section('page-title', 'Users Information')
@section('content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="thankyou-content text-center my-5">
                                <img src="{{ asset('assets/images/ecommerce/thankyou.svg') }}" class="img-fluid mb-5" alt="thankyou">
                                <h2 class="text-success">{{ $user->name }}</h2>
                                <strong>Email - {{ $user->email }}</strong>
                                <p class="my-4">Created At {{ $user->created_at }}</p>
                                <div class="button-list">
                                    <a href="{{ route('courses.student') }}" class="btn btn-success font-16"><i class="ion ion-ios-arrow-back mr-2"></i>BACK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
