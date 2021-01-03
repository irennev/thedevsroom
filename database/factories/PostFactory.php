<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence("5");
    return [
        "title" => $title,
        "body"  => $faker->text,
        "category_id" => factory(\App\Models\Category::class)->create()->id,
        "user_id" => factory(\App\Models\User::class)->create()->id,
        "online" => true,
        "visits" => 0
    ];
});