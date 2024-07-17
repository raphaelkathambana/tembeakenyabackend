<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        // Group names and descriptions
        $groupNames = [
            'Edgeworth hikers' => 'A group of adventurous individuals passionate about exploring the scenic trails of the Edgeworth region. Join us for weekly hikes and discover the beauty of our local landscapes.',
            'Kilimanjaro hikers' => 'Dedicated to those with a love for high altitudes and challenging climbs, the Kilimanjaro Hikers group is for anyone aiming to conquer the tallest peak in Africa. Training and group expeditions available.',
            'Don Bosco Hikers' => 'Inspired by the spirit of St. John Bosco, this group promotes community, friendship, and the joy of hiking. Open to all who enjoy the great outdoors and wish to hike in a supportive environment.',
            'Strathmore Hikers Club' => 'A vibrant community of students and alumni from Strathmore University, united by a shared love of hiking. We organize regular hikes and outdoor activities to explore the natural beauty surrounding our campus.',
            'Nature Trails' => 'For nature enthusiasts who seek to immerse themselves in the tranquility and beauty of nature. Our hikes focus on discovering diverse ecosystems, flora, and fauna along picturesque trails.',
            'Tembea Kenya Official Hikers Group' => 'The official hiking group of Tembea Kenya, dedicated to exploring and promoting the natural wonders of Kenya. Join us for guided hikes, eco-tours, and conservation activities across the country.'
        ];

        // Get the users
        $superAdmin = User::where(['role_id' => 3])->first();
        $guides = [
            User::findOrFail(2),
            User::findOrFail(3),
            User::findOrFail(4),
        ];
        $hikers = [
            User::findOrFail(5),
            User::findOrFail(6),
            User::findOrFail(7),
            User::findOrFail(8),
            User::findOrFail(9),
            User::findOrFail(10),
        ];

        // Create groups with different guides as admins
        $groupIndex = 0;
        foreach ($groupNames as $name => $description) {
            $guide = ($groupIndex < count($guides)) ? $guides[$groupIndex] : $guides[array_rand($guides)];

            $group = Group::create([
                'name' => $name,
                'description' => $description,
                'guide_id' => $guide->id,
            ]);

            $group->members()->attach($guide->id); // Add guide as member
            $group->members()->attach($superAdmin->id); // Add super admin as member

            // Add 3 random hikers to each group
            $randomHikers = collect($hikers)->random(3);
            foreach ($randomHikers as $hiker) {
                $group->members()->attach($hiker->id);
            }

            $groupIndex++;
        }

    }
}
