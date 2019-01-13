<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'title' => $faker->jobTitle,
        'phone1' => $faker->unique()->phoneNumber,
        'phone2' => $faker->unique()->phoneNumber,
        'address' => $faker->unique()->address,
        'policies' => $faker->sentence(),
        'company_name' => $faker->unique()->company,
        'company_profile' => $faker->sentence(),
        'website'       => $faker->unique()->domainName,
        'logo'          => $faker-> jobTitle,
      //  'industry_type' => $faker->company,
         'isActive'      => $faker->boolean,
    //    'account_type'   => $faker-> sentence('personal'),
     //   'role'        => $faker-> ,
        'password' =>  '123456',
            //'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

