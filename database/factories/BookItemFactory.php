<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BookItem;
use Faker\Generator as Faker;

$factory->define(BookItem::class, function (Faker $faker) {
    return [
        'book_id' => App\Book::all()->random()->id,
        'state_id' => App\State::all()->random()->id,
    ];
});
