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
        // Get the first two hikes
        $hikes = Hike::take(2)->get();

        // Descriptions for group hikes
        $descriptions = [
            'Join us for an exciting hike through the beautiful Karura Forest. Experience the diverse flora and fauna as we explore the well-maintained trails. Perfect for nature lovers and adventure seekers.',
            'Enjoy a peaceful walk at the Nairobi Arboretum. This short hike is ideal for those looking to escape the city hustle and immerse themselves in the tranquility of nature. A great way to unwind and relax.',
        ];

        // Create group hikes for each group
        foreach ($groups as $index => $group) {
            $hike = $hikes[$index % 2]; // Alternate between the two hikes
            $description = $descriptions[$index % 2]; // Alternate descriptions

            GroupHike::factory()->create([
                'name' => $hike->name,
                'description' => $description,
                'group_id' => $group->id,
                'hike_id' => $hike->id,
                'guide_id' => $group->guide_id,
                'hike_date' => now()->addDays(rand(1, 10)),
            ]);
        }
    }
}
