<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contact;
use App\Models\PhoneNumber;
use Faker\Generator as Faker;

$factory->define(PhoneNumber::class, function (Faker $faker) {
    return [
        'contact_id' => function() {
            return Contact::get()->random();
        },
        'phone_number' => $faker->phoneNumber,
    ];
});
