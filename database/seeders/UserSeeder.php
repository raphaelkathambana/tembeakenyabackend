<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create a super administrator
        \App\Models\User::factory()->create([
            'firstName' => 'Super',
            'lastName' => 'Admin',
            'username' => 'superadmin',
            'roleNo' => 3,
            'email' => 'codeclimberske@gmail.com',
        ]);
    }
}
