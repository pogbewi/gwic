<?php

use Faker\Generator as Faker;

$factory->define(App\BusinessInvestment::class, function (Faker $faker) {
    return [
        'title' => $faker->randomElement($faker->title()),
        'fullname' => $faker->name(),
        'phone' => $faker->phoneNumber,
        'businessname' => $faker->company,
        'email' => $faker->companyEmail,
        'address' => $faker->address,
        'nationality' => $faker->countryISOAlpha3,
        'operation_countries' => $faker->country,
        'city' => $faker->city,
        'gender' => $faker->randomElement(['male', 'female']),
        'amount_needed' => $faker->currencyCode.$faker->randomFloat(),
        'status' => $faker->randomElement(['operational','potential']),
        'agreed' => $faker->boolean

    ];
});
