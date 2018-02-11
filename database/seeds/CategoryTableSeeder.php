<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    protected $categories = [
        ['name' => 'test category#1'],
        ['name' => 'test category#2'],
    ];

    public function run()
    {
        \App\Models\Category::insert($this->categories);
    }
}
