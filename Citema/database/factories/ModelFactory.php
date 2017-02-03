<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Employee::class, function (Faker\Generator $faker) {
  return [
    'first_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'birth_date' => $faker->date($format = 'Y-m-d', $max = '1997-01-01'),
    'gender' => $faker->randomElement($array = array('male', 'female')),
    'start_date' => $faker->date($format = 'Y-m-d', $min = '1997-01-01'),
    'job_title' => $faker->randomElement($array = array('junior developer', 'senior developer', 'manager', 'director')),
    'current_salary' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 999999.99),
  ];
});
