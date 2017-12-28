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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(SoutheastPhp\User::class, function (Faker\Generator $faker) {
    static $password;

    $firstName = $faker->firstName();
    $lastName = $faker->lastName;

    return [
        'name' => $firstName . ' ' . $lastName,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'preferred_name' => $firstName,
        'city' => $faker->city,
        'bio' => $faker->paragraph(2),
        'company' => $faker->company,
        'twitter' => '',
        'first_conference' => 0,

        // Default fields
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(SoutheastPhp\Models\Nashville::class, function (Faker\Generator $faker) {
    $topics = ['Food & Drink', 'Music & History', 'Outdoors', 'Cycling', 'Beer', 'Sports'];

    return [
        'activity' => $faker->company,
        'description' => $faker->words(10, true),
        'topic' => array_random($topics),
        'website' => $faker->url,
        'yelp_link' => '',
        'google_link' => '',
    ];
});

$factory->define(SoutheastPhp\Models\Sponsor::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'website' => $faker->url,
        'about' => $faker->paragraphs(3, true)
    ];
});

$factory->define(SoutheastPhp\Models\SponsorLevel::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'remaining' => $faker->numberBetween(1, 50),
        'information' => $faker->paragraphs(3, true)
    ];
});
