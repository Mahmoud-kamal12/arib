@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h2>Add New Department</h2>

        <form action="{{ route('dashboard.departments.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Add Department</button>
        </form>
    </div>
@endsection
