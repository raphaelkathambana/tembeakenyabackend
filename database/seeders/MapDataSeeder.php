<?php

namespace Database\Seeders;

use App\Models\MapData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapDataSeeder extends Seeder
{
    public function run()
    {
        MapData::create([
            'name' => 'Hike Location 1',
            'latitude' => 37.7749,
            'longitude' => -122.4194,
            'description' => 'Beautiful hike in the city',
            'image' => 'image_url_1',
            'waypoints' => [
                ['latitude' => 37.775, 'longitude' => -122.418],
                ['latitude' => 37.776, 'longitude' => -122.417]
            ],
        ]);

        MapData::create([
            'name' => 'Hike Location 2',
            'latitude' => 34.0522,
            'longitude' => -118.2437,
            'description' => 'Scenic hike in LA',
            'image' => 'image_url_2',
            'waypoints' => [
                ['latitude' => 34.052, 'longitude' => -118.244],
                ['latitude' => 34.053, 'longitude' => -118.245]
            ],
        ]);
    }
}
