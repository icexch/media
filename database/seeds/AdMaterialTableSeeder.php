<?php

use Illuminate\Database\Seeder;

class AdMaterialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $placesIDs = \App\Models\Place::pluck('id');
        $userIDs = \App\Models\User\User::where('role', 2)->pluck('id')->toArray();
        foreach ($placesIDs as $placesID) {
            for ($i=0;$i<5;$i++) {
                \App\Models\AdMaterial::create([
                    'name' => $faker->name,
                    'user_id' => rand(0, count($userIDs) - 1),
                    'ad_type_id' => rand(1,2),
                    'region_id' => rand(1,2),
                    'category_id' => rand(1,2),
                    'cpc' => rand(1, 5),
                    'cpc_value' => rand(100, 1000),
                    'cpv' => rand(1, 5),
                    'cpv_value' => rand(100, 1000),
                    'content' => "<img src='$faker->imageUrl(468,60)'>",
                    'is_active' => true,
                ]);
            }
        }
    }
}