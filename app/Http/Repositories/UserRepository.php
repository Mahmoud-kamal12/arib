<?php

namespace App\Http\Repositories;

use App\Http\Constants\UserConstants;
use App\Http\Resources\UserResource;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class UserRepository
{
    public function store(array $data)
    {
        if (isset($data['image'])) {
            $data['image'] = $data['image']->store('user_images', 'public');
        }

        $data['password'] = Hash::make($data['password']);
        $data['role'] = $data['role'] ?? UserConstants::ROLE_EMPLOYEE;

        return User::create($data);
    }

    public function update(User $user, array $data): User
    {
        if (isset($data['image'])) {
            if ($user->image) {
                Storage::disk('public')->delete($user->profile_image);
            }
            $data['profile_image'] = $data['image']->store('user_images', 'public');
        }

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return $user;
    }

    public function find($id): User
    {
        return User::findOrFail($id);
    }

    public function getUsers($paginate = 10): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $users = User::paginate($paginate);
        return UserResource::collection($users);
    }

    public function destroy($id): bool
    {
        $user = User::findOrFail($id);
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
        return $user->delete();
    }

    public function getDepartments()
    {
        return Department::all();
    }
}
