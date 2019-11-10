<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Stop;
use Faker\Generator as Faker;
use Grimzy\LaravelMysqlSpatial\Types\Point;

$factory->define(Stop::class, function (Faker $faker) {
    return [
        'position' => new Point($faker->latitude(12.14,12.80),$faker->longitude(-86,-85)),
    ];
});
