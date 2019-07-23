<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\EducationalResource::class, function (Faker $faker) {
    return [
      'title' => $faker->title,
      'gender' => '1',
      'age_group' => '1',
      'language' => '1',
      'date_of_approval' => $faker->date,
      'keywords' => $faker->name,
      'url' => $faker->url,
      'format' => '1',
    ];
});
