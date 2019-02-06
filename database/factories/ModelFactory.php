<?php

$factory->define(App\Content::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker-> sentence,
        'pageContent' => $faker-> realText . ' || ' . $faker-> realText,
        'photo' => $faker->imageUrl($width = 960, $height = 427),
    ];
});