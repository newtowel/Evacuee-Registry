<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'id_for_qrcode' => Str::uuid(),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'furigana'          => Str::random(10),
        'sex'               => $faker->randomElement($array = ['男性', '女性', 'その他', '回答しない']), 
        'district'          => $faker->city,
        'birth_date'        =>  $faker->dateTimeBetween($startDate = '-130 years', $endDate = 'now')->format('Y/M/d'),
        'age'               => $faker->numberBetween($min = 0, $max = 130),
        'address'           => $faker->address,
        'phone_number'      => $faker->phoneNumber,
        'ec_phone_number'   => $faker->phoneNumber,
        'ec_name'           => $faker->name,
        'ec_address'        => $faker->address,
        'relative_name1'    => $faker->name,
        'relative_name2'    => $faker->name,
        'relative_name3'    => $faker->name,
        'special_request'   => $faker->realText,
        'disclosure_permission'=> $faker->randomElement($array = ['許可する', '許可しない']),
        'remember_token' => Str::random(10),
    ];
});
