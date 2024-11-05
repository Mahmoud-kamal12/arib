@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>User List</h4>
                <a href="{{ route('dashboard.users.create') }}" class="btn btn-success">Add New User</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Manager Name</th>
                            <th>Department Name</th>
                            <th>Role</th>
                            <th>Profile Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->manager ? $user->manager->full_name : 'N/A' }}</td>
                                <td>{{$user->department_name}}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    <img src="{{ $user->image_path }}" alt="Profile Image" width="50" height="50" class="rounded">
                                </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Actions">
                                            <a href="{{ route('dashboard.users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
