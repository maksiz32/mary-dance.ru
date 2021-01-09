<?php
$factory->define(App\Content::class, function (Faker\Generator $faker) {    
    $faker = Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->sentence,
        'pageContent' => $faker->realText . ' || ' . $faker->realText,
        'photo' => $faker->imageUrl($width = 960, $height = 427),
    ];
});
