@extends('dashboard.layouts.app')

@section('content')
    <div class="container">
        <h2>Edit User</h2>

        <form action="{{ route('dashboard.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- First Name -->
                <div class="form-group col-md-6">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
                    @error('first_name')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>

                <!-- Last Name -->
                <div class="form-group col-md-6">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
                    @error('last_name')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Email -->
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                    @error('phone')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Password (Optional) -->
                <div class="form-group col-md-6">
                    <label for="password">Password (Leave blank to keep current password)</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="form-group col-md-6">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Role Selection -->
                <div class="form-group col-md-4">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="{{ $UserConstants::ROLE_EMPLOYEE }}" {{ old('role', $user->role) === $UserConstants::ROLE_EMPLOYEE ? 'selected' : '' }}>Employee</option>
                        <option value="{{ $UserConstants::ROLE_MANAGER }}" {{ old('role', $user->role) === $UserConstants::ROLE_MANAGER ? 'selected' : '' }}>Manager</option>
                    </select>
                    @error('role')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>

                <!-- Manager Selection (Optional) -->
                <div class="form-group col-md-4">
                    <label for="manager_id">Manager (Optional)</label>
                    <select name="manager_id" id="manager_id" class="form-control">
                        <option value="">Select Manager</option>
                        @foreach($managers as $manager)
                            <option value="{{ $manager->id }}" {{ old('manager_id', $user->manager_id) === $manager->id ? 'selected' : '' }}>
                                {{ $manager->full_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('manager_id')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="department_id">Department</label>
                    <select name="department_id" id="department_id" class="form-control">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ old('department_id', $user->department_id) === $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Salary -->
                <div class="form-group col-md-6">
                    <label for="salary">Salary</label>
                    <input type="number" name="salary" id="salary" class="form-control" value="{{ old('salary', $user->salary) }}" required min="0">
                    @error('salary')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>

                <!-- Profile Image (Optional) -->
                <div class="form-group col-md-6">
                    <label for="image">Profile Image (Optional)</label>
                    <input type="file" name="image" id="image" class="form-control-file">
                    @error('image')
                    <small class="text-danger">{{ $user }}</small>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mt-3">Update User</button>
        </form>
    </div>
@endsection
