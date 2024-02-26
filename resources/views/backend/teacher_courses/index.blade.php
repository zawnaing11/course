@extends('backend.layouts.main')
@section('page-title', 'Teacher Courses Page')
@section('content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Courses List Table</h5>
                </div>
                <div class="card-body">
                    @forelse ($courses as $course)
                    @if ($loop->first)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                    @endif
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->code }}</td>
                                    <td><span class="badge badge-primary">{{ optional($course->category)->name }}</span></td>
                                    <td>
                                        <div class="button-list">
                                                <a href="{{ route('courses.teacher.edit', $course->id) }}" class="btn btn-primary-rgba"><i class="ri-pencil-line"></i></a>
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
