<?php

namespace App\Http\Controllers;

use App\Http\Repositories\DepartmentRepository;
use App\Http\Requests\Department\StoreDepartmentRequest;
use App\Http\Services\DepartmentService;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    private DepartmentService $departmentService;

    public function __construct(DepartmentService $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $departments = $this->departmentService->getAllDepartments();
        return view('dashboard.departments.index', compact('departments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('dashboard.departments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->departmentService->store($request->validated());
        return redirect()->route('dashboard.departments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('dashboard.departments.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('dashboard.departments.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department): \Illuminate\Http\RedirectResponse
    {
        $this->departmentService->update($request->all(), $department);
        return redirect()->route('dashboard.departments.index');
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Exception
     */
    public function destroy(Department $department): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->departmentService->delete($department);
        }catch (\Exception $e){
            return redirect()->route('dashboard.departments.index')->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('dashboard.departments.index');
    }
}
