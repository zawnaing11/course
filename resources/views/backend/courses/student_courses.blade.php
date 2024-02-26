@extends('backend.layouts.main')
@section('page-title', 'Student Courses Page')
@section('widgetbar')
    <a href="{{ route('student-courses.export') }}" class="btn btn-primary"><i class="ion ion-ios-download"></i> Export</a>
@endsection
@section('content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Courses List Table</h5>
                </div>
                <div class="card-body">
                    @forelse ($course_users as $course_user)
                    @if ($loop->first)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Course</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                    @endif
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><a href="{{ route('student.info', $course_user->user->id) }}">{{ $course_user->user->name }}</a></td>
                                    <td>{{ $course_user->course->name }}</td>
                                    <td><span class="badge badge-primary">{{ config('const.status')[$course_user->status] }}</span></td>
                                    <td>
                                        <div class="button-list">
                                            @if (auth()->user()->roles->first()->slug == 'staff' && $course_user->status == 1)
                                                <a href="{{ route('course.request', $course_user->id) }}" type="submit" class="btn btn-success btn-sm">Send Request</a>
                                            @endif
                                            @if (auth()->user()->roles->first()->slug == 'admin' && ($course_user->status == 1 || $course_user->status == 2))
                                                <a href="{{ route('course.approved', $course_user->id) }}" type="submit" class="btn btn-success btn-sm">Approve</a>
                                                <a href="{{ route('course.rejected', $course_user->id) }}" type="submit" class="btn btn-danger btn-sm">Reject</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                    @if ($loop->last)
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @empty
                        <h6 class="card-subtitle">Thers is no data</h6>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
