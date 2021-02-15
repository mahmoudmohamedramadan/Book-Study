<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return Post::all()->random();
        },
        'user_id' => rand(1, 10),
        'body' => $faker->sentence(),
    ];
});

//state method to add some comments which is VIPs(very important people), second param is the name of my state and the third is array of attributes you want to set them to this state.
// $factory->state(Comment::class, 'vip', [
//     'body' => 'alohaaa'
// ]);

