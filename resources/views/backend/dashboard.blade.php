@extends('backend.layouts.main')
@section('page-title', 'Dashboard Page')
@section('content')
<div class="contentbar">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="profilebox py-4 text-center">
                        @php
                            $image = Auth::user()->image ? asset('storage/profiles/' . Auth::user()->image) : 'assets/images/users/profile.svg';
                        @endphp
                        <img src="{{ $image }}" class="img-fluid mb-3" alt="profile">
                        <div class="profilename">
                            <h5>{{ Auth::user()?->name }}</h5>
                            <p></p>
                            <p class="text-success">{{ Auth::user()?->email }}</p>
                            <p class="text-muted my-3"><a href="{{ route('users.edit', Auth::user()?->id) }}"><i class="ri-pencil-line mr-2"></i>Edit Profile</a></p>
                        </div>
                        <div class="button-list">
                            <a href="#" class="btn btn-primary rounded-circle font-18"><i class="ri-facebook-line"></i></a>
                            <a href="#" class="btn btn-info rounded-circle font-18"><i class="ri-twitter-line"></i></a>
                            <a href="#" class="btn btn-danger rounded-circle font-18"><i class="ri-instagram-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
