<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i=0;$i<10;$i++) {
            \App\Models\User\User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => 123123,
                'role' => rand(1,3),
                'balance' => $faker->randomFloat(9, 0, 1000)
            ]);
        }
    }
}
