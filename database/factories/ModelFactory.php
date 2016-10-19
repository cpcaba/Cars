<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Feature::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Brand::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});

$factory->define(App\Modelo::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'brand_id' => $faker->numberBetween($min=1, $max=50),
    ];
});

$factory->define(App\Car::class, function (Faker\Generator $faker) {
    return [
        'year' => $faker->year($max = 'now'),
        'modelo_id' => $faker->numberBetween($min=1, $max=50),
        'kms' => $faker->numberBetween($min=0, $max=100000),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
        'color' => $faker ->randomElement(['Rojo','Verde','Amarillo','Negro']),
    ];
});
