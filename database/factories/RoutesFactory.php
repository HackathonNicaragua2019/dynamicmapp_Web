<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Route;
use Faker\Generator as Faker;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Grimzy\LaravelMysqlSpatial\Types\LineString;

$factory->define(Route::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'description' => $faker->streetAddress,
        'start' => new Point($faker->latitude(12.14,12.92),$faker->longitude(-86,-84)),
        'end' => new Point($faker->latitude(12.14,13.92),$faker->longitude(-86,-84)),
        'route' => new LineString([
            new Point($faker->latitude(12.14,13.92),$faker->longitude(-86,-84)),
            new Point($faker->latitude(12.14,13.92),$faker->longitude(-86,-84)),
            new Point($faker->latitude(12.14,13.92),$faker->longitude(-86,-84)),
            new Point($faker->latitude(12.14,13.92),$faker->longitude(-86,-84)),
            new Point($faker->latitude(12.14,13.92),$faker->longitude(-86,-84)),
            new Point($faker->latitude(12.14,13.92),$faker->longitude(-86,-84)),
            new Point($faker->latitude(12.14,13.92),$faker->longitude(-86,-84)),
        ]),
    ];
});
