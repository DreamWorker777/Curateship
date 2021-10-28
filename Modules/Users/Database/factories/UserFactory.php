<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use Modules\Users\Entities\User;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'username'          => $faker->unique()->userName,
        'email'             => $faker->unique()->safeEmail,
        'permission'        => 1,
        'email_verified_at' => now(),
        'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',   // password
        'remember_token'    => Str::random(10),
    ];
});


