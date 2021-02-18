<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\Contact;

$factory->define(Contact::class, function () {
    return [
        'user_id' => function () {
            return User::get()->random();
        }
    ];
});
