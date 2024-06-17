<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create 3 roles: hiker role, guide role and admin role
        Role::factory()->create([
            'roleName' => 'Hiker',
            'roleNo' => 1,
        ]);
        Role::factory()->create([
            'roleName' => 'Guide',
            'roleNo' => 2,
        ]);
        Role::factory()->create([
            'roleName' => 'Admin',
            'roleNo' => 3,
        ]);
    }
}
