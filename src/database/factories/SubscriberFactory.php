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

$factory->define(App\Models\Subscriber::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->lastName,
        'birthday' => $faker->date('Y-m-d'),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'fit' => $faker->title,
        'club' => $faker->title,
        'score_id' => random_int(1, 21),
        'category_id' => random_int(1, 10),
        'type_id' => random_int(1, 2),
        'note' => $faker->text,
    ];
});
