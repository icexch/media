<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    protected $regions = [
        ['name' => 'test region #1'],
        ['name' => 'test region #2']
    ];

    public function run()
    {
        \App\Models\Region::insert($this->regions);
    }
}
