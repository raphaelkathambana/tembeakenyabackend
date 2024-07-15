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
        $hikeOne = Hike::factory()->create([
            'name' => 'Hike 1',
            'map_data_id' => $mapData1->id,
            'distance' => 5.0,
            'estimated_duration' => '02:00:00',
            'group_id' => 1,
            'user_id' => 1,
            'waypoints' => [
                ['latitude' => -1.240787, 'longitude' => 36.819135],
                ['latitude' => -1.232238, 'longitude' => 36.826663],
                ['latitude' => -1.244848, 'longitude' => 36.839919],
                ['latitude' => -1.243310, 'longitude' => 36.820191],
            ],
        ]);
        // add the new hike's ID to the map data
        $mapData1->hike_id = $hikeOne->id;
        // save it to the database
        $mapData1->save();

        $mapData2 = MapData::where('name', 'Hike Location 2')->firstOrFail();
        $hikeTwo = Hike::factory()->create([
            'name' => 'Hike 2',
            'map_data_id' => $mapData2->id,
            'distance' => 3.0,
            'estimated_duration' => '01:30:00',
            'group_id' => 2,
            'user_id' => 2,
            'waypoints' => [
                ['latitude' => -1.274436, 'longitude' => 36.800969],
                ['latitude' => -1.277689, 'longitude' => 36.801502],
                ['latitude' => -1.277232, 'longitude' => 36.797007],
                ['latitude' => -1.274436, 'longitude' => 36.800969],
            ],
        ]);
        // add the new hike's ID to the map data
        $mapData2->hike_id = $hikeTwo->id;
        // save it to the database
        $mapData2->save();

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
