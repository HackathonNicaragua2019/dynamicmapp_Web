<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bus;
use Faker\Generator as Faker;

$factory->define(Bus::class, function (Faker $faker) {
    return [
        'name'=>$faker->firstName(),
        'license_plate'=>strtoupper($faker->randomLetter().$faker->randomLetter()).'-'.$faker->randomNumber(5),
        'device_id'=>$faker->randomNumber(5, true),
    ];
});
