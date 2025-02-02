<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Modules\Admin\Entities\Article;
use Modules\Admin\Entities\Category;
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

$factory->define(Article::class, function ($faker) {
    return [
        'category' => Category::all()->random()->name,
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'slug' => $faker->slug,
        'content' => $faker->paragraphs($nb = 16, $asText = true),
        'published' => $faker->boolean($chanceOfGettingTrue = 90),
        'created_at' => $faker->dateTime($max = 'now'),
    ];
});
