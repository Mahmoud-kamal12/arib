<?php

namespace App\Http\Services;

use App\Http\Repositories\DepartmentRepository;

class DepartmentService
{


    private DepartmentRepository $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function getAllDepartments(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return $this->departmentRepository->getAllDepartments();
    }

    public function store(array $data): void
    {
        $this->departmentRepository->store($data);
    }

    public function update(array $data, $department): void
    {
        $this->departmentRepository->update($data, $department);
    }

    public function delete($department): void
    {
        if ($department->users()->exists()) {
            throw new \Exception('Department has users');
        }
        $this->departmentRepository->delete($department);
    }

}
