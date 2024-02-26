@extends('backend.layouts.main')
@section('page-title', 'Finished Course')
@section('content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header bg-primary-rgba border-light">
                    <h5 class="card-title">Course Info</h5>
                    <div class="row">
                        <div class="col-4"><strong>Name</strong><p>{{ $course->name }}</p></div>
                        <div class="col-4"><strong>Code</strong><p>{{ $course->code }}</p></div>
                        <div class="col-4"><strong>Category</strong><p>{{ $course->category->name }}</p></div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('courses.teacher.update', $course->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="grade">Grade</label>
                            <select name="grade" id="grade" class="form-control">
                                <option value="">Please select grade</option>
                                @foreach (config('const.grade') as $key => $grade)
                                <option value="{{ $key }}">{{ $grade }}</option>
                                @endforeach
                            </select>
                            @error('grade')
                                <small class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mark">Mark</label>
                            <input type="number" class="form-control" id="mark" name="mark" value="{{ old('mark') }}" placeholder="100">
                            @error('mark')
                                <small class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <a href="{{ route('courses.teacher') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Finished Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
