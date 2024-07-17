<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $role = Role::where('name', 'admin')->firstOrFail();
        self::$superAdmin = \App\Models\User::factory()->create([
            'firstName' => 'Super',
            'lastName' => 'Admin',
            'username' => 'superadmin',
            'role_id' => $role->id,
            'email' => 'codeclimberske@gmail.com',
        ]);

        // create 3 guide
        $role = Role::where('name', 'guide')->firstOrFail();
        self::$guides = \App\Models\User::factory()->count(3)->create([
            'role_id' => $role->id,
        ]);

        // create 6 hikers
        $role = Role::where('name', 'hiker')->firstOrFail();
        self::$hikers = \App\Models\User::factory()->count(6)->create([
            'role_id' => $role->id,
        ]);

        // create a hiker with a specific email
        \App\Models\User::factory()->create([
            'firstName' => 'Betty',
            'lastName' => 'Bauxer',
            'username' => 'bethtes',
            'role_id' => 1,
            'email' => 'bethelhemtesfaye95@gmail.com',
        ]);

        // create a hiker with a specific email that is unverified
        \App\Models\User::factory()->unverified()->create([
            'firstName' => 'Raph',
            'lastName' => 'Kath',
            'username' => 'raphaelkathambana',
            'role_id' => 1,
            'email' => 'raphael.kathambana@strathmore.edu',
        ]);
        // Get all users
        $allUsers = \App\Models\User::all();

        // Add followers and followings
        foreach ($allUsers as $user) {
            // Ensure each user follows 3 other users and is followed by 3 users
            $followers = $allUsers->where('id', '!=', $user->id)->random(3);
            foreach ($followers as $follower) {
                // Check if the follower relationship already exists before attaching
                if (!$user->followers()->where('follower_id', $follower->id)->exists()) {
                    $user->followers()->attach($follower->id);
                }
                if (!$follower->following()->where('user_id', $user->id)->exists()) {
                    $follower->following()->attach($user->id);
                }
            }
        }
    }
}
