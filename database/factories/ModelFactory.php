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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\CommunityLink::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory('App\User')->create()->id,
        'channel_id' => rand(1, 3),
        'title' => $faker->sentence,
        'link' => $faker->url,
        'approved' => 1
    ];
});

$factory->define(App\CommunityLinkVote::class, function (Faker\Generator $faker) {
    return [
        'user_id' => rand(1, 30),
        'community_link_id' => rand(1, 30)
    ];
});

