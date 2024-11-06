@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Department</h2>

        <form action="{{ route('dashboard.departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $department->name) }}" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Department</button>
        </form>
    </div>
@endsection
