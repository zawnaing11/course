@extends('backend.layouts.main')
@section('page-title', 'Edit Course')
@section('content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Edit Form</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.update', $course->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course->name) }}" placeholder="name">
                            @error('name')
                                <small class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $course->code) }}" placeholder="code">
                            @error('code')
                                <small class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="categories">Category</label>
                            <select class="form-control" id="categories" name="category_id">
                                <option value="">Please Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('category_id', $course->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="teachers">Teacher</label>
                            <select class="form-control" id="teachers" name="teacher_id">
                                <option value="">Please Select</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @if(old('teacher_id', $course->teacher_id) == $teacher->id) selected @endif>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" class="form-control" cols="30" rows="3" name="description">{!! old('description', $course->description) !!}</textarea>
                            @error('description')
                                <small class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <a href="{{ route('courses.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
