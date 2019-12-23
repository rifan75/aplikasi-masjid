<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Modules\Admin\Entities\Mustahiq;
use Modules\Admin\Entities\Yatim;
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

$factory->define(Mustahiq::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        
        'contact' => [
            'Gender' => 'Laki-laki',
            'Address' => $faker->streetAddress,
            'City' => $faker->city,
            'Country' => $faker->country,
            'Email' => $faker->text,
            'Telephone' => $faker->phoneNumber,
        ],
        'witness' => [
            'first' => [
                'name' => $faker->name,
                'Address' => $faker->streetAddress,
                'City' => $faker->city,
                'Country' => $faker->country,
                'Email' => $faker->text,
                'Telephone' => $faker->phoneNumber,
            ],
            'second' => [
                'name' => $faker->name,
                'Address' => $faker->streetAddress,
                'City' => $faker->city,
                'Country' => $faker->country,
                'Email' => $faker->text,
                'Telephone' => $faker->phoneNumber,
            ],
            'third' => [
                'name' => $faker->name,
                'Address' => $faker->streetAddress,
                'City' => $faker->city,
                'Country' => $faker->country,
                'Email' => $faker->text,
                'Telephone' => $faker->phoneNumber,
            ],
        ],
        'given' => [
            'Zakat Bulan Desember 2019' => [
                'amount' => $faker->numberBetween($min = 1000, $max = 9000),
                'received_by' => $faker->name,
                'note' => $faker->text,
            ],
        ],
        'note' => $faker->text,
    ];
});

$factory->define(Yatim::class, function (Faker $faker) {
    $dt = $faker->dateTimeBetween($startDate = '-15 years', $endDate = 'now');
    $date = $dt->format("d M Y");
    return [
        'name' => $faker->name,
        'birth' => $date,
        'contact' => [
            'Gender' => 'Laki-laki',
            'Address' => $faker->streetAddress,
            'City' => $faker->city,
            'Country' => $faker->country,
            'Email' => $faker->text,
            'Telephone' => $faker->phoneNumber,
        ],
        'witness' => [
            'first' => [
                'name' => $faker->name,
                'Address' => $faker->streetAddress,
                'City' => $faker->city,
                'Country' => $faker->country,
                'Email' => $faker->text,
                'Telephone' => $faker->phoneNumber,
            ],
            'second' => [
                'name' => $faker->name,
                'Address' => $faker->streetAddress,
                'City' => $faker->city,
                'Country' => $faker->country,
                'Email' => $faker->text,
                'Telephone' => $faker->phoneNumber,
            ],
            'third' => [
                'name' => $faker->name,
                'Address' => $faker->streetAddress,
                'City' => $faker->city,
                'Country' => $faker->country,
                'Email' => $faker->text,
                'Telephone' => $faker->phoneNumber,
            ],
        ],
        'given' => [
            'Zakat Bulan Desember 2019' => [
                'amount' => $faker->numberBetween($min = 1000, $max = 9000),
                'received_by' => $faker->name,
                'note' => $faker->text,
            ],
        ],
        'note' => $faker->text,
    ];
});


