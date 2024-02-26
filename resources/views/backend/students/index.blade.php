@extends('backend.layouts.main')
@section('page-title', 'Courses List')
@section('content')
<div class="contentbar">
    <div class="row">
        @forelse($courses as $course)
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row">
                    <div class="col-6">
                        <h5 class="card-title mb-1">{{ $course->name }} <span class=""></span></h5>
                    </div>
                    <div class="col-6 text-right"><p>code:{{ $course->code }}</p></div>
                    </div>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><i class="mdi mdi-format-quote-open text-primary"></i>{!! $course->description !!}<i class="mdi mdi-format-quote-close text-primary"></i></p>
                        <footer class="blockquote-footer">Teacher - <cite title="Source Title">{{ $course->teacher->name }}</cite></footer>
                    </blockquote>
                </div>
                @if ($apply_courses->where('course_id', $course->id)->where('status', 5)->first())
                <div class="card-footer">
                    <button type="button" class="btn btn-primary">Download Certificate</button>
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="thankyou-content text-center my-5">
                                <img src="{{ asset('assets/images/ecommerce/thankyou.svg') }}" class="img-fluid mb-5" alt="thankyou">
                                <h2 class="text-info">Sorry !!!</h2>
                                <p class="my-4">There is No Courses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
