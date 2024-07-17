<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupHike;
use App\Models\GroupHikeAttendee;
use App\Models\Hike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupHikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Get all groups
        $groups = Group::all();

        // Create 3 group hikes, one for each group
        foreach ($groups as $group) {
            GroupHike::factory()->create([
                'group_id' => $group->id,
                'hike_id' => Hike::inRandomOrder()->first()->id,
                'guide_id' => $group->guide_id,
                'hike_date' => now()->addDays(rand(1, 10)),
            ]);
        }
    }
}
