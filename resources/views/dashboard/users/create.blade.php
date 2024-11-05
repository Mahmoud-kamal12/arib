@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h2>Add New User</h2>

        <form action="{{ route('dashboard.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- First Name -->
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
                    @error('first_name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
                    @error('last_name')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Email -->
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Password -->
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Role Selection -->
                <div class="form-group col-md-4">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="{{ $UserConstants::ROLE_EMPLOYEE }}" {{ old('role') === $UserConstants::ROLE_EMPLOYEE ? 'selected' : '' }}>Employee</option>
                        <option value="{{ $UserConstants::ROLE_MANAGER }}" {{ old('role') === $UserConstants::ROLE_MANAGER ? 'selected' : '' }}>Manager</option>
                    </select>
                    @error('role')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Manager Selection (Optional) -->
                <div class="form-group col-md-4">
                    <label for="manager_id">Manager (Optional)</label>
                    <select name="manager_id" id="manager_id" class="form-control">
                        <option value="">Select Manager</option>
                        @foreach($managers as $manager)
                            <option value="{{ $manager->id }}" {{ old('manager_id') === $manager->id ? 'selected' : '' }}>
                                {{ $manager->full_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('manager_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="department_id">Department</label>
                    <select name="department_id" id="department_id" class="form-control">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id') === $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>


            <div class="row">
                <!-- Salary -->
                <div class="form-group col-md-6">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" id="salary" class="form-control" value="{{ old('salary') }}" required min="0">
                    @error('salary')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Profile Image (Optional) -->
                <div class="form-group col-md-6">
                    <label for="image">Profile Image (Optional)</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @error('image')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Add User</button>
        </form>
    </div>
@endsection
