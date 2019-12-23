<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Modules\Admin\Entities\DetailDonation;
use Modules\Admin\Entities\DetailCost;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(DetailDonation::class, function ($faker) {
    return [
        'name' => $faker->name,
        'amount' => $faker->numberBetween($min = 1000, $max = 9000),
        'date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
    ];
});
$factory->define(DetailCost::class, function ($faker) {
    return [
        'name' => $faker->sentence($nbWords = 6),
        'amount' => $faker->numberBetween($min = 1000, $max = 9000),
        'date' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
        'note'=>$faker->sentences($nb=3, $asText = true),
    ];
});
