@extends('backend.layouts.main')
@section('page-title', 'Courses Page')
@section('widgetbar')
    <a href="{{ route('courses.create') }}" class="btn btn-primary"><i class="ri-add-line align-middle mr-2"></i>New</a>
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
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                    @endif
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ Str::limit($course->name, 20) }}</td>
                                    <td>{{ $course->code }}</td>
                                    <td>{{ $course->category->name }}</td>
                                    <td>{{ $course->teacher_id }}</td>
                                    <td>{{ Str::limit($course->description, 20) }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('courses.destroy', $course->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="button-list">
                                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary-rgba"><i class="ri-pencil-line"></i></a>
                                                <button type="submit" class="btn btn-danger-rgba"><i class="ri-delete-bin-3-line"></i></button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                    @if ($loop->last)
                            </tbody>
                        </table>
                    </div>
                    @endif
                    @empty
                        <h6 class="card-subtitle">Thers is no data <a href="{{ route('courses.create') }}">please create</a></h6>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
