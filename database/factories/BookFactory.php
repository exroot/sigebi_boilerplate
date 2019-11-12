<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->paragraph,
        'pages' => rand(150, 500),
        'category_id' => App\Category::all()->random()->id,
        'author_id' => App\Author::all()->random()->id,
        'user_id' => App\User::all()->random()->id,
    ];
});
