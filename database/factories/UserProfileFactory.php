<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\UserProfile::class, function (Faker $faker) {
    return [
        'user_id'      => function () {
            return factory(\App\Models\User\User::class)->create()->id;
        },
        'company_name' => $faker->company,
        'phone'        => $faker->phoneNumber,
        'city'         => $faker->city,
        'country'      => $faker->country
    ];
});
