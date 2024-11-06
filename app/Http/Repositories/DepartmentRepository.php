<?php

namespace App\Http\Repositories;

use App\Http\Resources\DepartmentResource;
use App\Models\Department;

class DepartmentRepository
{

    public function getAllDepartments($pagination = 10): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $departments = Department::paginate($pagination);

        return DepartmentResource::collection($departments);
    }

    public function store(array $data): void
    {
        Department::create($data);
    }

    public function update(array $data, $department): void
    {
        $department->update($data);
    }

    public function delete($department): void
    {
        $department->delete();
    }

}
