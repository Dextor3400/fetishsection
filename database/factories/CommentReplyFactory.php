<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment_reply;
use Faker\Generator as Faker;

$factory->define(Comment_reply::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1, 100),
        'comment_id'=>rand(1, 200),
        'is_active'=>1,
        'body'=>$faker->sentence(10),
        'created_at'=>now(),
        'updated_at'=>now(),
    ];
});
