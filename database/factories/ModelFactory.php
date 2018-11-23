<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/13
 * Time: 16:26
 */


$factory->define(App\Models\admin\Admin::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});