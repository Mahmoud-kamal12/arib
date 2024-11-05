@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm mt-4">
            <div class="card-header">
                <h4 class="mb-0">User Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ $user->image_path }}" alt="Profile Image" class="rounded-circle img-fluid" style="width: 330px; height: 330px;">
                    </div>
                    <div class="col-md-8">
                        <h5 class="mb-3">Basic Information</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $user->full_name }}
                            </li>
                            <li class="list-group-item">
                                <strong>Email:</strong> {{ $user->email }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone:</strong> {{ $user->phone }}
                            </li>
                            <li class="list-group-item">
                                <strong>Role:</strong> {{ ucfirst($user->role) }}
                            </li>
                            <li class="list-group-item">
                                <strong>Manager:</strong> {{ ucfirst($user->manager_name) }}
                            </li>
                            <li class="list-group-item">
                                <strong>Department:</strong> {{ $user->department ? $user->department->name : 'N/A' }}
                            </li>
                            <li class="list-group-item">
                                <strong>Salary:</strong> ${{ number_format($user->salary, 2) }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-warning">Edit User</a>
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-secondary">Back to List</a>
                    <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
