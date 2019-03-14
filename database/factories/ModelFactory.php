<?php
$factory->define(App\Content::class, function (Faker\Generator $faker) {    
    $faker = Faker\Factory::create('ru_RU');
    return [
        'title' => $faker-> sentence,
        'pageContent' => $faker-> realText . ' || ' . $faker-> realText,
        'photo' => $faker->imageUrl($width = 960, $height = 427),
    ];
});
$factory->define(App\Litter::class, function (Faker\Generator $faker) {    
    $faker = Faker\Factory::create('ru_RU');
    return [
        'litter' => $faker->randomElement($array = 
                array ("A","B","C","D","E","F","G")),
        'descrp' => $faker->realText(),
        'photo1' => $faker->imageUrl($width = 450, $height = 600),
        'photo2' => $faker->imageUrl($width = 450, $height = 600),
        'idDog1' => $faker->numberBetween($min = 1, $max = 14),
        'idDog2' => $faker->numberBetween($min = 1, $max = 14),
    ];
});
$factory->define(App\Our_dog::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('ru_RU');
    return [
        'sex' => $faker->randomElement($array = array (0, 1)),
        'name' => $faker->name,
        'date_age' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'family' => $faker->randomElement($array = 
                array ("A","B","C","D","E","F","G")),
        'dbres' => $faker->url,
        'sale' => $faker->randomElement($array = array (0, 1)),
    ];
});
$factory->define(App\Dogs_photo::class, function (Faker\Generator $faker) {
    return [
        'id_dogs' => $faker->numberBetween($min = 1, $max = 14),
        'photo' => $faker->imageUrl($width = 250, $height = 150),
    ];
});
$factory->define(App\PhotoSchen::class, function (Faker\Generator $faker) {
    return [
        'idLitt' => $faker->numberBetween($min = 1, $max = 10),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
$factory->define(App\OurNews::class, function (Faker\Generator $faker) {    
    $faker = Faker\Factory::create('ru_RU');
    return [
        'title' => $faker->sentence,
        'date' =>$faker->date($format = 'Y-m-d', $max = 'now'),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'text' => $faker->realText . ' || ' . $faker-> realText
            . ' || ' . $faker-> realText . ' || ' . $faker->realText
             . ' || ' . $faker-> realText . ' || ' . $faker-> realText,
        'author' => $faker->name,
    ];
});
