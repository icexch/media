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

        for($i=0; $i<3; $i++) {
            $this->createUserInstance(\App\Models\User\Moderator::class, $faker);
            $this->createUserInstance(\App\Models\User\Publisher::class, $faker);
            $this->createUserInstance(\App\Models\User\Advertiser::class, $faker);
        }
    }

    /**
     * @param $userClass
     * @param $faker
     *
     * @return mixed
     */
    protected function createUserInstance($userClass, $faker)
    {
        return $userClass::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => 'test',
            'balance' => $faker->randomFloat(9, 0, 1000)
        ]);
    }
}
