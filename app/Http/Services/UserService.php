<?php

namespace App\Http\Services;

use App\Http\Constants\UserConstants;
use App\Http\Repositories\UserRepository;
use App\Models\User;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store(array $data)
    {
        return $this->userRepository->store($data);
    }

    public function update(User $user, array $data): User
    {
        return $this->userRepository->update($user, $data);
    }

    public function getManagers()
    {
        return User::where('role', UserConstants::ROLE_MANAGER)->get();
    }

    public function find($id): User
    {
        return $this->userRepository->find($id);
    }

    public function getUsers($paginate = 10): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return $this->userRepository->getUsers($paginate);
    }

    public function destroy($id): bool
    {
        return $this->userRepository->destroy($id);
    }

    public function getDepartments()
    {
        return $this->userRepository->getDepartments();
    }
}
