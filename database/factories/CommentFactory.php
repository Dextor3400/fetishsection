<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1, 100),
        'post_id'=>rand(1, 100),
        'is_active'=>1,
        'body'=>$faker->sentence(10),
        'created_at'=>now(),
        'updated_at'=>now(),
    ];
});
