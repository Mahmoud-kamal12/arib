@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Departments List</h4>
                <a href="{{ route('dashboard.departments.create') }}" class="btn btn-success">Add New Department</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Employees Count</th>
                            <th>Managers Count</th>
                            <th>Employees Salaries</th>
                            <th>Managers Salaries</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td>{{ $department->employees_count }}</td>
                                <td>{{ $department->managers_count }}</td>
                                <td>{{ $department->employees_salaries }}</td>
                                <td>{{ $department->managers_salaries }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('dashboard.departments.show', $department->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('dashboard.departments.edit', $department->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('dashboard.departments.destroy', $department->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this department?');">Delete</button>
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
                {{ $departments->links() }}
            </div>
        </div>
    </div>
@endsection
