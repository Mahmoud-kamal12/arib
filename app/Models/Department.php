<?php

namespace App\Models;

use App\Http\Constants\UserConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $fillable = ['name'];

    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }

    public function getEmployeesCountAttribute(): int
    {
        return $this->users()->whereRole(UserConstants::ROLE_EMPLOYEE)->count();
    }

    public function getEmployeesSalariesAttribute(): int
    {
        return $this->users()->whereRole(UserConstants::ROLE_EMPLOYEE)->sum('salary');
    }

    public function getManagersCountAttribute(): int
    {
        return $this->users()->whereRole(UserConstants::ROLE_MANAGER)->count();
    }

    public function getManagersSalariesAttribute(): int
    {
        return $this->users()->whereRole(UserConstants::ROLE_MANAGER)->sum('salary');
    }
}
