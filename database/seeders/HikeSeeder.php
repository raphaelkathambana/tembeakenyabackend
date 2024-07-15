<?php

namespace Database\Seeders;

use App\Models\Hike;
use App\Models\MapData;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Create 4 hikes
        $mapData1 = MapData::where('name', 'Hike Location 1')->firstOrFail();
        Hike::create([
            'name' => 'Hike 1',
            'map_data' => $mapData1->toArray(),
            'distance' => 10.5,
            'estimated_duration' => '02:30:00',
            'group_id' => 1,
            'user_id' => 1,
            'waypoints' => $mapData1->waypoints,
        ]);

        $mapData2 = MapData::where('name', 'Hike Location 2')->firstOrFail();
        Hike::create([
            'name' => 'Hike 2',
            'map_data' => $mapData2->toArray(),
            'distance' => 8.0,
            'estimated_duration' => '01:45:00',
            'group_id' => 2,
            'user_id' => 2,
            'waypoints' => $mapData2->waypoints,
        ]);

        $hikes = Hike::factory()->count(2)->create();
        // Get all hikers
        $hikers = [
            User::findOrFail(5),
            User::findOrFail(6),
            User::findOrFail(7),
            User::findOrFail(8),
            User::findOrFail(9),
            User::findOrFail(10),
        ];

        // Add reviews from all hikers to the first 2 hikes
        foreach ($hikes->take(2) as $hike) {
            foreach ($hikers as $hiker) {
                Review::factory()->create([
                    'user_id' => $hiker->id,
                    'hike_id' => $hike->id,
                ]);
            }
        }
    }
}
