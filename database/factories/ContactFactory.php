<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use App\User;

$factory->define(Contact::class, function () {
    return [
        'user_id' => function () {
            return User::get()->random();
        }
    ];
});
