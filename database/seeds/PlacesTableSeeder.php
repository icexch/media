<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\App\Models\Place $place)
    {
        $faker = Faker\Factory::create();
        $userIDs = \App\Models\User\User::where('role', 3)->pluck('id')->toArray();
        for ($i=0;$i<25;$i++) {
            $place->create([
                'name' => $faker->name,
                'user_id' => $userIDs[rand(0, count($userIDs) - 1)],
                'ad_type_id' => rand(1,2),
                'region_id' => rand(1,2),
                'category_id' => rand(1,2),
                'is_active' => true,
                'url' => 'http://backend.crypt-worlds.dev/welcome'
            ]);
        }
    }
}
