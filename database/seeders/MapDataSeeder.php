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
            'name' => 'Karura Forest',
            'latitude' => -1.240035,
            'longitude' => 36.832513,
            'description' => '
                Karura Forest is an urban forest in Nairobi, the capital of Kenya. The forest was gazetted in 1932 and is managed by the Kenya Forest Service in conjunction with the Friends of Karura Forest Community Forest Association. It is one of the largest urban gazetted forests in the world. The forest contains nearly all of the 605 species of wildlife found in Kenya. The forest is home to the Mau Mau Caves, an historic site used by the Mau Mau during the struggle for Kenya\'s independence. The forest is also home to the Karura Forest Environmental Education Trust, an environmental education organization. The forest is a popular destination for hikers, cyclists, and birdwatchers. The forest is also home to the Karura Forest Waterfall, a popular tourist attraction.
            ',
            'image' => 'KaruraForest_Image',
            'waypoints' => [
                ['latitude' => -1.240787, 'longitude' => 36.819135],
                ['latitude' => -1.232238, 'longitude' => 36.826663],
                ['latitude' => -1.244848, 'longitude' => 36.839919],
                ['latitude' => -1.243310, 'longitude' => 36.820191],
            ],
        ]);

        MapData::create([
            'name' => 'Nairobi Arboretum',
            'latitude' => -1.277202,
            'longitude' => 36.800441,
            'description' => '
            The Nairobi Arboretum is located in Nairobi, Kenya. It was established in 1907 by Mr. Batiscombe, then Deputy Conservator of Forests in Kenya. The arboretum is a popular destination for nature lovers and bird watchers. It is home to over 300 species of indigenous and exotic trees, as well as a variety of bird species. The arboretum is also a popular spot for picnics, walks, and outdoor events. The arboretum is managed by the Kenya Forest Service and is open to the public daily from 7am to 6pm. The arboretum is a peaceful oasis in the heart of Nairobi, offering visitors a chance to escape the hustle and bustle of the city and enjoy the beauty of nature.
            ',
            'image' => 'NairobiArboretum_Image',
            'waypoints' => [
                ['latitude' => -1.274436, 'longitude' => 36.800969],
                ['latitude' => -1.277689, 'longitude' => 36.801502],
                ['latitude' => -1.277232, 'longitude' => 36.797007],
                ['latitude' => -1.274436, 'longitude' => 36.800969],
            ],
        ]);
    }
}
