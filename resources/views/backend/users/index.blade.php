@extends('backend.layouts.main')
@section('page-title', 'Users Page')
@section('widgetbar')
    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="ri-add-line align-middle mr-2"></i>New</a>
@endsection
@section('content')
<div class="contentbar">
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Users List Table</h5>
                </div>
                <div class="card-body">
                    @forelse ($users as $user)
                    @if ($loop->first)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                    @endif
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ Str::limit($user->name, 20) }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><span class="badge badge-primary">{{ optional($user->roles->first())->name }}</span></td>
                                    <td>
                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="button-list">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary-rgba"><i class="ri-pencil-line"></i></a>
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
                        <h6 class="card-subtitle">Thers is no data <a href="{{ route('users.create') }}">please create</a></h6>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
