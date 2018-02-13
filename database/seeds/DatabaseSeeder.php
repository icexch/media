<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(AdMaterialTableSeeder::class);
    }
}
