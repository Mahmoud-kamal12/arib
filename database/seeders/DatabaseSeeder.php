<?php

namespace Database\Seeders;

use App\Http\Constants\UserConstants;
use App\Models\Department;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Department::factory(5)->create();

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@arib.com',
            'password' => Hash::make('password'),
            'role' => UserConstants::ROLE_ADMIN,
            'phone' => '01027060835',
            'salary' => 100000,
        ]);

        User::factory()->create([
            'first_name' => 'Manager',
            'last_name' => 'Manager',
            'email' => 'manager@arib.com',
            'password' => Hash::make('password'),
            'role' => UserConstants::ROLE_MANAGER,
            'phone' => '01288298945',
            'salary' => 75000,
        ]);

        User::factory()->create([
            'first_name' => 'Employee',
            'last_name' => 'Employee',
            'email' => 'employee@arib.com',
            'password' => Hash::make('password'),
            'role' => UserConstants::ROLE_EMPLOYEE,
            'phone' => '01096036831',
            'salary' => 50000,
        ]);

        User::factory(10)->create();
    }
}
