<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Department;
use Faker\Generator as Faker;

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'departmentable_type' => $faker->randomElement(['\App\User'], ['\App\Admin']),
        'departmentable_id' => $faker->numberBetween(1, 10),
    ];
});
