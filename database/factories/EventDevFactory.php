<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Modules\Admin\Entities\Event;
use Modules\Admin\Entities\Dev;
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

$factory->define(Event::class, function ($faker) {
    $dt = $faker->dateTime($max = 'now');
    $date = $dt->format("d M Y");
    return [
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'title' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'category' => 'Maulid Nabi',
        'status' => $faker->boolean($chanceOfGettingTrue = 50),
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
