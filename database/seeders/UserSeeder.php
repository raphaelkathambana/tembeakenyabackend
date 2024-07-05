<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public static $superAdmin;
    public static $guides;
    public static $hikers;
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // create a super administrator
        self::$superAdmin = \App\Models\User::factory()->create([
            'firstName' => 'Super',
            'lastName' => 'Admin',
            'username' => 'superadmin',
            'roleNo' => 3,
            'email' => 'codeclimberske@gmail.com',
        ]);

        // create 3 guide
        self::$guides = \App\Models\User::factory()->count(3)->create([
            'roleNo' => 2,
        ]);

        // create 6 hikers
        self::$hikers = \App\Models\User::factory()->count(6)->create([
            'roleNo' => 1,
        ]);

        // create a hiker with a specific email
        \App\Models\User::factory()->create([
            'firstName' => 'Betty',
            'lastName' => 'Bauxer',
            'username' => 'bethtes',
            'roleNo' => 1,
            'email' => 'bethelhemtesfaye95@gmail.com',
        ]);

        // create a hiker with a specific email that is unverified
        \App\Models\User::factory()->unverified()->create([
            'firstName' => 'Raph',
            'lastName' => 'Kath',
            'username' => 'raphaelkathambana',
            'roleNo' => 1,
            'email' => 'maya12raph@gmail.com',
        ]);
    }
}
