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
        $mapData1 = MapData::where('name', 'Karura Forest')->firstOrFail();
        $hikeOne = Hike::factory()->create([
            'name' => 'Hike to Karura Forest',
            'map_data_id' => $mapData1->id,
            'distance' => 8425,
            'estimated_duration' => '01:43:31',
            'group_id' => 6,
            'user_id' => 3,
            'image_id' => 'KaruraForest_Image',
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

        $mapData2 = MapData::where('name', 'Nairobi Arboretum')->firstOrFail();
        $hikeTwo = Hike::factory()->create([
            'name' => 'Walking at Nairobi Arboretum',
            'map_data_id' => $mapData2->id,
            'distance' => 2000,
            'estimated_duration' => '00:25:13',
            'group_id' => 6,
            'user_id' => 2,
            'image_id' => 'NairobiArboretum_Image',
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

        // Hike::factory()->create([
        //     'name' => 'Hike to Mount Kenya',
        //     // 'map_data_id' => 1,
        //     'distance' => 12000,
        //     'estimated_duration' => '02:30:00',
        //     'group_id' => 6,
        //     'user_id' => 3,
        //     'waypoints' => [
        //         ['latitude' => -0.1573, 'longitude' => 37.3085],
        //         ['latitude' => -0.1527, 'longitude' => 37.3085],
        //         ['latitude' => -0.1527, 'longitude' => 37.3085],
        //         ['latitude' => -0.1573, 'longitude' => 37.3085],
        //     ],
        // ]);
        // Hike::factory()->create([
        //     'name' => 'Hike to Mount Elgon',
        //     // 'map_data_id' => 2,
        //     'distance' => 15000,
        //     'estimated_duration' => '03:00:00',
        //     'group_id' => 6,
        //     'user_id' => 2,
        //     'waypoints' => [
        //         ['latitude' => 1.145, 'longitude' => 34.559],
        //         ['latitude' => 1.145, 'longitude' => 34.559],
        //         ['latitude' => 1.145, 'longitude' => 34.559],
        //         ['latitude' => 1.145, 'longitude' => 34.559],
        //     ],
        // ]);
        $hikes = Hike::all();
        // Get all hikers
        $hikers = [
            User::findOrFail(5),
            User::findOrFail(6),
            User::findOrFail(7),
            User::findOrFail(8),
            User::findOrFail(9),
            User::findOrFail(10),
        ];

        // Create detailed reviews for each hike
        $reviews = [
            'Hike to Karura Forest' => [
                'Great hike with beautiful scenery and well-maintained trails.',
                'Loved the diversity of the flora and fauna along the trail.',
                'Perfect hike for a weekend getaway, not too challenging but very rewarding.',
                'Enjoyed the fresh air and peaceful environment. Highly recommend!',
                'A wonderful place to connect with nature and get some exercise.',
                'The trail was easy to follow and offered stunning views of the forest.'
            ],
            'Walking at Nairobi Arboretum' => [
                'A nice short walk with plenty of shade and beautiful trees.',
                'Perfect for a quick escape from the city hustle. Loved it!',
                'Great place for a leisurely walk. The path is well-maintained.',
                'Enjoyed the variety of plants and birds. A hidden gem in the city.',
                'Relaxing walk with lots of benches to rest and enjoy the view.',
                'The Arboretum is a lovely place for a short, peaceful walk. Will visit again!'
            ]
        ];

        // Add reviews from all hikers to the hikes
        foreach ($hikes as $hike) {
            $hikeReviews = $reviews[$hike->name];
            foreach ($hikers as $index => $hiker) {
                Review::create([
                    'user_id' => $hiker->id,
                    'hike_id' => $hike->id,
                    'review' => $hikeReviews[$index],
                    'rating' => rand(3, 5),
                ]);
            }
        }
    }
}
