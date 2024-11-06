@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm mt-4">
            <div class="card-header">
                <h4 class="mb-0">Department Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="mb-3">Basic Information</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Name:</strong> {{ $department->name }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-4 text-right">
                    <a href="{{ route('dashboard.departments.edit', $department->id) }}" class="btn btn-warning">Edit Department</a>
                    <a href="{{ route('dashboard.departments.index') }}" class="btn btn-secondary">Back to List</a>
                    <form action="{{ route('dashboard.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">Delete Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
