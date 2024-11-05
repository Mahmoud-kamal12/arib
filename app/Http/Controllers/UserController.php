<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Services\UserService;
use App\Models\User;

class UserController extends Controller
{

    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $users = $this->userService->getUsers();

        return view('dashboard.users.index', compact('users'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $managers = $this->userService->getManagers();
        $departments = $this->userService->getDepartments();
        return view('dashboard.users.create', compact('managers', 'departments'));
    }

    public function store(StoreUserRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->userService->store($request->validated());

        return redirect()->route('dashboard.users.index');
    }

    public function show(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {

        return view('dashboard.users.show', compact('user'));
    }

    public function edit(User $user): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $managers = $this->userService->getManagers();
        $departments = $this->userService->getDepartments();
        return view('dashboard.users.edit', compact('user', 'managers', 'departments'));
    }

    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {

        $this->userService->update($user, $request->validated());

        return redirect()->route('dashboard.users.index');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $this->userService->destroy($id);
        return redirect()->route('dashboard.users.index');
    }

}
