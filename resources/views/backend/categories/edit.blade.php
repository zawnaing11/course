@extends('backend.layouts.main')
@section('page-title', 'Edit Category')
@section('content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Edit Form</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$category->name) }}" placeholder="Name">
                            @error('name')
                                <small class="form-text text-muted">{{ $message }}</small>
                            @enderror
                        </div>
                        <a href="{{ route('categories.index') }}" type="button" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
