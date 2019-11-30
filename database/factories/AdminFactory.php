<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\model\admin\admin;
use Faker\Generator as Faker;

$factory->define(admin::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret')    
    ];
});
