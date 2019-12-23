<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Modules\Admin\Entities\Scholar;
use Modules\Admin\Entities\Lecture;
use Modules\Admin\Entities\Resume;
use Modules\Admin\Entities\User;
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

$factory->define(Scholar::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'note' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'contact' => [
            'Gender' => 'Laki-laki',
            'Address' => $faker->streetAddress,
            'City' => $faker->city,
            'Country' => $faker->country,
            'Email' => $faker->text,
            'Telephone' => $faker->phoneNumber,
        ],
    ];
});

$factory->define(Lecture::class, function ($faker) {
    $dt = $faker->dateTime($max = 'now');
    $date = $dt->format("d M Y");
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'type' => $faker->boolean($chanceOfGettingTrue = 90),
        'status' => $faker->boolean($chanceOfGettingTrue = 50),
        'day' => $faker->dayOfWeek($max = 'now'),
        'date' => $date,
        'from' => $faker->time($format = 'H:i', $max = 'now'),
        'untill' => $faker->time($format = 'H:i', $max = 'now'),
    ];
});

$factory->define(Resume::class, function ($faker) {
    $scholar = Scholar::all()->random()->name;
    return [
        'user_id' => User::all()->random()->id,
        'scholar' => $scholar,
        'lecture_id' => Lecture::where('scholar',$scholar)->get()->random()->id,
        'date' => $faker->dateTime($max = 'now'),
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug' => $faker->slug,
        'content' => $faker->paragraphs($nb = 6, $asText = true),
        'published' =>$faker->boolean($chanceOfGettingTrue = 90),
    ];
});
