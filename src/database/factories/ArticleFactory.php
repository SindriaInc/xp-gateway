<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'user_id' => random_int(1, 2),
        'category_id' => \App\Models\ArticleCategory::inRandomOrder()->first()->id,
        'title' => $faker->title,
        'description' => $faker->randomHtml(),
        'cover' => '/img/cover.png',
    ];
});
