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
            'latitude' => -1.240035,
            'longitude' => 36.832513,
            'description' => 'Karura Forest A',
            'image' => 'image_url_1',
            'waypoints' => [
                ['latitude' => -1.240787, 'longitude' => 36.819135],
                ['latitude' => -1.232238, 'longitude' => 36.826663],
                ['latitude' => -1.244848, 'longitude' => 36.839919],
                ['latitude' => -1.243310, 'longitude' => 36.820191],
            ],
        ]);

        MapData::create([
            'name' => 'Hike Location 2',
            'latitude' => -1.277202,
            'longitude' => 36.800441,
            'description' => 'Nairobi Arboretum',
            'image' => 'image_url_2',
            'waypoints' => [
                ['latitude' => -1.274436, 'longitude' => 36.800969],
                ['latitude' => -1.277689, 'longitude' => 36.801502],
                ['latitude' => -1.277232, 'longitude' => 36.797007],
                ['latitude' => -1.274436, 'longitude' => 36.800969],
            ],
        ]);
    }
}
